<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    public function testLoginPage()
    {
        $this->get('/login')
            ->assertSeeText("Login");
    }

    public function testLoginSuccess()
    {
        $this->post('/login', [
            'user'  => "Miftah",
            'password'  => "Rahasia"
        ])
            ->assertSessionHas('user', 'Miftah')
            ->assertRedirect('/');
    }

    public function testValidationError()
    {
        $this->post('/login', [])
            ->assertSeeText("User or password is required");
    }

    public function testLoginFailed()
    {
        $this->post('/login', [
            'user'  => "Gadis",
            'password'  => "Syalwa"
        ])
            ->assertSeeText("User or password is wrong");
    }
}
