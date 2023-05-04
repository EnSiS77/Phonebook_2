<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Database\Eloquent\Factory;
use App\Models\User;


class ContactsTest extends TestCase
{


    // use RefreshDatabase, WithFaker;


    // private $admin;

    // protected function setUp(): void
    // {
    //     parent::setUp();
    //     $this->admin = factory(User::class)->create(['role' => 'admin']);
    //     $this->faker = app(Factory::class)->make();
    // }

    // /**
    //  * A basic feature test example.
    //  *
    //  * @return void
    //  */
    // public function test_create_contact_successful(): void
    // {
    //     $this->withoutExceptionHandling();

    //     $contact = [
    //         'name' => 'Sanjar Sanjarovich',
    //         'email' => 'Sanjar@Sanjarovich.com',
    //         'phone' => '+9595959595959595',
    //     ];

    //     $response = $this->actingAs($this->admin)->post('book/contacts', $contact);

    //     $response->assertStatus(302);
    //     $response->assertRedirect('book/contacts');

    //     $this->assertDatabaseHas('phonebook', $contact);
    // }
}
