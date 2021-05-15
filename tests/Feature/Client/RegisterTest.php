<?php

namespace Tests\Feature\Client;

use App\Jobs\Client\VerifyEmail as AppVerifyEmail;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Queue;
use Illuminate\Validation\ValidationException;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /** @test */
    public function email_is_sent_when_user_gets_signed_up()
    {
        $this->withoutExceptionHandling();
        Queue::fake();
        $data = [
            "email" => $this->faker->word.'@gmail.com',
            "name" => $this->faker->name,
            "password" => 'secret',
            "password_confirmation" => 'secret',
        ];
        $this->post('register', $data);
        Queue::assertPushed(AppVerifyEmail::class);
    }

    /**
     * @dataProvider invalidSignupDataProvider
     *
     * @test
     */
    public function sign_up_is_invalid_for_the_invalidSignupDataprovider($data)
    {
        $this->withoutExceptionHandling();

        $this->expectException(ValidationException::class);

        $this->post('register', $data)
            ->assertSuccessful();
    }

    public function invalidSignupDataProvider()
    {
        return [
            [
                [
                    'email' => 'tmgbedu@gmail.com',
                ],
            ],
            [
                [
                    'email' => 'tmgbedu@asdf.com',
                    "name" => "Bedram Tamang",
                    "password" => 'secret',
                    "password_confirmation" => 'secret',
                ],
            ],
        ];
    }
}
