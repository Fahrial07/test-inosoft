<?php

namespace App\Validations\Car;

class CarValidation
{

    /**
     * Index Validation
     *
     * @param $request
     * @return ArrayObject
     */
    public function index($request)
    {
        $result = [];
        $result['status'] = false;
        $validate = [
            'page_number' => ['nullable', 'numeric'],
            'amount_of_data' => ['nullable', 'numeric']
        ];

        $request->validate($validate);

        // Validation success
        $result['status'] = true;
        $result = (object) $result;

        return $result;
    }

    /**
     * Store validate
     *
     * @param $request
     * @return ArrayObject
     */
    public function store($request)
    {
        $result = [];
        $result['status'] = false;

        $validate = [
            'vehicle_id' => ['required', 'exists:vehicles,_id'],
            'machine' => ['required'],
            'passenger_capacity' => ['required'],
            'type' => ['required']
        ];

        $request->validate($validate);

        // Validation success
        $result['status'] = true;
        $result['message'] = 'Validation successfully';

        $result = (object) $result;
        return $result;
    }

    public function show($request)
    {
        $result = [];
        $result['status'] = true;

        // Check required parameter is exist
        $validate = [
            'car_id' => ['required', 'exists:cars,_id']
        ];

        $request->validate($validate);

        // Validation success
        $result['status'] = true;
        $result['message'] = 'Validation successfully !';

        $result = (object) $result;

        return $result;
    }

    public function update($request)
    {
        $validate = [
            'car_id' => ['required', 'exists:cars,_id'],
            'vehicle_id' => ['required', 'exists:vehicles,_id'],
            'machine' => ['required'],
            'passenger_capacity' => ['required'],
            'type' => ['required']
        ];

        $request->validate($validate);

        // Validation success
        $result['status'] = true;
        $result['message'] = 'Validation successfully !';

        $result = (object) $result;

        return $result;
    }

    public function destroy($request)
    {
        $result = [];
        $result['status'] = false;

        $validate = [
            'car_id' => ['required', 'exists:cars,_id']
        ];

        $request->validate($validate);

        //Validate success
        $result['status'] = true;
        $result['message'] = 'Validation successfuly';

        $result = (object) $result;

        return $result;
    }

}
