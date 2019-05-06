<?php

namespace Resume\Cli\Contracts;

interface Theme
{
    /**
     * Load the contents of the résumé into the theme.
     *
     * @param string $json
     *
     * @return \Resume\Cli\Contracts\Theme
     */
    public function load($json): Theme;

    /**
     * Validate the loaded JSON against the schema.
     *
     * @return \Resume\Cli\Contracts\Theme
     */
    public function validate(): Theme;
}
