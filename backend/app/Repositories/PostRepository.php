<?php 

namespace App\Repositories;

use App\Interfaces\Repository;
use App\Models\Post;

class PostRepository implements Repository
{
    public function findAll()
    {
        $posts = Post::whereRaw('LENGTH(text) <= 280')
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
        $data = [
            'text' => $attributes['text'],
            'user_id' => auth()->user()->id,
        ];

        return Post::where('id', $id)->update($data);
    }
    public function delete(int $id)
    {
        return Post::where('id', $id)->delete();
    }
}
