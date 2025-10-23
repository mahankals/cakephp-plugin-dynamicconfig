<?php

declare(strict_types=1);

use Migrations\BaseSeed;

/**
 * AppSettings seed.
 */
class AppSettingsSeed extends BaseSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * https://book.cakephp.org/migrations/4/en/seeding.html
     *
     * @return void
     */
    public function run(): void
    {
        $data = [
            [
                'config_key' => 'Email.default.from',
                'value' => 'no-reply@example.com',
                'type' => 'string',
            ],
            [
                'config_key' => 'EmailTransport.default.host',
                'value' => 'localhost',
                'type' => 'string',
            ],
            [
                'config_key' => 'EmailTransport.default.port',
                'value' => 25,
                'type' => 'integer',
            ],
            [
                'config_key' => 'EmailTransport.default.username',
                'value' => 'user',
                'type' => 'string',
            ],
            [
                'config_key' => 'EmailTransport.default.password',
                'value' => 'secret',
                'type' => 'string',
            ],
            [
                'config_key' => 'EmailTransport.default.tls',
                'value' => 0,
                'type' => 'boolean',
            ],
        ];

        $table = $this->table('app_settings');
        $table->insert($data)->save();
    }
}
