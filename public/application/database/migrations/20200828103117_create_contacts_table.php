<?php


use Phinx\Migration\AbstractMigration;

class CreateContactsTable extends AbstractMigration
{
   public function up()
   {
       $table = $this->table('contacts', ['id' => false, 'primary_key' => ['id']]);
       $table->addColumn('id', 'biginteger',  ['identity' => true])
           ->addColumn('user_id', 'biginteger')
           ->addColumn('first_name', 'string', ['limit' => 255])
           ->addColumn('last_name', 'string', ['limit' => 255])
           ->addColumn('email', 'string', ['limit' => 255])
           ->addColumn('phone', 'string', ['limit' => 128])
           ->addColumn('photo', 'string', ['limit' => 255,'null' => true])
           ->addTimestamps()
           ->create();
   }

   public function down()
   {
       $this->table('contacts')->drop();
   }
}
