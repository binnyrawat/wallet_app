<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupMember extends Model
{
    use HasFactory;

    public function group_data(){
        return $this->belongsTo(Group::class,'group_id','id');
    }

    public function users(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
