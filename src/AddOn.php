<?php
declare(strict_types=1);

namespace Itineris\GFLoqateBankVerification;

use GFAddOn;

class AddOn extends GFAddOn
{
    private static $_instance = null;
    protected $_version = Plugin::VERSION;
    protected $_min_gravityforms_version = MinimumRequirements::GRAVITY_FORMS_VERSION; // TODO: Doesn't seem working.
    protected $_slug = 'gf-loqate-bank-verification';
    protected $_path = 'gf-loqate-bank-verification/gf-loqate-bank-verification.php';
    protected $_full_path = __FILE__;
    protected $_title = 'GF Loqate Bank Verification';
    protected $_short_title = 'Bank Verification';
    protected $_url = 'https://github.com/ItinerisLtd/gf-loqate-bank-verification';

    public static function get_instance(): self
    {
        if (null === self::$_instance) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function minimum_requirements(): array
    {
        return MinimumRequirements::toArray();
    }

    public function plugin_settings_fields(): array
    {
        return SettingsFields::toArray();
    }
}
