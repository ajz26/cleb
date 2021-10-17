<?php
namespace App\Cleb\States\User;

class Pending extends UserState
{

    public static $name = 'Pending';


    public function color(): string
    {
        return 'yelow';
    }
}