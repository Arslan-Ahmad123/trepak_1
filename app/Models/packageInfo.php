<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class packageInfo extends Model
{
    use HasFactory;
    protected $fillable = [
        'packagename',
        'packagetype',
        'packageprice',
        'packagespecification',
        'packageduration',
    ];
}
