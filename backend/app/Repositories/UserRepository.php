<?php 

namespace App\Repositories;
use App\Interfaces\Repository;
use App\Models\User;

class UserRepository implements Repository
{
    public function findAll()
    {
        return User::all();
    }
    public function find(int $id)
    {
        return User::findOrFail($id);
    }
    public function create(array $attributes)
    {
        return User::firstOrCreate($attributes);
    }
    public function update(int $id, array $attributes)
    {
        return User::where('id', $id)->update($attributes);
    }
    public function delete(int $id)
    {
        return User::where('id', $id)->delete();
    }
}
