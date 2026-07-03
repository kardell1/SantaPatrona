<?php
// Tipo de permiso RBAC , sobre reglas de negocio y modulos de acceso
//
return [
    "module" => "human-resources",
    "permissions" => [
        // roles basicos del sistema
        [
            "resource" => "products",
            "action" => "read",
            "roles" => ["owner" , "super_administrator"],
        ],
        [
            "resource" => "products",
            "action" => "create",
            "roles" => ["owner" , "super_administrator" ],
        ],
        [
            "resource" => "products",
            "action" => "update",
            "roles" => ["administrator" , "super_administrator" ],
        ],
        //
        [
            "resource" => "products",
            "action" => "show",
            "roles" => ["administrator" , "super_administrator" ],
        ],

        // roles basicos del sistema
        [
            "resource" => "inventories",
            "action" => "read",
            "roles" => ["owner" , "super_administrator" ],
        ],
        // registrar
        [
            "resource" => "inventories",
            "action" => "create",
            "roles" => ["owner" , "super_administrator" ],
        ],
        // actualizar
        [
            "resource" => "inventories",
            "action" => "update",
            "roles" => ["administrator" , "super_administrator" ],
        ],
        //
        [
            "resource" => "inventories",
            "action" => "show",
            "roles" => ["administrator" , "super_administrator" ],
        ],





        /* [ */
        /*     "resource" => "super_administrator", */
        /*     "action" => "create", */
        /*     "roles" => ["super_administrator"], */
        /* ], */
    ],
];
