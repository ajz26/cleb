<?php
namespace App\Models\Users;


use App\Models\Users\User;
use Illuminate\Database\Eloquent\Model;

class UserData extends Model{


    public function user(){
        return $this->belongsTo(User::class);
    }

    public function cleb(){
        return $this->belongsTo(Cleb::class);
    }

}
