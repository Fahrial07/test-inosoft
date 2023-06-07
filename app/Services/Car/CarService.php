<?php

namespace App\Services\Car;

use App\Repositories\Car\CarRepository;

class CarService
{

    protected $carRepository;

    public function __construct(CarRepository $carRepository)
    {
        $this->carRepository = $carRepository;
    }

    /**
     * Index service.
     *
     * @param  $request
     * @return  ArrayObject
     */
    public function index($request)
    {
        try {
            $pageNumber = 1;
            $amountOfData = 20;

            if ($request->page_number) {
                $pageNumber = $request->page_number;
            }

            if ($request->amount_of_data) {
                $amountOfData = $request->amount_of_data;
            }

            $paginateData = $this->carRepository->getWithPaginate($pageNumber, $amountOfData);

            $user = $paginateData->data;
            $pagination = $paginateData->pagination;

            $status = true;
            $message = 'Data retrieved successfully !';

            $result = (object) [
                'status' => $status,
                'message' => $message,
                'data' => $user,
                'pagination' => $pagination,
            ];

            return $result;
        } catch (\Throwable $th) {
            $status = false;
            $statusCode = 400;
            $message = 'Bad request !';

            $result = (object) [
                'status' => $status,
                'statusCode' => $statusCode,
                'message' => $message,
            ];

            return $result;
        }
    }

    /**
     * Store service.
     *
     * @param  $request
     * @return  ArrayObject
     */
    public function store($request)
    {
        try {
            $data = [
                'vehicle_id' => $request->vehicle_id,
                'machine' => $request->machine,
                'passenger_capacity' => $request->passenger_capacity,
                'type' => $request->type
            ];

            $vehicle = $this->carRepository->create($data);

            $status = true;
            $message = 'Data created successfully !';

            $result = (object) [
                'status' => $status,
                'message' => $message,
                'data' => $vehicle
            ];

            return $result;

        } catch (\Throwable $th) {
            $status = false;
            $statusCode = 400;
            $message = 'Bad request !';

            $result = (object) [
                'status' => $status,
                'statusCode' => $statusCode,
                'message' => $message,
            ];

            return $result;
        }
    }

    /**
     * Show service
     *
     * @param $request
     * @return ArrayObject
     */

    public function show($request)
    {
        try {
            $vehicle = $this->carRepository->getById($request->car_id);

            $status = true;
            $message = 'Data retrieved successfully !';

            $result = (object) [
                'status' => $status,
                'message' => $message,
                'data' => $vehicle
            ];

            return $result;
        } catch (\Throwable $th) {
            $status = false;
            $statusCode = 400;
            $message = 'Bad request !';

            $result = (object) [
                'status' => $status,
                'statusCode' => $statusCode,
                'message' => $message,
            ];

            return $result;
        }
    }

    /**
     * Update service
     *
     * @param $request
     * @return ArrayObject
     */

    public function update($request)
    {
        try {
            $data = [
                'car_id' => $request->car_id,
                'vehicle_id' => $request->vehicle_id,
                'machine' => $request->machine,
                'passenger_capacity' => $request->passenger_capacity,
                'type' => $request->type
            ];

            $this->carRepository->update($request->car_id, $data);

            $vehicle = $this->carRepository->getById($request->car_id);

            $status = true;
            $message = 'Data updated successfully !';

            $result = (object) [
                'status' => $status,
                'message' => $message,
                'data' => $vehicle
            ];

            return $result;

        } catch (\Throwable $th) {
            $status = false;
            $statusCode = 400;
            $message = 'Bad request !';

            $result = (object) [
                'status' => $status,
                'statusCode' => $statusCode,
                'message' => $message,
            ];

            return $result;
        }
    }

    public function destroy($request)
    {
        try {

            $this->carRepository->destroy($request->car_id);

            $status = true;
            $message = 'Data deleted successfully !';

            $result = (object) [
                'status' => $status,
                'message' => $message,
            ];

            return $result;

        } catch (\Throwable $th) {
            $status = false;
            $statusCode = 400;
            $message = 'Bad request !';

            $result = (object) [
                'status' => $status,
                'statusCode' => $statusCode,
                'message' => $message,
            ];

            return $result;
        }
    }

}
