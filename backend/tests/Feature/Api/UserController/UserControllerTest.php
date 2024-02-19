<?php

use App\Models\User;

use function Pest\Laravel\post;

uses()->group('users');

it('register a user', function () {
    $user = [
        'name' => 'teste',
        'email' => 'teste@gmail.com',
        'password' => '123456',
    ];

    $response = post('/api/v1/create/user', $user);

    $response->assertStatus(200);

    $response->assertStatus(200);
});

it('register user with invalid email', function () {
    $user = [
        'name' => 'teste',
        'email' => 'testegmail.com',
        'password' => '123456',
    ];

    $response = post('/api/v1/create/user', $user);

    $response->assertStatus(302);
});

it('register user with invalid password', function () {
    $user = [
        'name' => 'teste',
        'email' => 'teste@gmail.com',
        'password' => '12345',
    ];

    $response = post('/api/v1/create/user', $user);

    $response->assertStatus(302);
});

it('register existing user', function () {
    $user = User::factory()->create()->first();
    
    $userTest = [
        'name' => $user->name,
        'email' => $user->email,
        'password' => '123456'
    ];

    $response = post('/api/v1/create/user', $userTest);

    $response->assertStatus(302);
});
