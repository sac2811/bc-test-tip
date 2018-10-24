<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\Tip;

class CrudTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testsRegistersSuccessfully()
    {
        $payload = [
            'name' => 'John',
            'email' => 'john@gmail.com',
            'password' => '123456',
            'c_password' => '123456',
        ];

        $this->json('POST', '/api/register', $payload)
            ->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    'token',
                    'name'
                ],
            ]);
    }

    public function testsTipsAreCreatedCorrectly()
    {
        $user = factory(User::class)->create();

        $payload = [
            'title' => 'Test Tip 1',
            'description' => 'This tip is created with PHPUnit',
        ];

        $this->actingAs($user, 'api')
            ->json('POST', '/api/tips', $payload)
            ->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    'guid'
                ],
            ]);
    }

    public function testsTipsAreUpdatedCorrectly()
    {
        $user = factory(User::class)->create();

        $tip = factory(Tip::class)->create([
            'title' => 'New Test Tip',
            'description' => 'New Test Tip description',
        ]);

        $payload = [
            'title' => 'New Test Tip Updated',
            'description' => 'New Test Tip description Updated',
        ];

        $response = $this->actingAs($user, 'api')
            ->json('PUT', '/api/tips/' . $tip->guid, $payload)
            ->assertStatus(200)
            ->assertJsonFragment([
                'title' => 'New Test Tip Updated'
            ]);
    }

    public function testsTipsAreDeletedCorrectly()
    {
        $user = factory(User::class)->create();

        $tip = factory(Tip::class)->create([
            'title' => 'First Tip',
            'description' => 'First Tip description',
        ]);

        $this->actingAs($user, 'api')
            ->json('DELETE', '/api/tips/' . $tip->guid, [])
            ->assertStatus(200);
    }

    public function testTipsAreListedCorrectly()
    {
        factory(Tip::class)->create([
            'title' => 'First Tip',
            'description' => 'First Tip description'
        ]);

        factory(Tip::class)->create([
            'title' => 'Second Tip',
            'description' => 'Second Tip description'
        ]);

        $user = factory(User::class)->create();

        $response = $this->actingAs($user, 'api')
            ->json('GET', '/api/tips', [])
            ->assertStatus(200)
            ->assertJsonFragment([
                'title' => 'First Tip',
                'title' => 'Second Tip'
            ]);
    }
}
