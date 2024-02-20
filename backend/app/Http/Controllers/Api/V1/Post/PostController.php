<?php

namespace App\Http\Controllers\Api\V1\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Services\PostService;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;

class PostController extends Controller
{
    use HttpResponses;

    public function __construct(
        protected PostService $postService,
    )
    {}

    public function index(Request $request)
    {
        $posts = $this->postService->getAllPosts();

        return $this->response('Lista de posts', 200, $posts);
    }

    public function store(StorePostRequest $request)
    {
        $dataValidated = $request->validated();

        $postCreated = $this->postService->storePost($dataValidated);

        return $this->response('Post criado!', 201, $postCreated);
    }

    public function update(Request $request)
    {

    }

    public function destroy(Request $request)
    {

    }
    
}
    