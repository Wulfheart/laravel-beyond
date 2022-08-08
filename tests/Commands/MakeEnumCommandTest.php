<?php

namespace Tests\Commands;

test('cannot make enum on php 8.0', function () {
    $this->artisan('beyond:make:enum')
        ->expectsOutput('Your version 8.0 does not match the required version 8.1 of this command.')
        ->assertExitCode(1);
})->skip(version_compare(PHP_VERSION, '8.1', '>='));

test('can make enum', function () {
    $this->artisan('beyond:make:enum User/UserStatusEnum');

    expect(base_path() . '/src/Domain/User/Enums/UserStatusEnum.php')
        ->toBeFile()
        ->toMatchNamespaceAndClassName()
        ->toPlaceholdersBeReplaced();
})->skip(version_compare(PHP_VERSION, '8.1', '<'));
