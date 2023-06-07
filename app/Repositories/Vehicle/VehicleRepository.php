<?php

namespace App\Repositories\Vehicle;

use App\Models\Vehicle;

class VehicleRepository
{

    public function getAll()
    {
        return Vehicle::orderBy('created_at', 'desc')->get();
    }

    public function getWithPaginate($pageNumber, $amountOfData)
    {
        return Vehicle::with([
            'car' => function ($query) {
                $query->without('vehicle');
            },
            'motorcycle' => function ($query){
                $query->without('vehicle');
            }
        ])->getPaginatedData(true, $pageNumber, $amountOfData, '_id', 'desc');
    }

    public function create($data)
    {
        return Vehicle::create($data);
    }

    public function getById($id)
    {
        return Vehicle::firstWhere('_id', $id);
    }

    public function update($id, $data)
    {
        return Vehicle::where('_id', $id)->update($data);
    }

    public function destroy($id)
    {
        return Vehicle::where('_id', $id)->delete();
    }

    public function getStock()
    {
        return Vehicle::withCount([
            'car',
            'motorcycle'
        ])->get();
    }

}
