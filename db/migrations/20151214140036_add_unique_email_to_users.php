<?php

use Phinx\Migration\AbstractMigration;

class AddUniqueEmailToUsers extends AbstractMigration
{
  public function change()
  {
    $users = $this->table('users');
    $users->addIndex('email', ['unique' => true])
      ->save();
  }
}
