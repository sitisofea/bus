<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SMS extends Model
{
    use HasFactory;

    protected $table = 'sms';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'title','content', 'date', 'time', 'status'];
}
