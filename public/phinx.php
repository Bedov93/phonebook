<?php

$config = require_once 'config.php';

return [
        "paths" => [
            "migrations" => "%%PHINX_CONFIG_DIR%%/application/database/migrations",
            "seeds" => "%%PHINX_CONFIG_DIR%%/application/database/seeds"
        ],
        "default_database" => $config['db']['name'],
        "environments" => [
            "development" => [
                "adapter" => "mysql",
                "host" => $config['db']['host'],
                "name" => $config['db']['name'],
                "user" => $config['db']['user'],
                "pass" => $config['db']['password'],
                "port" => $config['db']['port'],
                "charset" => 'utf8',
                "collation" => "utf8_unicode_ci"
            ]
        ],
        "version_order" => "creation"
    ];