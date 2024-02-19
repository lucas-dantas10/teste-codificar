<?php

use App\Models\User;
use Laravel\Sanctum\Sanctum;

use function Pest\Laravel\actingAs;

uses()->group('auth');

it('user login', function () {
    $user = User::factory()->create()->first();

    $payload = [
        'name' => $user->name,
        'email' => $user->email,
        'password' => 'password',
    ];

    $response = $this->post('/api/v1/login', $payload);
    $response->assertStatus(200);
});

it('invalid user credentials login', function () {
    $payload = [
        'name' => 'teste erro',
        'email' => 'teste.erro@example.com',
        'password' => 'testeerro',
    ];

    $response = $this->post('/api/v1/login', $payload);
    $response->assertStatus(422);
});

it('invalid input for login', function () {
    $payload = [
        'name' => 'teste erro',
        'email' => 'teste.erro@example.com',
        'password' => 'teste',
    ];

    $response = $this->post('/api/v1/login', $payload);
    $response->assertStatus(400);
});

it('user logout', function () {
    $user = User::factory()->create();

    Sanctum::actingAs($user);

    $response = $this->post('/api/v1/logout');

    $response->assertStatus(200);

    // $this->assertNull($user->currentAccessToken());
});
