<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    //
    public function group(){
        return $this->belongsToMany("App\Group","contact_groups","contact_id", "group_id");
    }
}
