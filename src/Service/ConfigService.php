<?php

declare(strict_types=1);

namespace DynamicConfig\Service;

use Cake\Core\Configure;
use Cake\ORM\TableRegistry;
use Cake\Routing\Router;

class ConfigService
{
    public static function reload(): void
    {
        $AppSettings = TableRegistry::getTableLocator()->get('DynamicConfig.AppSettings');
        $settings = $AppSettings->find()->select(['config_key', 'value', 'type'])->all();

        foreach ($settings as $setting) {
            Configure::write($setting->config_key, self::castValue($setting->value, $setting->type));
        }

        static::apply();
    }

    public static function castValue($value, $type)
    {
        return match (strtolower($type)) {
            'int', 'integer' => (int)$value,
            'float' => (float)$value,
            'bool', 'boolean' => filter_var($value, FILTER_VALIDATE_BOOLEAN),
            'json' => json_decode($value, true),
            default => $value,
        };
    }

    public static function apply(): void
    {
        /*
        * When debug = true the metadata cache should only last for a short time.
        */
        if (Configure::read('debug')) {
            Configure::write('Cache._cake_model_.duration', '+2 minutes');
            Configure::write('Cache._cake_translations_.duration', '+2 minutes');
        }

        /*
        * Set the default server timezone. Using UTC makes time calculations / conversions easier.
        * Check https://php.net/manual/en/timezones.php for list of valid timezone strings.
        */
        date_default_timezone_set(Configure::read('App.defaultTimezone'));

        /*
        * Configure the mbstring extension to use the correct encoding.
        */
        mb_internal_encoding(Configure::read('App.encoding'));

        /*
        * Set the default locale. This controls how dates, number and currency is
        * formatted and sets the default language to use for translations.
        */
        ini_set('intl.default_locale', Configure::read('App.defaultLocale'));

        /*
        * Set the full base URL.
        * This URL is used as the base of all absolute links.
        * Can be very useful for CLI/Commandline applications.
        */
        $fullBaseUrl = Configure::read('App.fullBaseUrl');
        if (!$fullBaseUrl) {
            /*
            * When using proxies or load balancers, SSL/TLS connections might
            * get terminated before reaching the server. If you trust the proxy,
            * you can enable `$trustProxy` to rely on the `X-Forwarded-Proto`
            * header to determine whether to generate URLs using `https`.
            *
            * See also https://book.cakephp.org/5/en/controllers/request-response.html#trusting-proxy-headers
            */
            $trustProxy = false;

            $s = null;
            if (env('HTTPS') || ($trustProxy && env('HTTP_X_FORWARDED_PROTO') === 'https')) {
                $s = 's';
            }

            $httpHost = env('HTTP_HOST');
            if ($httpHost) {
                $fullBaseUrl = 'http' . $s . '://' . $httpHost;
            }
            unset($httpHost, $s);
        }
        if ($fullBaseUrl) {
            Router::fullBaseUrl($fullBaseUrl);
        }
    }
}