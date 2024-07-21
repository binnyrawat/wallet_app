<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $fillable = ['start_date'];

    public function setStartDateAttribute($value){
        return $this->attributes['start_date'] = date("Y-m-d",strtotime($value));
    }

    public function getGroupAmountAttribute($value){
        return $value + 0;
    }
}
