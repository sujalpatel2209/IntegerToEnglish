# Convert Integer to English Words

[![Latest Version on Packagist](https://img.shields.io/packagist/v/sujalpatel/inttoenglish.svg?style=flat-square)](https://packagist.org/packages/sujalpatel/inttoenglish)
[![Build Status](https://img.shields.io/travis/sujalpatel/inttoenglish/master.svg?style=flat-square)](https://travis-ci.org/sujalpatel/inttoenglish)
[![Quality Score](https://img.shields.io/scrutinizer/g/sujalpatel/inttoenglish.svg?style=flat-square)](https://scrutinizer-ci.com/g/sujalpatel/inttoenglish)
[![Total Downloads](https://img.shields.io/packagist/dt/sujalpatel/inttoenglish.svg?style=flat-square)](https://packagist.org/packages/sujalpatel/inttoenglish)

Laravel package for converting numeric value to english words.

## Installation

You can install the package via composer:

```bash
composer require sujalpatel/inttoenglish
```

## Usage

``` php
IntToEnglish::Int2Eng(1000); // One Thousand
IntToEnglish::Int2Eng(10500); // Ten Thousand Five hundred
```

## Example

Controller

``` php

use Illuminate\Http\Request;
use SujalPatel\IntToEnglish\IntToEnglish;

class TestController extends Controller
{
    public function index() {
            echo IntToEnglish::Int2Eng(4500000); //Four Million Five Hundred Thousand 
    }
}
```

Route
``` php
Route::get('/', 'TestController@index');
```
## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email sujalpatel022@gmail.com instead of using the issue tracker.

## Credits

- [Sujal Patel](https://github.com/sujalpatel2209)
- [Laravel Package Boilerplate](https://laravelpackageboilerplate.com)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
