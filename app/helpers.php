<?php

namespace App;

use App\Constants\Role;


/*function isGranted(array|string $roles): bool
{
    // Obtenez le rôle de l'utilisateur actuel ou définissez-le sur USER par défaut
    $userRole = auth()->user()?->role ?? Role::USER->value;

    // Hiérarchie des rôles
    $rolesHierarchy = [
        Role::USER->value => 1,
        Role::ADMIN->value => 2,
        Role::DAF->value => 3,
        Role::CSAF->value => 4,
    ];

    // Si $roles est une chaîne, transformez-la en tableau
    $roles = is_array($roles) ? $roles : [$roles];


    return $rolesHierarchy[$userRole] >= min(
        array_map(
            fn($role) => $rolesHierarchy[$role],

            $roles
        )
    );

}*/

?>