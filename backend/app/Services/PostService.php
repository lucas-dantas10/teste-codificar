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

        return $this->response('Lista de posts', 200, $dataFormated);
    }

    public function getPost(int $id)
    {
        $post = $this->postRepository->find($id);

        return new PostResource($post);
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

        return $this->response('Post criado!', 201, new PostResource($post));
    }

    public function updatePost(int $id, array $attributes)
    {
        $post = $this->getPost($id);

        if ($post->user->id != auth()->user()->id) {
            return $this->error('Você não tem permissão para esta ação', 403, ['Permissão negada']);
        }
        
        $this->postRepository->update($id, $attributes);
        $postUpdated = $this->getPost($id);

        return $this->response('Post atualizado!' ,201, new PostResource($postUpdated));
    }

    public function deletePost(int $id)
    {
        $post = $this->getPost($id);

        if ($post->user->id != auth()->user()->id) {
            return $this->error('Você não tem permissão para esta ação', 403, ['Permissão negada']);
        }

        $this->postRepository->delete($id);

        return $this->response('Post deletado!', 200);
    }
}
