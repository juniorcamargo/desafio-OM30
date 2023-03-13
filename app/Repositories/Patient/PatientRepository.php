<?php

namespace App\Repositories\Patient;

use App\Http\Requests\PatientSearchRequest;
use App\Models\Address;
use App\Models\Patient;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use PhpParser\ErrorHandler\Collecting;

class PatientRepository
{
    private Patient $patient;

    public function __construct(Patient $patient)
    {
        $this->patient = $patient;
    }

    public function index(): Paginator
    {
        return $this->patient->with('address')->simplePaginate(2);
    }

    public function store(array $data): Patient
    {
        try {
            DB::beginTransaction();

            $patient = $this->patient->create($data);
            $patient->address()->create($data['address']);

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
        }

        return $this->patient->with('address')->findOrFail($patient->id);
    }

    public function show(int $id): Patient
    {
        return $this->patient->with('address')->findOrFail($id);
    }

    public function update(array $data, int $id): Patient
    {
        $patient = $this->patient->with('address')->findOrFail($id);
        $patient->update($data);

        return $patient->refresh();
    }

    public function delete(int $id)
    {
        $patient = $this->patient->with('address')->findOrFail($id);
        $patient->address()->delete();
        return $patient->delete();
    }

    public function restore($id)
    {
        $patient = $this->patient->with('address')->onlyTrashed()->findOrFail($id);
        $patient->address()->restore();
        return $patient->restore();
    }

    public function search(PatientSearchRequest $request)
    {
        return $this->patient::where($request->getSearchCallback())->with('address')->simplePaginate(2);
    }
}
