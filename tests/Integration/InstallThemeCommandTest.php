<?php

namespace ResumeCli\Tests\Integration;

use App\Commands\InstallThemeCommand;
use LaravelZero\Framework\Contracts\Providers\Composer;
use Mockery as m;
use ResumeCli\Tests\TestCase;

class InstallThemeCommandTest extends TestCase
{
    /** @test */
    function it_requires_the_right_package()
    {
        $mock = m::spy(Composer::class);

        app()->instance(Composer::class, $mock);

        $this->call(InstallThemeCommand::class, [
            'theme' => 'test/resume-theme',
        ]);

        $mock->shouldHaveReceived('require')
            ->with('test/resume-theme');

        $this->assertContains('test/resume-theme', $this->app->output());
    }
}
