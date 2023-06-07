<?php

namespace App\Repositories\Motorcycle;

use App\Models\Motorcycle;

class MotorcycleRepository
{

    public function getAll()
    {
        return Motorcycle::orderBy('created_at', 'desc')->get();
    }

    public function getWithPaginate($pageNumber, $amountOfData)
    {
        return Motorcycle::getPaginatedData(true, $pageNumber, $amountOfData, '_id', 'desc');
    }

    public function create($data)
    {
        return Motorcycle::create($data);
    }

    public function getById($id)
    {
        return Motorcycle::firstWhere('_id', $id);
    }

    public function update($id, $data)
    {
        return Motorcycle::where('_id', $id)->update($data);
    }

    public function destroy($id)
    {
        return Motorcycle::where('_id', $id)->delete();
    }

}