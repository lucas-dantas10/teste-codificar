<?php

uses()->group('auth');

it('user login', function () {
    $payload = [
        'name' => 'teste',
        'email' => 'teste@gmail.com',
        'password' => 'teste123',
    ];

    $response = $this->post('/api/v1/login', $payload);

    $response->assertStatus(200);
    // $response = $this->get('/api/usercontroller/usercontroller');

    // $response->assertStatus(200);
});

it('user logout', function () {
    // $response = $this->get('/api/usercontroller/usercontroller');

    // $response->assertStatus(200);
})->todo();
