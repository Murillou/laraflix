<?php

namespace App\Repositories;

use App\Models\Profile;

interface ProfileRepositoryInterface
{
    public function all();
    public function create(array $data);
    public function update(array $data, Profile $profile);
    public function delete(Profile $profile);

}
