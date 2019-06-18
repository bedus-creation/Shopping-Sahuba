<?php

namespace Tests\Feature\Client;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;
use App\User;
use App\Mail\SignUpEmail;

class RegisterTest extends TestCase
{

    use RefreshDatabase;

    /** @test */
    public function email_is_sent_when_user_gets_signed_up()
    {
        Mail::fake();
        $this->be(factory(User::class)->create());
        Mail::assertQueued(SignUpEmail::class, function ($email) {
            return  $email->to(auth()->user()->email);
        });
    }

    /** @test @dataProvider invalidSignupDataprovider */
    public function sign_up_is_invalid_for_the_invalidSignupDataprovider($data)
    {
        $this->withoutExceptionHandling();
        $this->expectException(ValidationException::class);
        $this->post('register', $data)
            ->assertSuccessful();
    }
    public function invalidSignupDataprovider()
    {
        return [
            [
                [
                    'email' => 'tmgbedu@gmail.com'
                ]
            ]
        ];
    }
}
