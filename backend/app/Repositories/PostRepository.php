<?php 

namespace App\Repositories;

use App\Interfaces\Repository;
use App\Models\Post;

class PostRepository implements Repository
{
    public function findAll()
    {
        $user = auth()->user();

        $posts = Post::query()
            ->whereRaw('LENGTH(text) <= 280')
            ->paginate();

        return $posts;
    }
    public function find(int $id)
    {
        return Post::findOrFail($id);
    }
    public function create(array $attributes)
    {
        return Post::firstOrCreate(
            ['text' => $attributes['text']],
            $attributes
        );
    }
    public function update(int $id, array $attributes)
    {
        return Post::where('id', $id)->update($attributes);
    }
    public function delete(int $id)
    {
        return Post::where('id', $id)->delete();
    }
}
