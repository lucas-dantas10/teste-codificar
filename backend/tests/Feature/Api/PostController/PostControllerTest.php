<?php

use App\Http\Resources\PostResource;
use App\Models\User;
use Laravel\Sanctum\Sanctum;

use function Pest\Laravel\get;
use function Pest\Laravel\post;

uses()->group('posts');

it('list all posts', function () {
    $user = User::factory()->create();

    Sanctum::actingAs($user);

    $response = get('/api/v1/posts');

    $response->assertStatus(200);
    expect($response->original['data'])->toBeArray();
});

it('store post', function () {
    $user = User::factory()->create();
    $payload = [
        'text' => 'tesando text do post',
    ];    

    Sanctum::actingAs($user);

    $response = post('/api/v1/posts', $payload);

    $response->assertStatus(201);
    expect($response->original['data'])->toBeObject();
});

it('update post', function () {
    $response = $this->get('/api/postcontroller/postcontroller');

    $response->assertStatus(200);
})->todo();

it('delete post', function () {
    $response = $this->get('/api/postcontroller/postcontroller');

    $response->assertStatus(200);
})->todo();
