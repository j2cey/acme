<?php

use Phinx\Migration\AbstractMigration;

class AddSlugToPagesTable extends AbstractMigration
{
    public function change()
    {
      $users = $this->table('pages');
      $users->addColumn('slug','string', ['default' => ''])
        ->addIndex('slug', ['unique' => true])
        ->save();
    }
}
