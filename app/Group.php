<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    //
    public function contacts(){
        return $this->belongsToMany("App\Contact","contact_groups","group_id","contact_id");
    }

    public function user(){
        return $this->belongsTo("App\User");
    }
}
