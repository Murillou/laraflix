<?php

namespace App\Repositories;

use App\Models\Profile;
use Illuminate\Support\Facades\Auth;

class ProfileRepository implements ProfileRepositoryInterface
{
    public function all()
    {
        return Profile::all();
    }

    public function create(array $data)
    {
        $userId = $data['user_id'] ?? Auth::id();

        $count = Profile::where('user_id', $userId)->count();

        if ($count >= 5) {
            abort(403, 'Você só pode ter no máximo 5 perfis.');
        }

        return Profile::create($data);
    }
    public function update(array $data, Profile $profile)
    {
        $profile->update($data);
    }

    public function delete(Profile $profile)
    {
        $profile->delete();
    }
}
