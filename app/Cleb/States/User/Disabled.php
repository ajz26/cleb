<?php
namespace App\Cleb\States\User;

class Disabled extends UserState
{

    public static $name = 'Disabled';


    public function color(): string
    {
        return 'reed';
    }
}