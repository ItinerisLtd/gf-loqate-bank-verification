<?php

/**
 * Plugin Name:       GF Loqate Bank Verification
 * Plugin URI:        https://github.com/ItinerisLtd/gf-loqate-bank-verification
 * Description:       Verify Gravity Forms bank details with Loqate bank verification API.
 * Version:           0.2.0
 * Requires at least: 4.9.10
 * Requires PHP:      7.2
 * Author:            Itineris Limited
 * Author URI:        https://www.itineris.co.uk
 * License:           MIT
 * License URI:       https://opensource.org/licenses/MIT
 * Text Domain:       gf-loqate-bank-verification
 */

declare(strict_types=1);

namespace Itineris\GFLoqateBankVerification;

// If this file is called directly, abort.
if (! defined('WPINC')) {
    die;
}

if (file_exists(__DIR__ . '/vendor/autoload.php')) {
    require_once __DIR__ . '/vendor/autoload.php';
}

// Polyfill `array_key_first` for PHP 7.2.
if (! function_exists('array_key_first')) {
    function array_key_first(array $arr)
    {
        foreach ($arr as $key => $_) {
            return $key;
        }
        
        return null;
    }
}

Plugin::run();
