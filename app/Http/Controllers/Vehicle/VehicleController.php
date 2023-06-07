<?php

namespace App\Http\Controllers\Vehicle;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Vehicle\VehicleService;
use App\Validations\Vehicle\VehicleValidation;

class VehicleController extends Controller
{
    /**
     * Validation instance.
     *
     * @var \App\Validations\Vehicle\VehicleValidation
     */
    protected $vehicleValidation;

    /**
     * Service instance.
     *
     * @var \App\Services\Vehicle\VehicleService
     */
    protected $vehicleService;

    /**
     * Create a new instance.
     *
     * @return void
     */

    public function __construct(VehicleValidation $vehicleValidation, VehicleService $vehicleService)
    {
        $this->vehicleValidation = $vehicleValidation;
        $this->vehicleService = $vehicleService;
    }

    /**
     * Index 
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $validation = $this->vehicleValidation->index($request);

        if (!$validation->status) {
            return $this->sendResponse($validation);
        }

        $result = $this->vehicleService->index($request);

        return $this->sendResponse($result);
    }

    /**
     * Store
     * 
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
    */

    public function store(Request $request)
    {
        $validation = $this->vehicleValidation->store($request);

        if (!$validation->status) {
            return $this->sendResponse($validation);
        }

        $result = $this->vehicleService->store($request);

        return $this->sendResponse($result);
    }

    /**
     * Show
     * 
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
    */

    public function show(Request $request)
    {
        $validation = $this->vehicleValidation->show($request);

        if (!$validation->status) {
            return $this->sendResponse($validation);
        }

        $result = $this->vehicleService->show($request);

        return $this->sendResponse($result);
    }

    /**
     * Update
     * 
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
    */

    public function update(Request $request)
    {
        $validation = $this->vehicleValidation->update($request);

        if (!$validation->status) {
            return $this->sendResponse($validation);
        }

        $result = $this->vehicleService->update($request);

        return $this->sendResponse($result);
    }


    /**
     * Destroy
     * 
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
    */

    public function destroy(Request $request)
    {
        $validation = $this->vehicleValidation->destroy($request);

        if (!$validation->status) {
            return $this->sendResponse($validation);
        }

        $result = $this->vehicleService->destroy($request);

        return $this->sendResponse($result);
    }

    
}
