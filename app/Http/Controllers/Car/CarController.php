<?php

namespace App\Http\Controllers\Car;

use Illuminate\Http\Request;
use App\Services\Car\CarService;
use App\Http\Controllers\Controller;
use App\Validations\Car\CarValidation;

class CarController extends Controller
{
    /**
     * Validation instance.
     *
     * @var \App\Validations\Car\CarValidation
     */
    protected $carValidation;

    /**
     * Service instance.
     *
     * @var \App\Services\Car\CarService
     */
    protected $carService;

    /**
     * Create a new instance.
     *
     * @return void
     */

    public function __construct(CarValidation $carValidation, CarService $carService)
    {
        $this->carValidation = $carValidation;
        $this->carService = $carService;
    }

    /**
     * Index 
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $validation = $this->carValidation->index($request);

        if (!$validation->status) {
            return $this->sendResponse($validation);
        }

        $result = $this->carService->index($request);

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
        $validation = $this->carValidation->store($request);

        if (!$validation->status) {
            return $this->sendResponse($validation);
        }

        $result = $this->carService->store($request);

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
        $validation = $this->carValidation->show($request);

        if (!$validation->status) {
            return $this->sendResponse($validation);
        }

        $result = $this->carService->show($request);

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
        $validation = $this->carValidation->update($request);

        if (!$validation->status) {
            return $this->sendResponse($validation);
        }

        $result = $this->carService->update($request);

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
        $validation = $this->carValidation->destroy($request);

        if (!$validation->status) {
            return $this->sendResponse($validation);
        }

        $result = $this->carService->destroy($request);

        return $this->sendResponse($result);
    }
}
