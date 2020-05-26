<?php

namespace enesyurtlu\Modman\Tests;

use enesyurtlu\Modman\Facades\ModManFacade;
use enesyurtlu\Modman\ModManServiceProvider;
use Orchestra\Testbench\TestCase;

class ModmanTest extends TestCase
{
    protected function getPackageProviders($app)
    {
        return [ModManServiceProvider::class];
    }

    protected function getPackageAliases($app)
    {
        return [
            'modman' => ModManFacade::class,
        ];
    }

    public function testExample()
    {
        $this->assertEquals(1, 1);
    }
}
