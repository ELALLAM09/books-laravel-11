<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
  use HasFactory;

  public function orders()
  {
    return $this->hasOne(Order::class, 'book_id');
  }

  protected $fillable = ['stock', 'available'];
}
