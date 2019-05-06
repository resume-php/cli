<?php

namespace Resume\Cli\Exceptions;

class ThemeNotFoundException extends \InvalidArgumentException
{
    /**
     * @param string $name
     *
     * @return \Resume\Cli\Exceptions\ThemeNotFoundException
     */
    public static function byName($name): ThemeNotFoundException
    {
        return new self('No theme found by the name "'.$name.'".');
    }
}
