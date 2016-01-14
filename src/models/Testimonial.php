<?php namespace Acme\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Testimonial extends Eloquent
{
  public function User()
  {
    return $this->hasOne('Acme\models\User');
  }
}
