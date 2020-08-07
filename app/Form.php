<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    protected $guarded = ['id'];  //idは含みません、保存時。auto_incrementにしてるから
    protected $table = 'l_form';  //table name
    public static $rules = [
        'fullname' => 'required',   //validation
        'gender' => 'required',  //validation
        'email' => 'required',  //validation
        
        
    ];

    public function scopeFlg ($query, $num) {    //local scope
        return $query->where ('flg', $num);
    }
}
