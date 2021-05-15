<?php

namespace Tests\Feature\Setup;

use App\Domain\Users\Enums\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * Class MediaTest
 *
 * @package Tests\Feature\Setup
 */
class MediaTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        $this->withoutExceptionHandling();
    }

    /** @test */
    public function user_can_access_media_list()
    {
        $this->get(route("medias.index"))
            ->assertStatus(200);
    }
}
