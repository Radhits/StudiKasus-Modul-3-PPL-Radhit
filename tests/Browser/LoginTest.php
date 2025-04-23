<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;

class LoginTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * Test login pengguna.
     * @group login
     */
    public function testUserCanLogin(): void
    {
        // Buat user dummy untuk login
        $user = User::factory()->create([
            'email' => 'loginuser@example.com',
            'password' => bcrypt('password123'),
        ]);

        $this->browse(function (Browser $browser) use ($user) {
            $browser->visit('/login')
                    ->type('email', $user->email)
                    ->type('password', 'password123')
                    ->press('LOG IN') // Ganti jika tombolnya tidak bernama "Login"
                    ->assertPathIs('/dashboard') // Ganti jika redirect-nya berbeda
                    ->assertSee('Dashboard'); // Ganti sesuai konten halaman setelah login
        });
    }
}
