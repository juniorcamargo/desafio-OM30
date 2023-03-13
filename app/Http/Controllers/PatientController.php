<?php

namespace App\Http\Controllers;

use App\Http\Requests\PatientAddRequest;
use App\Http\Requests\PatientEditRequest;
use App\Http\Requests\PatientSearchRequest;
use App\Services\Patient\PatientService;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    private PatientService $patientService;

    public function __construct(PatientService $patientService)
    {
        $this->patientService = $patientService;
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Response($this->patientService->index());
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PatientAddRequest $request)
    {
        $data = $request->all();

        return $this->patientService->store($data);
    }

    /**
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        return Response($this->patientService->show($id));
    }

    /**
     * @param  \App\Http\Requests\PatientSearchRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function search(PatientSearchRequest $request)
    {
        return Response($this->patientService->search($request));
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PatientEditRequest $request, $id)
    {
        $data = $request->all();

        return Response($this->patientService->update($data, $id));
    }

    /**
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Response($this->patientService->delete($id));
    }

    /**
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        Response($this->patientService->restore($id));
    }
}
