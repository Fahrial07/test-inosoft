<?php

namespace App\Repositories\Car;

use App\Models\Car;

class CarRepository
{

    public function getAll()
    {
        return Car::orderBy('created_at', 'desc')->get();
    }

    public function getWithPaginate($pageNumber, $amountOfData)
    {
        return Car::getPaginatedData(true, $pageNumber, $amountOfData, '_id', 'desc');
    }

    public function create($data)
    {
        return Car::create($data);
    }

    public function getById($id)
    {
        return Car::firstWhere('_id', $id);
    }

    public function update($id, $data)
    {
        return Car::where('_id', $id)->update($data);
    }

    public function destroy($id)
    {
        return Car::where('_id', $id)->delete();
    }

}
