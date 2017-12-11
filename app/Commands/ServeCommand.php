<?php

namespace App\Commands;

use LaravelZero\Framework\Commands\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Process\PhpExecutableFinder;

class ServeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'serve';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Preview your generated résumé using PHP\'s built-in webserver.';

    /**
     * Execute the console command.
     *
     * @return mixed
     * @throws \InvalidArgumentException
     */
    public function handle(): void
    {
        $directory = $this->argument('directory');

        if (!is_dir($directory)) {
            $this->error(
                sprintf('The directory "%1$s" does not exist. Run `resume make --output=%1$s`.', $directory)
            );

            exit(1);
        }

        chdir($directory);

        $this->info(
            sprintf('Resume preview started: http://%s:%s', $this->host(), $this->port())
        );
        $this->info('Stop the server with CTRL+C.');

        passthru($this->command($this->host(), $this->port()), $exitCode);

        exit($exitCode);
    }

    /**
     * @param string $host
     * @param int    $port
     *
     * @return string
     */
    protected function command($host, $port): string
    {
        $php = (new PhpExecutableFinder)->find(false);

        return vsprintf('%s -S %s:%s index.html', [
            $php, $host, $port,
        ]);
    }

    /**
     * @return array
     */
    protected function getArguments(): array
    {
        return [
            ['directory', InputArgument::OPTIONAL, 'The directory to serve your résumé from.', 'resume'],
        ];
    }

    /**
     * @return array
     */
    protected function getOptions(): array
    {
        return [
            ['host', null, InputOption::VALUE_OPTIONAL, 'The hostname to use to preview your résumé.', '127.0.0.1'],
            ['port', null, InputOption::VALUE_OPTIONAL, 'The port to serve the webserver on.', 8000],
        ];
    }

    /**
     * @return string
     */
    protected function host(): string
    {
        return $this->option('host');
    }

    /**
     * @return string
     */
    protected function port(): string
    {
        return $this->option('port');
    }
}
