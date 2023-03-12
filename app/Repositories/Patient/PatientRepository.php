<?php

namespace App\Repositories\Patient;

use App\Models\Address;
use App\Models\Patient;
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

    public function index(): Collection
    {
        return $this->patient->with('address')->get();
    }

    public function store(array $data): Patient
    {
        DB::beginTransaction();

        $patient = $this->patient->create($data);
        $patient->address()->create($data['address']);

        DB::commit();

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
}
