# PlagiarismSearch

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]
[![Build Status][ico-travis]][link-travis]
[![StyleCI][ico-styleci]][link-styleci]

PlagiarismSearch.com is a leading plagiarism checking website that will provide you with an accurate report during a short timeframe. Prior to submitting your home assignments, run them through our plagiarism checker to make sure your content is authentic. Take a look at [contributing.md](contributing.md) to see a to do list.

## Installation

Via Composer

``` bash
$ composer require michaelgatuma/plagiarism-search
```

## Usage

Publish the config file

``` bash
$ php artisan vendor:publish --provider="Michaelgatuma\PlagiarismSearch\PlagiarismSearchServiceProvider" --tag="config"
```

### Creating Report

``` php
PlagiarismSearch::createReport()
    ->title("Plagiarism Sample Report")
    ->text(" lorem ipsum dolor sit ....")//Text for check.
    ->file(realpath('pdf-sample.pdf'))//Or upload file for check.
    ->files([
        realpath('pdf-sample.pdf'),
        realpath('pdf-sample2.pdf')
    ])//Or array of real paths
    ->create();
```

### Deleting Report

``` php
PlagiarismSearch::deleteReport(24332)->commit();
```

### Listing Report

``` php
PlagiarismSearch::listReports()
    ->reports(['324423', '231232'])//optional
    ->limit(20)//optional (default:10)
    ->pages(2)//optional (default:1)
    ->fetch();
```

### Updating Report

``` php
PlagiarismSearch::updateReport(743845)
    ->fields([
        'auth_key' => md5('secret'),
        'remote_id' => 'my-remote-id-100',
        'callback_url' => 'https://public-url.com/callback.php?id=743845',
        'title' => 'Title ',
    ])->commit();
```

### Viewing Report

``` php
PlagiarismSearch::viewReport(746734)->fetch();
```

### Report Status

``` php
PlagiarismSearch::getReportStatus(233231)->fetch();
```

## Change log

Please see the [changelog](changelog.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [contributing.md](contributing.md) for details and a todolist.

## Security

If you discover any security related issues, please email author@email.com instead of using the issue tracker.

## Credits

- [Author Name][link-author]
- [All Contributors][link-contributors]

## License

MIT. Please see the [license file](license.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/michaelgatuma/plagiarism-search.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/michaelgatuma/plagiarism-search.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/michaelgatuma/plagiarism-search/master.svg?style=flat-square
[ico-styleci]: https://styleci.io/repos/12345678/shield

[link-packagist]: https://packagist.org/packages/michaelgatuma/plagiarism-search
[link-downloads]: https://packagist.org/packages/michaelgatuma/plagiarism-search
[link-travis]: https://travis-ci.org/michaelgatuma/plagiarism-search
[link-styleci]: https://styleci.io/repos/12345678
[link-author]: https://github.com/michaelgatuma
[link-contributors]: ../../contributors
