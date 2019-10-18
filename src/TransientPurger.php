<?php

declare(strict_types=1);

namespace Itineris\GFLoqateBankVerification;

class TransientPurger
{
    /**
     * Purge transient cache by key prefix.
     *
     * @param string $prefix Transient key prefix.
     *
     * @see https://css-tricks.com/the-deal-with-wordpress-transients/
     */
    public static function purge(string $prefix): void
    {
        $wpdb = $GLOBALS['wpdb'];

        $sql = $wpdb->prepare(
            "SELECT option_name FROM $wpdb->options WHERE option_name LIKE %s",
            '_transient_timeout_' . $wpdb->esc_like($prefix) . '%'
        );

        array_map(function (string $transient): void {
            // Strip away the WordPress prefix in order to arrive at the transient key.
            $key = str_replace('_transient_timeout_', '', $transient);

            // Now that we have the key, use WordPress core to the delete the transient.
            delete_transient($key);
        }, $wpdb->get_col($sql)); // phpcs:ignore

        // Sometimes transients are not in the DB, so we have to do this too.
        wp_cache_flush();
    }
}
