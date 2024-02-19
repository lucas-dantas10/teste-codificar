<?php 

namespace App\Services;

use App\Repositories\PostRepository;

class PostService
{
    public function __construct(
        private PostRepository $postRepository
    )
    {}

    public function getAllPosts()
    {
        return $this->postRepository->findAll();
    }

    public function getPost(int $id)
    {
        return $this->postRepository->find($id);
    }

    public function storePost(array $attributes)
    {
        return $this->postRepository->create($attributes);
    }

    public function updatePost(int $id, array $attributes)
    {
        return $this->postRepository->update($id, $attributes);
    }

    public function deletePost(int $id)
    {
        return $this->postRepository->delete($id);
    }
}
