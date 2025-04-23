<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class EditNotesTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group edit-note
     */
    public function testeditnote(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->assertSee('Enterprise Application Development')
                ->clickLink('Log in')
                ->waitForLocation('/login')
                ->assertPathIs('/login')
                ->type('email', 'testuser@example.com')
                ->type('password', 'password123')
                ->press('LOG IN')
                ->waitForLocation('/dashboard')
                ->assertPathIs('/dashboard')
                ->assertSee('Dashboard')
                ->clickLink('Notes')
                ->waitForLocation('/notes')
                ->assertPathIs('/notes')
                ->clickLink('Edit')
                ->waitForLocation('/edit-note-page/1')
                ->assertPathIs('/edit-note-page/1')
                ->type('title', 'PPL')
                ->type('description', 'PPL modul 3 sih ternyata sulit')
                ->press('UPDATE')
                ->waitForLocation('/notes')
                ->assertPathIs('/notes');
        });
    }
}
