<?php
namespace App\Models\Users;

use App\Models\Users\User;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cleb extends User{

    protected $guard_name = 'web';

    protected static $singleTableType = 'cleb';


    public function data(): HasMany{ 
        return $this->hasMany(UserData::class,'user_id');
    }

}
