<?php
namespace App\Models\Users;


use App\Models\Users\UserData;
use Spatie\ModelStates\HasStates;
use App\Cleb\States\User\UserState;
use App\Traits\Uuid;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Nanigans\SingleTableInheritance\SingleTableInheritanceTrait;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable, HasRoles, HasStates , SingleTableInheritanceTrait, Uuid;

    protected $table = "users";

    protected static    $singleTableTypeField   = 'type';
    protected static    $singleTableType        = 'user';
    protected static    $singleTableSubclasses  = [Cleb::class];
    public              $incrementing           = false;
    protected           $keyType                = 'uuid';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'state',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'type',
        'email_verified_at'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'state'             => UserState::class,

    ];

    public function is_active(){
        return $this->status;
    }


    public function data(): HasMany{ 
        return $this->hasMany(UserData::class);
    }
}
