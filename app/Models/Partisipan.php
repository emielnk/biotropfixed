<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partisipan extends Model
{
    protected $table = 'partisipan';
    protected $primaryKey = 'id_user';
    public $timestamps = false;
}