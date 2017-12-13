<?php

namespace Resume\Cli\Tests;

use PHPUnit\Framework\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    /**
     * The Laravel Zero application instance.
     *
     * @var \LaravelZero\Framework\Contracts\Application
     */
    protected $app;

    /**
     * Setup the test environment.
     */
    protected function setUp(): void
    {
        $this->app = $this->createApplication();
    }

    /**
     * @param string $command
     * @param array  $arguments
     */
    protected function call($command, array $arguments = [])
    {
        $command = $this->app->getContainer()->make($command);

        $this->app->add($command);

        $this->app->call($command->getName(), $arguments);
    }
}
