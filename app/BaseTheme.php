<?php

namespace Resume\Cli;

use Resume\Cli\Contracts\Theme;

class BaseTheme implements Theme
{
    /**
     * @var string
     */
    protected $json;

    /**
     * Load the contents of the résumé into the theme.
     *
     * @param string $json
     *
     * @return \Resume\Cli\Contracts\Theme
     */
    public function load($json): Theme
    {
        $this->json = $json;

        return $this;
    }

    /**
     * Validate the loaded JSON against the schema.
     *
     * @return \Resume\Cli\Contracts\Theme
     */
    public function validate(): Theme
    {
        // TODO: Implement validate() method.
    }
}
