<?php

namespace App\Services\Patient;

use App\Models\Patient;
use App\Repositories\Patient\PatientRepository;

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
}
