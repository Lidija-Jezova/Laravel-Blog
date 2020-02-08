<?php

namespace App\Gates;

use App\User;

class DashboardGate
{
    public function attachRole(User $user, User $model)
    {
       return $user->hasRoles(['administrator']); 
    }

    public function detachRole(User $user, User $model)
    {
        return $user->hasRoles(['administrator']); 
    }
}