<?php

/**
 * Plugin Name:       GF Loqate Bank Verification
 * Plugin URI:        https://github.com/ItinerisLtd/gf-loqate-bank-verification
 * Description:       Verify Gravity Forms bank details with Loqate bank verification API.
 * Version:           0.4.0
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

Plugin::run();
