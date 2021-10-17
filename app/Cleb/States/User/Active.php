<?php
namespace App\Cleb\States\User;

class Active extends UserState
{

    public static $name = 'Active';


    public function color(): string
    {
        return 'green';
    }
}