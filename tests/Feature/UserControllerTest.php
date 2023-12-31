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

    public function testLoginPageForMember()
    {
        $this->withSession([
            'user'  => "Miftah"
        ])
            ->get('/login')
            ->assertRedirect('/');
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

    public function testLoginForUserAlreadyLogin()
    {
        $this->withSession([
            'user'  => "Miftah"
        ])
            ->post('/login', [
                'user'  => "Miftah",
                'password'  => "Rahasia"
            ])
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

    public function testLogout()
    {
        $this->withSession([
            'user'  => 'Miftah'
        ])->post('/logout')
            ->assertRedirect('/')
            ->assertSessionMissing('Miftah');
    }

    public function testLogoutGuest()
    {
        $this->post('/logout')
            ->assertRedirect('/');
    }
}
