<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Misc
        $miscPermission = Permission::create(['name' => 'N/A']);

        // USER MODEL
        $userPermission1 = Permission::create(['name' => 'create:user']);
        $userPermission2 = Permission::create(['name' => 'show:user']);
        $userPermission3 = Permission::create(['name' => 'update:user']);
        $userPermission4 = Permission::create(['name' => 'delete:user']);

        // ROLE MODEL
        $rolePermission1 = Permission::create(['name' => 'create:role']);
        $rolePermission2 = Permission::create(['name' => 'show:role']);
        $rolePermission3 = Permission::create(['name' => 'update:role']);
        $rolePermission4 = Permission::create(['name' => 'delete:role']);

        // PERMISSION MODEL
        $permission1 = Permission::create(['name' => 'create:permission']);
        $permission2 = Permission::create(['name' => 'show:permission']);
        $permission3 = Permission::create(['name' => 'update:permission']);
        $permission4 = Permission::create(['name' => 'delete:permission']);

        // GAME
        $gamePermission1 = Permission::create(['name' => 'create:game']);
        $gamePermission2 = Permission::create(['name' => 'show:game']);
        $gamePermission3 = Permission::create(['name' => 'update:game']);
        $gamePermission4 = Permission::create(['name' => 'delete:game']);

        // POST
        $postPermission1 = Permission::create(['name' => 'create:post']);
        $postPermission2 = Permission::create(['name' => 'show:post']);
        $postPermission3 = Permission::create(['name' => 'update:post']);
        $postPermission4 = Permission::create(['name' => 'delete:post']);

        // EVENT
        $eventPermission1 = Permission::create(['name' => 'create:event']);
        $eventPermission2 = Permission::create(['name' => 'show:event']);
        $eventPermission3 = Permission::create(['name' => 'update:event']);
        $eventPermission4 = Permission::create(['name' => 'delete:event']);

        // ALBUM
        $albumPermission1 = Permission::create(['name' => 'create:album']);
        $albumPermission2 = Permission::create(['name' => 'show:album']);
        $albumPermission3 = Permission::create(['name' => 'update:album']);
        $albumPermission4 = Permission::create(['name' => 'delete:album']);

        // INVITATION
        $invitePermission1 = Permission::create(['name' => 'create:invitee']);

        // CREATE ROLES
        $userRole = Role::create(['name' => 'user'])->syncPermissions([
            $miscPermission,
        ]);

        $superAdminRole = Role::create(['name' => 'admin'])->syncPermissions([
            $userPermission1,
            $userPermission2,
            $userPermission3,
            $userPermission4,
            $rolePermission1,
            $rolePermission2,
            $rolePermission3,
            $rolePermission4,
            $permission1,
            $permission2,
            $permission3,
            $permission4,
            $gamePermission1,
            $gamePermission2,
            $gamePermission3,
            $gamePermission4,
            $postPermission1,
            $postPermission2,
            $postPermission3,
            $postPermission4,
            $eventPermission1,
            $eventPermission2,
            $eventPermission3,
            $eventPermission4,
            $albumPermission1,
            $albumPermission2,
            $albumPermission3,
            $albumPermission4,
            $invitePermission1,

        ]);
        $memberRole = Role::create(['name' => 'member'])->syncPermissions([
            $userPermission1,
            $userPermission3,
            $gamePermission1,
            $gamePermission3,
            $postPermission1,
            $postPermission3,
            $eventPermission1,
            $eventPermission3,
            $albumPermission1,
            $albumPermission3,
            $invitePermission1,
        ]);
    }
}
