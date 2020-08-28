<?php

use Phinx\Migration\AbstractMigration;

class CreateUsersTable extends AbstractMigration
{
    public function up() {
        $table = $this->table('users', ['id' => false, 'primary_key' => ['id']]);
        $table->addColumn('id', 'biginteger',  ['identity' => true])
              ->addColumn('login', 'string', ['limit' => 255])
              ->addColumn('password', 'string', ['limit' => 60])
              ->addColumn('email', 'string', ['limit' => 255])
              ->addColumn('is_admin', 'boolean')
              ->create();
    }

    public function down() {
        $this->table('users')->drop();
    }
}
