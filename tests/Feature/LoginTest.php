<?php

namespace Tests\Feature;

use Illuminate\Auth\Events\Logout;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_test_login_page_is_accessible(): void
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
        $response->assertSeeText("Email Address");
        $response->assertseetext("Password");
    }

    public function test_admin_can_login_to_app()
    {
    $response = $this -> post("/login", [
    "email" => "admin@bukubook.com",
    "password" => "4dm1n"
]);

    //berhasil dapat session
    $this->assertAuthenticated();

    //diarahkan kehalaman home
    $response->assertRedirect("/home");

    //dihalaman home ada welocome admin
    $responseHome = $this->get("/home");
    $responseHome->assertSeeText("ADMIN BUKUBOOK (ADMIN)");

    }

    public function test_logged_in_user_can_logout()
    {
        //login admin
        $response = $this -> post("/login", [
            "email" => "admin@bukubook.com",
            "password" => "4dm1n"]);

        //assert authenticated
        $this->assertAuthenticated();

        //request get ke home
        $response->assertRedirect("/home");

        //buat request method POST ke /logout
        $response=$this->post("/logout");

        //request get ke/Home
        $responseHome=$this->get("/home");

        //assert redirect ke halmaan login
        $responseHome->assertRedirect("/login");


    }
}
