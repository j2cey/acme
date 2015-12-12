<?php

use Phinx\Migration\AbstractMigration;

class SeedTestimonialsTable extends AbstractMigration
{
  public function up()
  {
    $user_id = 1;

    $this->execute("
      insert into testimonials (title, testimonial, user_id)
      values
      ('First testi title', 'This is my full testimonial', '$user_id')
    ");
  }

  public function down()
  {

  }
}
