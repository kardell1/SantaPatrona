<?php

return [
    "module" => "configuration-inventory",
    "permissions" => [
        // ====================================================================================
        // ============================== Permisos de recepcion ===============================
        // ====================================================================================
        [
            "resource" => "alerts",
            "action" => "view",
            "roles" => ["super_administrator"],
        ],
        [
            "resource" => "alerts",
            "action" => "create",
            "roles" => ["super_administrator"],
        ],
        [
            "resource" => "alerts",
            "action" => "update",
            "roles" => ["super_administrator"],
        ],
        [
            "resource" => "alerts",
            "action" => "show",
            "roles" => ["super_administrator"],
        ],
        [
            "resource" => "alerts",
            "action" => "delete",
            "roles" => ["super_administrator"],
        ],
        [
            "resource" => "alerts",
            "action" => "index",
            "roles" => ["super_administrator"],
        ]
    ],
];
