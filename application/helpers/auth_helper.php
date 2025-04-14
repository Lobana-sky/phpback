<?php

use CodeIgniter\Model;
use Config\Database;

if (!function_exists('user_has_permission')) {
    function user_has_permission($permissionName): bool
    {
        $session = session();
        $userId = $session->get('user_id');

        if (!$userId) return false;

        $db = Database::connect();

        $builder = $db->table('users')
            ->select('permissions.name')
            ->join('roles', 'users.role_id = roles.id')
            ->join('role_permissions', 'roles.id = role_permissions.role_id')
            ->join('permissions', 'role_permissions.permission_id = permissions.id')
            ->where('users.id', $userId)
            ->where('permissions.name', $permissionName);

        return $builder->countAllResults() > 0;
    }
}
