<?php

namespace Tests\Commands;

beforeEach(fn () => $this->artisan('beyond:make:module User'));

test('can make dto', function () {
    $this->artisan('beyond:make:dto User/UserData');

    expect(base_path().'/modules/User/Domain/DataTransferObjects/UserData.php')
        ->toBeFile()
        ->toMatchNamespaceAndClassName()
        ->toPlaceholdersBeReplaced();
});
