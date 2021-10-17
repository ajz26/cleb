<?php
namespace App\Cleb\States\User;

use Spatie\ModelStates\State;
use Spatie\ModelStates\StateConfig;


abstract class UserState extends State
{
    abstract public function color(): string;


    public static function config(): StateConfig
    {
        return parent::config()
            ->default(Pending::class)
            ->allowTransition(Pending::class, Active::class)
            ->allowTransition(Active::class, Disabled::class)
        ;
    }
    
}