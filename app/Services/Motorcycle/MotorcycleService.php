<?php

namespace App\Services\Motorcycle;

use App\Repositories\Motorcycle\MotorcycleRepository;

class MotorcycleService
{

    protected $MotorcycleRepository;

    public function __construct(MotorcycleRepository $MotorcycleRepository)
    {
        $this->MotorcycleRepository = $MotorcycleRepository;
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

            $paginateData = $this->MotorcycleRepository->getWithPaginate($pageNumber, $amountOfData);

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
                'suspension' => $request->suspension,
                'transmission' => $request->transmission
            ];

            $vehicle = $this->MotorcycleRepository->create($data);

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
            $vehicle = $this->MotorcycleRepository->getById($request->motorcycle_id);

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
                'motorcycle_id' => $request->motorcycle_id,
                'vehicle_id' => $request->vehicle_id,
                'machine' => $request->machine,
                'suspension' => $request->suspension,
                'transmission' => $request->transmission
            ];

            $this->MotorcycleRepository->update($request->motorcycle_id, $data);

            $vehicle = $this->MotorcycleRepository->getById($request->motorcycle_id);

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

            $this->MotorcycleRepository->destroy($request->motorcycle_id);

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
