<?php
return [

    /*
    |--------------------------------------------------------------------------
    | Role - Permissions
    |--------------------------------------------------------------------------
    |
    | This is a basic structure to provide role-permissions ability to specific users
    | the index represents the role field in users table and the array values are the permissions
    | note that 0 is the base role that should be with minimal privileges for authenticated users
    */

    0=>[
        'add',
    ],
    1 => [
        'add',
        'import'
        ]
    ];
