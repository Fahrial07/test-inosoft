<?php

namespace App\Repositories\Vichile;

use App\Models\Vichile;

class VichileRepository
{

    public function getCar()
    {
        return Vichile::orderBy('created_at', 'desc')->get();
    }

    public function create($data)
    {
        return Vichile::create($data);
    }

    public function getCarById($id)
    {
        return Vichile::firstWhere('_id', $id);
    }

    public function update($id, $data)
    {
        return Vichile::where('_id', $id)->update($data);
    }

    public function destroy($id)
    {
        return Vichile::where('_id', $id)->delete();
    }

}
