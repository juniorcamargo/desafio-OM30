<?php

namespace App\Services\Patient;

use App\Http\Requests\PatientSearchRequest;
use App\Repositories\Patient\PatientRepository;
use Illuminate\Http\Request;

class PatientService
{
    private PatientRepository $patientRepository;

    public function __construct(PatientRepository $patientRepository)
    {
        $this->patientRepository = $patientRepository;
    }

    public function index()
    {
        return $this->patientRepository->index();
    }

    public function store(array $data)
    {
        return $this->patientRepository->store($data);
    }

    public function show(int $id)
    {
        return $this->patientRepository->show($id);
    }

    public function update(array $data, int $id)
    {
        return $this->patientRepository->update($data, $id);
    }

    public function delete(int $id)
    {
        return $this->patientRepository->delete($id);
    }

    public function restore($id)
    {
        return $this->patientRepository->restore($id);
    }

    public function search(PatientSearchRequest $request)
    {
        return $this->patientRepository->search($request);
    }
}
