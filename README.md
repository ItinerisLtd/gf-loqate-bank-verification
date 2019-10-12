# GF Loqate Bank Verification

[![CircleCI](https://circleci.com/gh/ItinerisLtd/gf-loqate-bank-verification.svg?style=svg)](https://circleci.com/gh/ItinerisLtd/gf-loqate-bank-verification)
[![Packagist Version](https://img.shields.io/packagist/v/itinerisltd/gf-loqate-bank-verification.svg)](https://packagist.org/packages/itinerisltd/gf-loqate-bank-verification)
[![PHP from Packagist](https://img.shields.io/packagist/php-v/itinerisltd/gf-loqate-bank-verification.svg)](https://packagist.org/packages/itinerisltd/gf-loqate-bank-verification)
[![Packagist Downloads](https://img.shields.io/packagist/dt/itinerisltd/gf-loqate-bank-verification.svg)](https://packagist.org/packages/itinerisltd/gf-loqate-bank-verification)
[![GitHub License](https://img.shields.io/github/license/itinerisltd/gf-loqate-bank-verification.svg)](https://github.com/ItinerisLtd/gf-loqate-bank-verification/blob/master/LICENSE)
[![Hire Itineris](https://img.shields.io/badge/Hire-Itineris-ff69b4.svg)](https://www.itineris.co.uk/contact/)
![Twitter Follow](https://img.shields.io/twitter/follow/itineris_ltd?style=plastic)
![Twitter Follow](https://img.shields.io/twitter/follow/tangrufus?style=plastic)

[GF Loqate Bank Verification](https://github.com/ItinerisLtd/gf-loqate-bank-verification) provides a clean, simple way to configure [the WordPress-bundled PHPMailer library](https://core.trac.wordpress.org/browser/trunk/src/wp-includes/class-phpmailer.php), allowing you to quickly get started sending mail through a local or cloud based service of your choice.

<!-- START doctoc generated TOC please keep comment here to allow auto update -->
<!-- DON'T EDIT THIS SECTION, INSTEAD RE-RUN doctoc TO UPDATE -->


- [Goal](#goal)
- [Minimum Requirements](#minimum-requirements)
- [Installation](#installation)
  - [Composer (Recommended)](#composer-recommended)
  - [Build from Source](#build-from-source)
- [Usage](#usage)
- [FAQ](#faq)
  - [Will you add support for older PHP versions?](#will-you-add-support-for-older-php-versions)
  - [It looks awesome. Where can I find some more goodies like this?](#it-looks-awesome-where-can-i-find-some-more-goodies-like-this)
  - [This isn't on wp.org. Where can I give a :star::star::star::star::star: review?](#this-isnt-on-wporg-where-can-i-give-a-starstarstarstarstar-review)
- [Testing](#testing)
- [Feedback](#feedback)
- [Change Log](#change-log)
- [Security](#security)
- [Credits](#credits)
- [License](#license)

<!-- END doctoc generated TOC please keep comment here to allow auto update -->

## Goal

## Minimum Requirements

- PHP v7.2
- WordPress v5.2
- GravityForms v2.4.14.4

## Installation

### Composer (Recommended)

```sh-session
composer require itinerisltd/gf-loqate-bank-verification
```

### Build from Source

```sh-session
# Make sure you use the same PHP version as remote servers.
php -v

# Checkout source code
git clone https://github.com/ItinerisLtd/gf-loqate-bank-verification.git
cd gf-loqate-bank-verification
git checkout <the-tag-or-the-branch-or-the-commit>

# Build the zip file
composer release:build
```

Then, install `release/gf-loqate-bank-verification.zip` [as usual](https://codex.wordpress.org/Managing_Plugins#Installing_Plugins).

## Usage

## FAQ

### Will you add support for older PHP versions?

Never! This plugin will only work on [actively supported PHP versions](https://secure.php.net/supported-versions.php).

Don't use it on **end of life** or **security fixes only** PHP versions.

### It looks awesome. Where can I find some more goodies like this?

- Articles on [Itineris' blog](https://www.itineris.co.uk/blog/)
- More projects on [Itineris' GitHub profile](https://github.com/itinerisltd)
- More plugins on [Itineris](https://profiles.wordpress.org/itinerisltd/#content-plugins) and [TangRufus](https://profiles.wordpress.org/tangrufus/#content-plugins) wp.org profiles
- Follow [@itineris_ltd](https://twitter.com/itineris_ltd) and [@TangRufus](https://twitter.com/tangrufus) on Twitter
- Hire [Itineris](https://www.itineris.co.uk/services/) to build your next awesome site

### This isn't on wp.org. Where can I give a :star::star::star::star::star: review?

Thanks! Glad you like it. It's important to let my boss knows somebody is using this project. Please consider:

- tweet something good with mentioning [@itineris_ltd](https://twitter.com/itineris_ltd) and [@TangRufus](https://twitter.com/tangrufus)
- :star: star this [Github repo](https://github.com/ItinerisLtd/gf-loqate-bank-verification)
- :eyes: watch this [Github repo](https://github.com/ItinerisLtd/gf-loqate-bank-verification)
- write blog posts
- submit [pull requests](https://github.com/ItinerisLtd/gf-loqate-bank-verification)
- [hire Itineris](https://www.itineris.co.uk/services/)

## Testing

```sh-session
composer phpstan:analyse
composer style:check
```

Pull requests without tests will not be accepted!

## Feedback

**Please provide feedback!** We want to make this library useful in as many projects as possible.
Please submit an [issue](https://github.com/ItinerisLtd/gf-loqate-bank-verification/issues/new) and point out what you do and don't like, or fork the project and make suggestions.
**No issue is too small.**

## Change Log

Please see [CHANGELOG](./CHANGELOG.md) for more information on what has changed recently.

## Security

If you discover any security related issues, please email [dev@itineris.co.uk](mailto:dev@itineris.co.uk) instead of using the issue tracker.

## Credits

[GF Loqate Bank Verification](https://github.com/ItinerisLtd/gf-loqate-bank-verification) is a [Itineris Limited](https://www.itineris.co.uk/) project created by [Tang Rufus](https://typist.tech).

Full list of contributors can be found [here](https://github.com/ItinerisLtd/gf-loqate-bank-verification/graphs/contributors).

## License

[GF Loqate Bank Verification](https://github.com/ItinerisLtd/gf-loqate-bank-verification) is released under the [MIT License](https://opensource.org/licenses/MIT).
