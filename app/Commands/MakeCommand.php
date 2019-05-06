<?php

namespace Resume\Cli\Commands;

use LaravelZero\Framework\Commands\Command;
use Resume\Cli\Exceptions\ThemeNotFoundException;
use Resume\Cli\Repositories\ThemeRepository;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class MakeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'make';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate the HTML for your résumé from a JSON file.';

    /**
     * @var \Resume\Cli\Repositories\ThemeRepository
     */
    protected $themeRepository;

    /**
     * MakeCommand constructor.
     *
     * @param \Resume\Cli\Repositories\ThemeRepository $themeRepository
     */
    public function __construct(ThemeRepository $themeRepository)
    {
        parent::__construct();

        $this->themeRepository = $themeRepository;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     * @throws \InvalidArgumentException
     */
    public function handle(): void
    {
        // 1. Determine what theme to use for generating the résumé.
        try {
            $theme = $this->themeRepository->findByName(
                $this->option('theme')
            );
        } catch (ThemeNotFoundException $e) {
            $this->error($e->getMessage());

            exit(1);
        }

        // 2. Get the file to read the information from and load its contents into the theme.
        $file = $this->argument('source');

        $theme->load($file);

        // 3. Validate the contents against the theme's schema.
        $theme->validate();

        // 4. Get the stub(s) from the selected theme.

        // 5. Write them to the output folder.
        $output = $this->option('output');

        if (file_exists($output) && !$this->option('force')) {
            $this->error('Could not write to output, folder exists.');

            exit(1);
        }

        //
    }

    /**
     * @return array
     */
    protected function getArguments(): array
    {
        return [
            ['source', InputArgument::OPTIONAL, 'The JSON file to generate your résumé from.', 'resume.json'],
        ];
    }

    /**
     * @return array
     */
    protected function getOptions(): array
    {
        return [
            ['output', null, InputOption::VALUE_OPTIONAL, 'The name of the directory to generate the HTML in.', 'resume'],
            ['force', null, InputOption::VALUE_NONE, 'Override the folder if it already exists.'],
            ['theme', null, InputOption::VALUE_OPTIONAL, 'The theme to use when generating your résumé.', 'default'],
        ];
    }
}
