<?php

return [
    "module" => "human-resources",
    "permissions" => [
        // roles basicos del sistema
        [
            "resource" => "intern",
            "action" => "create",
            "roles" => ["owner"],
        ],
        [
            "resource" => "staff",
            "action" => "create",
            "roles" => ["owner"],
        ],
        [
            "resource" => "owner",
            "action" => "create",
            "roles" => ["administrator"],
        ],
        //
        [
            "resource" => "administrator",
            "action" => "create",
            "roles" => ["super_administrator"],
        ],

        [
            "resource" => "super_administrator",
            "action" => "create",
            "roles" => ["super_administrator"],
        ],
    ],
];
