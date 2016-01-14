<?php

use Phinx\Migration\AbstractMigration;

class AddAccessLevelToAdmin extends AbstractMigration
{
  public function change()
  {
    $users = $this->table('users');
    $users->addColumn('access_level','integer', ['default' => '1'])
      ->save();
  }
}
