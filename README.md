![resume-cli](https://cloud.githubusercontent.com/assets/11269635/25568009/f8525176-2df9-11e7-977f-600428558ce1.jpg)

# Resume CLI

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-circleci]][link-circleci]
[![StyleCI][ico-styleci]][link-styleci]

Generate a beautiful HTML résumé based on a JSON file. You can use [the pre-built templates],
download [one of the readily available ones](https://packagist.org/?p=0&hFR%5Btype%5D%5B0%5D=resume-cli-theme), or [write your own] with HTML and CSS. 

Resume CLI was inspired by (and loosely based on) [JSON Resume](https://jsonresume.org/), and
built using [Laravel Zero](https://github.com/laravel-zero/laravel-zero).


## Index
- [Installation](#installation)
  - [Downloading](#downloading)
- [Usage](#usage)
  - [Customization](#customization)
- [Contributing](#contributing)
- [License](#license)

## Installation
You'll have to follow a couple of simple steps to install this package.

### Downloading
Via [composer](http://getcomposer.org):

```bash
$ composer global require sven/resume-cli
```

Or add the package to your dependencies in `composer.json` and run
`composer global update` on the command line to download the package:

```json
{
    "require": {
        "sven/resume-cli": "^1.0"
    }
}
```

Ensure Composer's global bin directory is included in your path. This directory is located
at `~/.composer/vendor/bin` on macOS / Linux, and at `%APPDATA%/Composer/vendor/bin` on Windows.

## Usage
To make a résumé, create a file named `resume.json` with the following contents:

```json
{
    "name": "John Doe",
    "email": "john@example.com"
}
```

Running `resume make` will create a new folder (`resume/` by default) with the HTML and CSS
required to publish and distribute your CV online.

**Note:** if the folder `resume` already exists, the command will exit without changing
or overwriting anything.

### Customization
Of course, you may want to customize the way your résumé is generated. You can do so by
passing the following options to `resume make`:

#### Source file name
To change what file is used for generating your résumé, pass the name of the file to the
`make` command:

```bash
$ resume make source.json
```

#### Output directory
To specify the name of the output directory for your generated résumé, use the `--output`
option:

```bash
$ resume make source.json --output="public"
```

This will create a `public` folder and put the generated HTML and CSS in there.

#### Forcefully generating
You may use the `--force` flag to overwrite any files or folders already in the output
directory:

```bash
$ resume make --output="public" --force
```

#### Theme
You can select a different theme using the `--theme` option:

```bash
# Generate your CV using the "flat" theme.
$ resume make source.json --theme="flat"
```

More info about adding and writing your own themes can be found [here]().

### Previewing your CV
Of course, you'll want to preview your CV before publishing it online. You can do so by
using the `serve` subcommand:

```bash
# Serve your CV from the default directory ('resume')
$ resume serve

# Serve your CV from a custom directory ('public', in this case)
$ resume serve public
```

This will start [PHP's default built-in webserver](https://secure.php.net/manual/en/features.commandline.webserver.php)
on its default port (`8000`). To change the port it's served on, use the `--port` option:

```bash
# Serve the CV on port 1337 instead of 8000
$ resume serve --port=1337
```

## Contributing
All contributions (pull requests, issues and feature requests) are
welcome. Make sure to read through the [CONTRIBUTING.md](CONTRIBUTING.md) first,
though. See the [contributors page](../../graphs/contributors) for all contributors.

## License
`sven/resume-cli` is licensed under the MIT License (MIT). Please see the
[license file](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/sven/resume-cli.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-green.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/sven/resume-cli.svg?style=flat-square
[ico-circleci]: https://img.shields.io/circleci/project/github/svenluijten/resume-cli.svg?style=flat-square
[ico-styleci]: https://styleci.io/repos/:styleci/shield

[link-packagist]: https://packagist.org/packages/sven/resume-cli
[link-downloads]: https://packagist.org/packages/sven/resume-cli
[link-circleci]: https://circleci.com/gh/svenluijten/resume-cli
[link-styleci]: https://styleci.io/repos/:styleci
