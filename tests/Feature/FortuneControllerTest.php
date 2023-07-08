<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FortuneControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_dashboard_page_is_displayed(): void
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->get('/dashboard');

        $response->assertOk();
    }

    public function test_fortune_can_be_retrieved()
{
    $user = User::factory()->create();

    $this->actingAs($user);

    $response = $this->put(route('profile.update'), [
        'blood_type' => 'A',
        'birthday' => '1990-01-01',
    ]);

    $response
        ->assertSessionHasNoErrors()
        ->assertRedirect(route('fortune.show', ['blood_type' => 'A', 'birthday' => '1990-01-01']));

    $this->assertEquals('A', $user->fresh()->blood_type);
    $this->assertEquals('1990-01-01', $user->fresh()->birthday->format('Y-m-d'));
}
}
