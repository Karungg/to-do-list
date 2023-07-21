<?php

namespace Tests\Feature;

use App\Services\UserServices;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserServicesTest extends TestCase
{
    private UserServices $userServices;

    public function setUp(): void
    {
        parent::setUp();

        $this->userServices = $this->app->make(UserServices::class);
    }

    public function testSample()
    {
        self::assertTrue(true);
    }

    public function testLoginSuccess()
    {
        self::assertTrue($this->userServices->login("Miftah", "Rahasia"));
    }

    public function testLoginUserNotFound()
    {
        self::assertFalse($this->userServices->login("Gadis", "Syalwa"));
    }

    public function testLoginWrongPassword()
    {
        self::assertFalse($this->userServices->login("Miftah", "Salah"));
    }
}
