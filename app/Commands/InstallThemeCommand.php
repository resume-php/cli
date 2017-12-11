<?php

namespace App\Commands;

use LaravelZero\Framework\Commands\Command;
use LaravelZero\Framework\Contracts\Providers\Composer;
use Symfony\Component\Console\Input\InputArgument;

class InstallThemeCommand extends Command
{
    /**
     * @var string
     */
    protected $name = 'theme:install';

    /**
     * @var string
     */
    protected $description = 'Install a theme via composer.';

    /**
     * @var \LaravelZero\Framework\Contracts\Providers\Composer
     */
    protected $composer;

    /**
     * InstallThemeCommand constructor.
     *
     * @param \LaravelZero\Framework\Contracts\Providers\Composer $composer
     */
    public function __construct(Composer $composer = null)
    {
        parent::__construct();

        $this->composer = $composer;
    }

    /**
     * @return void
     */
    public function handle(): void
    {
        $theme = $this->argument('theme');

        $this->composer->require($theme);

        $this->line('Successfully installed '.$theme.'.');
    }

    /**
     * @return array
     */
    protected function getArguments(): array
    {
        return [
            ['theme', InputArgument::REQUIRED, 'The theme to install.'],
        ];
    }
}
