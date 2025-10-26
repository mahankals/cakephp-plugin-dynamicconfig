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
        $table->addColumn('module', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
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
            'default' => 'string',
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('options', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->create();

        // Add default mail configuration
        $this->execute("
            INSERT INTO app_settings (module, config_key, value, type)
            VALUES
            ('App', 'App.defaultTimezone', 'UTC', 'string'),
            ('App', 'Mail.default.from', 'no-reply@example.com', 'string'),
            ('App', 'EmailTransport.default.host', 'localhost', 'string'),
            ('App', 'EmailTransport.default.port', '25', 'integer'),
            ('App', 'EmailTransport.default.username', 'user', 'string'),
            ('App', 'EmailTransport.default.password', 'secret', 'string'),
            ('App', 'EmailTransport.default.tls', '1', 'boolean')
        ");
    }
}
