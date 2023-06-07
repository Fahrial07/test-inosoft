<?php

namespace App\Services\Vehicle;

use App\Repositories\Vehicle\VehicleRepository;

class VehicleService
{

    protected $vehicleRepository;

    public function __construct(VehicleRepository $vehicleRepository)
    {
        $this->vehicleRepository = $vehicleRepository;
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

            $paginateData = $this->vehicleRepository->getWithPaginate($pageNumber, $amountOfData);

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
                'output_year' => $request->output_year,
                'color' => $request->color,
                'price' => $request->price
            ];

            $vehicle = $this->vehicleRepository->create($data);

            $status = true;
            $message = 'Data created successfully !';

            $result = (object) [
                'status' => $status,
                'message' => $message,
                'data' =>  $vehicle
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
            $vehicle = $this->vehicleRepository->getById($request->vehicle_id);

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
        try{
            $data = [
                'vehicle_id' => $request->vehicle_id,
                'output_year' => $request->output_year,
                'color' => $request->color,
                'price' => $request->price
            ];

            $this->vehicleRepository->update($request->vehicle_id, $data);

            $vehicle = $this->vehicleRepository->getById($request->vehicle_id);

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
            
            $this->vehicleRepository->destroy($request->vehicle_id);

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

    public function getStock($request)
    {

        $vehicleStock = $this->vehicleRepository->getStock();

        $status = true;
        $message = 'Data successfully retrieved !';

        $result = (object) [
            'status' => $status,
            'message' => $message,
            'data' => $vehicleStock
        ];

        return $result;
    }
}
