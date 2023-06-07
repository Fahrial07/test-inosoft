<?php

namespace App\Repositories\Car;

use App\Models\Car;

class CarRepository
{

    public function getCar()
    {
        return Car::orderBy('created_at', 'desc')->get();
    }

    public function create($data)
    {
        return Car::create($data);
    }

    public function getCarById($id)
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
