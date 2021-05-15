<?php

namespace Tests\Unit\Setup;

use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * Class DatabaseSeederTest
 *
 * @package Tests\Unit\Setup
 */
class DatabaseSeederTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_seeds_database()
    {
        $this->seed(DatabaseSeeder::class);

        $this->expectNotToPerformAssertions();
    }
}
