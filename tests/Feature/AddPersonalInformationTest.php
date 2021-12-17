<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class AddPersonalInformationTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->actingAs(User::factory()->create());
    }

    /** @test */
    public function it_can_fill_the_personal_information()
    {
        $response = $this->postJson('/register/personal-information', [
            'age' => 21,
            'country' => 'nld'
        ]);

        $this->assertDatabaseHas('personal_information', [
            'user_id' => Auth::id(),
            'age' => 21,
            'country' => 'nld'
        ]);
    }

    /** @test */
    public function it_gives_validation_errors()
    {
        $this->postJson('/register/personal-information', [
            'age' => 'Not an integer',
            'country' => ''
        ])->assertJsonValidationErrors(['age', 'country']);
    }

    /** @test */
    public function it_redirects_to_profile_information()
    {
        $this->postJson('/register/personal-information', [
            'age' => 21,
            'country' => 'nld'
        ])->assertRedirect(route('profile-information.index'));
    }
}
