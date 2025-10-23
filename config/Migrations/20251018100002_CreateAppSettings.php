<?php

declare(strict_types=1);

use Migrations\BaseMigration;

class CreateAppSettings extends BaseMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/migrations/4/en/migrations.html#the-change-method
     *
     * @return void
     */
    public function change(): void
    {
        $table = $this->table('app_settings');
        $table->addColumn('config_key', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('value', 'text', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('type', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->create();

        // Add default mail configuration
        $this->execute("
            INSERT INTO app_settings (config_key, value, type)
            VALUES
            ('App.defaultTimezone', 'UTC', 'string'),
            ('Mail.default.from', 'no-reply@example.com', 'string'),
            ('EmailTransport.default.host', 'localhost', 'string'),
            ('EmailTransport.default.port', '25', 'integer'),
            ('EmailTransport.default.username', 'user', 'string'),
            ('EmailTransport.default.password', 'secret', 'string'),
            ('EmailTransport.default.tls', '1', 'boolean')
        ");
    }
}
