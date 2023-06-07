<?php

namespace App\Validations;

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
            'page_number' => ['sometimes', 'numeric'],
            'amount_of_data' => ['somestimes', 'numeric']
        ];

        $request->validate($validate);

        // Validation success
        $result['status'] = true;
        $result = (object) $result;

        return $result;
    }

    /**
     * Store validation
     *
     * @param $request
     * @return ArrayObject
     */
    public function store($request)
	{
        $result = [];
        $result = ['status'] = false;

        $validate = [];

    }



}
