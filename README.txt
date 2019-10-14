=== GF Loqate Bank Verification ===

Contributors: itinerisltd, tangrufus
Tags: gravity forms, gravityforms, loqate, bank verification, direct debit
Requires at least: 4.9.10
Tested up to: 5.3
Requires PHP: 7.2
Stable tag: 0.2.1
License: MIT
License URI: https://opensource.org/licenses/MIT

Verify Gravity Forms bank details with Loqate bank verification API.

== Description ==

## Goal

[GF Loqate Bank Verification](https://github.com/ItinerisLtd/gf-loqate-bank-verification) verifies [Gravity Forms](https://www.gravityforms.com/) bank details with [Loqate bank verification API](https://www.loqate.com/resources/support/apis/BankAccountValidation/Interactive/Validate/2/).

It validates the bank details (branch sort codes and bank account numbers):
- indicates whether the account number and sortcode are valid
- indicates whether the account can accept direct debits. Certain accounts (e.g. savings) will not accept direct debits

## Usage

1. Get your service key from Loqate
    1. Register an [Loqate](https://www.loqate.com) account
    1. Add **Bank Verification**
    1. Get the **Service key**
1. Plugin Setting
    1. Head to **Form** » **Settings** » **Bank Verification**
    1. Enter your Loqate bank verification **service key**
    1. A green check appears if the service key is valid
1. Form Fields Setting
    1. Add 2 **Single Line Text** fields
        - Sort Code
        - Account Number
    1. Mark both fields **required**
    1. Set their **Custom CSS Class** to:
        - `gflbv-sort-code-is-correct`
        - `gflbv-account-number-is-correct`

## For Developers

Fork the plugin on [GitHub](https://github.com/ItinerisLtd/gf-loqate-bank-verification).

== Frequently Asked Questions ==

### What are the minimum requirements

- PHP v7.2
- WordPress v4.9.10
- [Gravity Forms](https://www.Gravity Forms.com/) v2.4.14.4

### Does it support checking for Direct Debit capability?

Yes. Certain accounts (e.g. savings) will not accept direct debits. To verify bank details are both correct and Direct Debit capable, set the fields' **Custom CSS Class** to:
- `gflbv-sort-code-is-correct gflbv-sort-code-direct-debit-capable`
- `gflbv-account-number-is-correct gflbv-account-number-direct-debit-capable`

### Does it cache Loqate API responses?

Yes. Loqate API responses are cached in [WordPress transients](https://codex.wordpress.org/Transients_API) for an hour.

To clear caches:

```bash
wp transient delete --all
```

### Will you add support for older PHP versions?

Never! This plugin will only work on [actively supported PHP versions](https://secure.php.net/supported-versions.php).

Don't use it on **end of life** or **security fixes only** PHP versions.

### It looks awesome. Where can I find more goodies like this?

- Articles on [Itineris' blog](https://www.itineris.co.uk/blog/)
- More projects on [Itineris' GitHub profile](https://github.com/itinerisltd)
- More plugins on [Itineris](https://profiles.wordpress.org/itinerisltd/#content-plugins) and [TangRufus](https://profiles.wordpress.org/tangrufus/#content-plugins) wp.org profiles
- Follow [@itineris_ltd](https://twitter.com/itineris_ltd) and [@TangRufus](https://twitter.com/tangrufus) on Twitter
- Hire [Itineris](https://www.itineris.co.uk/services/) to build your next awesome site

### Where can I give ★★★★★ reviews?

Thanks! Glad you like it. It's important to let my boss knows somebody is using this project. Please consider:

- leave a 5-star review on [wordpress.org](https://wordpress.org/support/plugin/gf-loqate-bank-verification/reviews/)
- tweet something good with mentioning [@itineris_ltd](https://twitter.com/itineris_ltd) and [@TangRufus](https://twitter.com/tangrufus)
- ★ star this [Github repo](https://github.com/ItinerisLtd/gf-loqate-bank-verification)
- watch this [Github repo](https://github.com/ItinerisLtd/gf-loqate-bank-verification)
- write blog posts
- submit [pull requests](https://github.com/ItinerisLtd/gf-loqate-bank-verification)
- [hire Itineris](https://www.itineris.co.uk/services/)

### Where to report security related issues?

If you discover any security related issues, please email [hello@itineris.co.uk](mailto:hello@itineris.co.uk) instead of using the issue tracker.

== Screenshots ==

1. Loqate Bank Verification Server Key
1. Plugin Setting
1. Form Fields Setting - Sort Code
1. Form Fields Setting - Account Number

== Changelog ==

Please see [CHANGELOG](https://github.com/ItinerisLtd/gf-loqate-bank-verification/blob/master/CHANGELOG.md) for more information on what has changed recently.
