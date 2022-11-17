<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'user_alert_create',
            ],
            [
                'id'    => 18,
                'title' => 'user_alert_show',
            ],
            [
                'id'    => 19,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => 20,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => 21,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 22,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 23,
                'title' => 'vote_create',
            ],
            [
                'id'    => 24,
                'title' => 'vote_edit',
            ],
            [
                'id'    => 25,
                'title' => 'vote_show',
            ],
            [
                'id'    => 26,
                'title' => 'vote_delete',
            ],
            [
                'id'    => 27,
                'title' => 'vote_access',
            ],
            [
                'id'    => 28,
                'title' => 'incidence_create',
            ],
            [
                'id'    => 29,
                'title' => 'incidence_edit',
            ],
            [
                'id'    => 30,
                'title' => 'incidence_show',
            ],
            [
                'id'    => 31,
                'title' => 'incidence_delete',
            ],
            [
                'id'    => 32,
                'title' => 'incidence_access',
            ],
            [
                'id'    => 33,
                'title' => 'party_create',
            ],
            [
                'id'    => 34,
                'title' => 'party_edit',
            ],
            [
                'id'    => 35,
                'title' => 'party_show',
            ],
            [
                'id'    => 36,
                'title' => 'party_delete',
            ],
            [
                'id'    => 37,
                'title' => 'party_access',
            ],
            [
                'id'    => 38,
                'title' => 'location_access',
            ],
            [
                'id'    => 39,
                'title' => 'pooling_unit_create',
            ],
            [
                'id'    => 40,
                'title' => 'pooling_unit_edit',
            ],
            [
                'id'    => 41,
                'title' => 'pooling_unit_show',
            ],
            [
                'id'    => 42,
                'title' => 'pooling_unit_delete',
            ],
            [
                'id'    => 43,
                'title' => 'pooling_unit_access',
            ],
            [
                'id'    => 44,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
