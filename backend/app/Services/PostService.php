<?php 

namespace App\Services;

use App\Http\Resources\PostCollection;
use App\Http\Resources\PostResouce;
use App\Http\Resources\PostResource;
use App\Repositories\PostRepository;
use App\Traits\HttpResponses;

class PostService
{
    use HttpResponses;

    public function __construct(
        private PostRepository $postRepository
    )
    {}

    public function getAllPosts()
    {
        $posts = $this->postRepository->findAll();

        $postsFormated = PostResource::collection($posts);

        $dataFormated = [
            'posts' => $postsFormated,
            'total' => $posts->total(),
            'current_page' => $posts->currentPage(),
            'per_page' => $posts->perPage(),
            'previous_page_url' => $posts->previousPageUrl(),
            'next_page_url' => $posts->nextPageUrl(),
        ];

        return $dataFormated;
    }

    public function getPost(int $id)
    {
        return $this->postRepository->find($id);
    }

    public function storePost(array $attributes)
    {
        $data = [
            'text' => $attributes['text'],
            'user_id' => auth()->user()->id,
        ];

        $post = $this->postRepository->create($data);

        if (!$post->wasRecentlyCreated) {
            return $this->error('Post já existente!', 400);
        }

        return new PostResource($post);
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
