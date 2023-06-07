<?php

namespace App\Http\Controllers\Motorcycle;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Motorcycle\MotorcycleService;
use App\Validations\Motorcycle\MotorcycleValidation;

class MotorcycleController extends Controller
{
    /**
     * Validation instance.
     *
     * @var \App\Validations\Motorcycle\MotorcycleValidation
     */
    protected $motorcycleValidation;

    /**
     * Service instance.
     *
     * @var \App\Services\Motorcycle\MotorcycleService
     */
    protected $motorcycleService;

    /**
     * Create a new instance.
     *
     * @return void
     */

    public function __construct(MotorcycleValidation $motorcycleValidation, MotorcycleService $motorcycleService)
    {
        $this->motorcycleValidation = $motorcycleValidation;
        $this->motorcycleService = $motorcycleService;
    }

    /**
     * Index 
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $validation = $this->motorcycleValidation->index($request);

        if (!$validation->status) {
            return $this->sendResponse($validation);
        }

        $result = $this->motorcycleService->index($request);

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
        $validation = $this->motorcycleValidation->store($request);

        if (!$validation->status) {
            return $this->sendResponse($validation);
        }

        $result = $this->motorcycleService->store($request);

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
        $validation = $this->motorcycleValidation->show($request);

        if (!$validation->status) {
            return $this->sendResponse($validation);
        }

        $result = $this->motorcycleService->show($request);

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
        $validation = $this->motorcycleValidation->update($request);

        if (!$validation->status) {
            return $this->sendResponse($validation);
        }

        $result = $this->motorcycleService->update($request);

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
        $validation = $this->motorcycleValidation->destroy($request);

        if (!$validation->status) {
            return $this->sendResponse($validation);
        }

        $result = $this->motorcycleService->destroy($request);

        return $this->sendResponse($result);
    }
}
