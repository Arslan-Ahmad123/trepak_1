<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class engCategory extends Model
{
    use HasFactory;
      protected $fillable = [
        'engrcategory',
        'engrcategorylogo',
    ];
    public function user(){
      return $this->belongsTo(User::class);
    }
}
