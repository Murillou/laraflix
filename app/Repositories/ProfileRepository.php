<?php

namespace App\Repositories;

use App\Models\Profile;

class ProfileRepository implements ProfileRepositoryInterface
{
    public function all()
    {
        return Profile::all();
    }

    public function create(array $data)
    {
        return Profile::create($data);
    }

}
