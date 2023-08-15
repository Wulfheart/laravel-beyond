<?php

namespace Tests\Commands;

use Illuminate\Testing\PendingCommand;
use Tests\TestCase;

class MakeActionCommandTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->artisan('beyond:make:module User');
    }

    public function testCanMakeAction(): void
    {
        $this->artisan('beyond:make:action User.UserStoreAction');

        $file = beyond_modules_path('User/Domain/Actions/UserStoreAction.php');
        $contents = file_get_contents($file);

        $this->assertFileExists($file);
        $this->assertStringNotContainsString('{{ namespace }}', $contents);
        $this->assertStringNotContainsString('{{ className }}', $contents);
    }

    public function testCanMakeActionUsingForce(): void
    {
        $this->artisan('beyond:make:action User.UserStoreAction');

        $file = beyond_modules_path('User/Domain/Actions/UserStoreAction.php');
        $contents = file_get_contents($file);

        $this->assertFileExists($file);
        $this->assertStringNotContainsString('{{ namespace }}', $contents);
        $this->assertStringNotContainsString('{{ className }}', $contents);

        $code = $this->artisan('beyond:make:action User.UserStoreAction --force');

        $code->assertOk();
    }
}
