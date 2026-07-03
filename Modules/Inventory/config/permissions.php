
<?php

return [
    "module" => "inventory",
    "permissions" => [
        // ====================================================================================
        // ============================== Permisos de recepcion ===============================
        // ====================================================================================
        [
            "resource" => "reception",
            "action" => "view",
            "roles" => ["super_administrator"],
        ],
        [
            "resource" => "reception",
            "action" => "create",
            "roles" => ["super_administrator"],
        ],
        [
            "resource" => "reception",
            "action" => "update",
            "roles" => ["super_administrator"],
        ],
        [
            "resource" => "reception",
            "action" => "show",
            "roles" => ["super_administrator"],
        ],
        [
            "resource" => "reception",
            "action" => "delete",
            "roles" => ["super_administrator"],
        ],
        [
            "resource" => "reception",
            "action" => "index",
            "roles" => ["super_administrator"],
        ],
        // ====================================================================================
        // ============================== Permisos de transferencia ===========================
        // ====================================================================================
        [
            "resource" => "transfer",
            "action" => "view",
            "roles" => ["super_administrator"],
        ],
        [
            "resource" => "transfer",
            "action" => "create",
            "roles" => ["super_administrator"],
        ],
        [
            "resource" => "transfer",
            "action" => "update",
            "roles" => ["super_administrator"],
        ],
        [
            "resource" => "transfer",
            "action" => "show",
            "roles" => ["super_administrator"],
        ],
        [
            "resource" => "transfer",
            "action" => "delete",
            "roles" => ["super_administrator"],
        ],
        [
            "resource" => "transfer",
            "action" => "index",
            "roles" => ["super_administrator"],
        ],

        // ====================================================================================
        // ============================== Permisos de reposicion ==============================
        // ====================================================================================
        [
            "resource" => "restock",
            "action" => "view",
            "roles" => ["super_administrator"],
        ],
        [
            "resource" => "restock",
            "action" => "create",
            "roles" => ["super_administrator"],
        ],
        [
            "resource" => "restock",
            "action" => "update",
            "roles" => ["super_administrator"],
        ],
        [
            "resource" => "restock",
            "action" => "show",
            "roles" => ["super_administrator"],
        ],
        [
            "resource" => "restock",
            "action" => "delete",
            "roles" => ["super_administrator"],
        ],
        [
            "resource" => "restock",
            "action" => "index",
            "roles" => ["super_administrator"],
        ],
    ],
];
