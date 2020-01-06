<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;

class GroupController extends Controller
{
    //
    public function add(Request $request){
        if($request->id){ // if naay id pasabot Update niya  ang data
            $newGroup = Group::find($request->id);
        } else { // if walay id, pasabot nag create siya
            $newGroup = new Group;
        }       
        $newGroup->name = $request->name;
        $newGroup->user_id = \Auth::user()->id;
        $newGroup->save();

        return [ 
            "success"   => true, 
            "group"     => $newGroup
        ];
    }

    public function get(Request $request){
        if($request->id){ // if naay id, pasabot retreive siyag specific nga group
            $group = Group::find($request->id);
            return ["success" => true, "group" => $group];
        }
        // if wala, pasabot kuhaon niya tanan groups
        $groups = \Auth::user()->groups;
        return [
            "success" => true,
            "groups"    => $groups
        ];
    }

    public function delete(Request $request){
        $id = $request->id;
        if($id){ // icheck if naay id, para idelete, if wala error message
            $group = Group::find($id);
            $group->contacts()->detach();
            $group->delete();
            return ["success" => true];
        }
        return ["success"=>false];
    }
}
