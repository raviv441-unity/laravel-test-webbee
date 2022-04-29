<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{


	public function parent() {

        return $this->hasOne('App\Models\MenuItem', 'id', 'parent_id');

    }

    public function children() {

        return $this->hasMany('App\Models\MenuItem', 'parent_id', 'id');

    }  

    public static function tree() {

        return static::with(implode('.', array_fill(0, 4, 'children')))->where('parent_id', '=', NULL)->get();

    }

}
