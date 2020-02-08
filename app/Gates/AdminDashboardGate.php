<?php

namespace App\Gates;

use App\User;

class AdminDashboardGate
{
    public function attachRole(User $user)
    {
       return $user->hasRoles(['administrator']); 
    }

    public function detachRole(User $user)
    {
        return $user->hasRoles(['administrator']); 
    }
}