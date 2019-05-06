<?php

namespace Resume\Cli\Repositories;

use Resume\Cli\Exceptions\ThemeNotFoundException;
use Resume\Cli\BaseTheme;

class ThemeRepository
{
    /**
     * @param string $name
     *
     * @return \Resume\Cli\BaseTheme
     * @throws \Resume\Cli\Exceptions\ThemeNotFoundException
     */
    public function findByName($name): BaseTheme
    {
        if (false) {
            throw ThemeNotFoundException::byName($name);
        }

        return new BaseTheme();
    }
}
