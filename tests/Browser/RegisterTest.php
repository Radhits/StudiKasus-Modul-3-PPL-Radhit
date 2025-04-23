<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RegisterTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * Test registrasi pengguna baru.
     * @group register
     */
    public function testUserCanRegister(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register')
                    ->type('name', 'Test User')
                    ->type('email', 'testuser@example.com')
                    ->type('password', 'password123')
                    ->type('password_confirmation', 'password123')
                    ->press('REGISTER')
                    ->assertPathIs('/dashboard') // Sesuaikan jika redirect-nya beda
                    ->assertSee('Dashboard'); // Sesuaikan dengan konten yang muncul setelah login
        });
    }
}
