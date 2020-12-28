<?php
namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class UtilisateurFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'Utilisateur';
    }
}
