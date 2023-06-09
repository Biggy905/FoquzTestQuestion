<?php

namespace app\console\migrations;

use yii\db\Migration;

/**
 * Class M230428123128InsertToRbac
 */
final class M230428124433InsertToRbac extends Migration
{
    public function up(): void
    {
        $this->batchInsert(
            'auth_item_group',
            [
                'code',
                'name',
                'created_at',
                'updated_at',
            ],
            [
                ['userCommonPermissions', 'User common permission', 1590500441, 1590500441],
                ['userManagement', 'User management', 1590500441, 1590500441],
            ],
        );

        $this->batchInsert(
            'auth_item',
            [
                'name',
                'type',
                'description',
                'rule_name',
                'data',
                'created_at',
                'updated_at',
                'group_code',
            ],
            [
                ['/*', 3, NULL, NULL, NULL, 1590500441, 1590500441, NULL],
                ['/base/*', 3, NULL, NULL, NULL, 1590681644, 1590681644, NULL],
                ['/base/captcha', 3, NULL, NULL, NULL, 1590681644, 1590681644, NULL],
                ['/base/error', 3, NULL, NULL, NULL, 1590681644, 1590681644, NULL],
                ['/debug/*', 3, NULL, NULL, NULL, 1590681644, 1590681644, NULL],
                ['/debug/default/*', 3, NULL, NULL, NULL, 1590681644, 1590681644, NULL],
                ['/debug/default/db-explain', 3, NULL, NULL, NULL, 1590681644, 1590681644, NULL],
                ['/debug/default/download-mail', 3, NULL, NULL, NULL, 1590681644, 1590681644, NULL],
                ['/debug/default/index', 3, NULL, NULL, NULL, 1590681644, 1590681644, NULL],
                ['/debug/default/toolbar', 3, NULL, NULL, NULL, 1590681644, 1590681644, NULL],
                ['/debug/default/view', 3, NULL, NULL, NULL, 1590681644, 1590681644, NULL],
                ['/debug/user/*', 3, NULL, NULL, NULL, 1590681644, 1590681644, NULL],
                ['/debug/user/reset-identity', 3, NULL, NULL, NULL, 1590681644, 1590681644, NULL],
                ['/debug/user/set-identity', 3, NULL, NULL, NULL, 1590681644, 1590681644, NULL],
                ['/gii/*', 3, NULL, NULL, NULL, 1590500441, 1590500441, NULL],
                ['/gii/default/*', 3, NULL, NULL, NULL, 1590500441, 1590500441, NULL],
                ['/gii/default/action', 3, NULL, NULL, NULL, 1590500441, 1590500441, NULL],
                ['/gii/default/diff', 3, NULL, NULL, NULL, 1590500441, 1590500441, NULL],
                ['/gii/default/index', 3, NULL, NULL, NULL, 1590500441, 1590500441, NULL],
                ['/gii/default/preview', 3, NULL, NULL, NULL, 1590500441, 1590500441, NULL],
                ['/gii/default/view', 3, NULL, NULL, NULL, 1590500441, 1590500441, NULL],
                ['/patientss/*', 3, NULL, NULL, NULL, 1590681644, 1590681644, NULL],
                ['/patientss/captcha', 3, NULL, NULL, NULL, 1590681644, 1590681644, NULL],
                ['/patientss/create', 3, NULL, NULL, NULL, 1590681644, 1590681644, NULL],
                ['/patientss/delete', 3, NULL, NULL, NULL, 1590681644, 1590681644, NULL],
                ['/patientss/error', 3, NULL, NULL, NULL, 1590681644, 1590681644, NULL],
                ['/patientss/index', 3, NULL, NULL, NULL, 1590681644, 1590681644, NULL],
                ['/patientss/update', 3, NULL, NULL, NULL, 1590681644, 1590681644, NULL],
                ['/patientss/view', 3, NULL, NULL, NULL, 1590681644, 1590681644, NULL],
                ['/polyclinics/*', 3, NULL, NULL, NULL, 1590681643, 1590681643, NULL],
                ['/polyclinics/captcha', 3, NULL, NULL, NULL, 1590681643, 1590681643, NULL],
                ['/polyclinics/create', 3, NULL, NULL, NULL, 1590681643, 1590681643, NULL],
                ['/polyclinics/delete', 3, NULL, NULL, NULL, 1590681643, 1590681643, NULL],
                ['/polyclinics/error', 3, NULL, NULL, NULL, 1590681643, 1590681643, NULL],
                ['/polyclinics/index', 3, NULL, NULL, NULL, 1590681643, 1590681643, NULL],
                ['/polyclinics/update', 3, NULL, NULL, NULL, 1590681643, 1590681643, NULL],
                ['/polyclinics/view', 3, NULL, NULL, NULL, 1590681643, 1590681643, NULL],
                ['/site/*', 3, NULL, NULL, NULL, 1590681643, 1590681643, NULL],
                ['/site/about', 3, NULL, NULL, NULL, 1590681643, 1590681643, NULL],
                ['/site/captcha', 3, NULL, NULL, NULL, 1590681643, 1590681643, NULL],
                ['/site/contact', 3, NULL, NULL, NULL, 1590681643, 1590681643, NULL],
                ['/site/error', 3, NULL, NULL, NULL, 1590681643, 1590681643, NULL],
                ['/site/index', 3, NULL, NULL, NULL, 1590681643, 1590681643, NULL],
                ['/site/login', 3, NULL, NULL, NULL, 1590681643, 1590681643, NULL],
                ['/site/logout', 3, NULL, NULL, NULL, 1590681643, 1590681643, NULL],
                ['/user-management/*', 3, NULL, NULL, NULL, 1590500441, 1590500441, NULL],
                ['/user-management/auth-item-group/*', 3, NULL, NULL, NULL, 1590681644, 1590681644, NULL],
                ['/user-management/auth-item-group/bulk-activate', 3, NULL, NULL, NULL, 1590681644, 1590681644, NULL],
                ['/user-management/auth-item-group/bulk-deactivate', 3, NULL, NULL, NULL, 1590681644, 1590681644, NULL],
                ['/user-management/auth-item-group/bulk-delete', 3, NULL, NULL, NULL, 1590681644, 1590681644, NULL],
                ['/user-management/auth-item-group/create', 3, NULL, NULL, NULL, 1590681644, 1590681644, NULL],
                ['/user-management/auth-item-group/delete', 3, NULL, NULL, NULL, 1590681644, 1590681644, NULL],
                ['/user-management/auth-item-group/grid-page-size', 3, NULL, NULL, NULL, 1590681644, 1590681644, NULL],
                ['/user-management/auth-item-group/grid-sort', 3, NULL, NULL, NULL, 1590681644, 1590681644, NULL],
                ['/user-management/auth-item-group/index', 3, NULL, NULL, NULL, 1590681644, 1590681644, NULL],
                ['/user-management/auth-item-group/toggle-attribute', 3, NULL, NULL, NULL, 1590681644, 1590681644, NULL],
                ['/user-management/auth-item-group/update', 3, NULL, NULL, NULL, 1590681644, 1590681644, NULL],
                ['/user-management/auth-item-group/view', 3, NULL, NULL, NULL, 1590681644, 1590681644, NULL],
                ['/user-management/auth/*', 3, NULL, NULL, NULL, 1590681644, 1590681644, NULL],
                ['/user-management/auth/captcha', 3, NULL, NULL, NULL, 1590681644, 1590681644, NULL],
                ['/user-management/auth/change-own-password', 3, NULL, NULL, NULL, 1590500441, 1590500441, NULL],
                ['/user-management/auth/confirm-email', 3, NULL, NULL, NULL, 1590681644, 1590681644, NULL],
                ['/user-management/auth/confirm-email-receive', 3, NULL, NULL, NULL, 1590681644, 1590681644, NULL],
                ['/user-management/auth/confirm-registration-email', 3, NULL, NULL, NULL, 1590681644, 1590681644, NULL],
                ['/user-management/auth/login', 3, NULL, NULL, NULL, 1590681644, 1590681644, NULL],
                ['/user-management/auth/logout', 3, NULL, NULL, NULL, 1590681644, 1590681644, NULL],
                ['/user-management/auth/password-recovery', 3, NULL, NULL, NULL, 1590681644, 1590681644, NULL],
                ['/user-management/auth/password-recovery-receive', 3, NULL, NULL, NULL, 1590681644, 1590681644, NULL],
                ['/user-management/auth/registration', 3, NULL, NULL, NULL, 1590681644, 1590681644, NULL],
                ['/user-management/permission/*', 3, NULL, NULL, NULL, 1590681644, 1590681644, NULL],
                ['/user-management/permission/bulk-activate', 3, NULL, NULL, NULL, 1590681644, 1590681644, NULL],
                ['/user-management/permission/bulk-deactivate', 3, NULL, NULL, NULL, 1590681644, 1590681644, NULL],
                ['/user-management/permission/bulk-delete', 3, NULL, NULL, NULL, 1590681644, 1590681644, NULL],
                ['/user-management/permission/create', 3, NULL, NULL, NULL, 1590681644, 1590681644, NULL],
                ['/user-management/permission/delete', 3, NULL, NULL, NULL, 1590681644, 1590681644, NULL],
                ['/user-management/permission/grid-page-size', 3, NULL, NULL, NULL, 1590681644, 1590681644, NULL],
                ['/user-management/permission/grid-sort', 3, NULL, NULL, NULL, 1590681644, 1590681644, NULL],
                ['/user-management/permission/index', 3, NULL, NULL, NULL, 1590681644, 1590681644, NULL],
                ['/user-management/permission/refresh-routes', 3, NULL, NULL, NULL, 1590681644, 1590681644, NULL],
                ['/user-management/permission/set-child-permissions', 3, NULL, NULL, NULL, 1590681644, 1590681644, NULL],
                ['/user-management/permission/set-child-routes', 3, NULL, NULL, NULL, 1590681644, 1590681644, NULL],
                ['/user-management/permission/toggle-attribute', 3, NULL, NULL, NULL, 1590681644, 1590681644, NULL],
                ['/user-management/permission/update', 3, NULL, NULL, NULL, 1590681644, 1590681644, NULL],
                ['/user-management/permission/view', 3, NULL, NULL, NULL, 1590681644, 1590681644, NULL],
                ['/user-management/role/*', 3, NULL, NULL, NULL, 1590681644, 1590681644, NULL],
                ['/user-management/role/bulk-activate', 3, NULL, NULL, NULL, 1590681644, 1590681644, NULL],
                ['/user-management/role/bulk-deactivate', 3, NULL, NULL, NULL, 1590681644, 1590681644, NULL],
                ['/user-management/role/bulk-delete', 3, NULL, NULL, NULL, 1590681644, 1590681644, NULL],
                ['/user-management/role/create', 3, NULL, NULL, NULL, 1590681644, 1590681644, NULL],
                ['/user-management/role/delete', 3, NULL, NULL, NULL, 1590681644, 1590681644, NULL],
                ['/user-management/role/grid-page-size', 3, NULL, NULL, NULL, 1590681644, 1590681644, NULL],
                ['/user-management/role/grid-sort', 3, NULL, NULL, NULL, 1590681644, 1590681644, NULL],
                ['/user-management/role/index', 3, NULL, NULL, NULL, 1590681644, 1590681644, NULL],
                ['/user-management/role/set-child-permissions', 3, NULL, NULL, NULL, 1590681644, 1590681644, NULL],
                ['/user-management/role/set-child-roles', 3, NULL, NULL, NULL, 1590681644, 1590681644, NULL],
                ['/user-management/role/toggle-attribute', 3, NULL, NULL, NULL, 1590681644, 1590681644, NULL],
                ['/user-management/role/update', 3, NULL, NULL, NULL, 1590681644, 1590681644, NULL],
                ['/user-management/role/view', 3, NULL, NULL, NULL, 1590681644, 1590681644, NULL],
                ['/user-management/user-permission/*', 3, NULL, NULL, NULL, 1590681644, 1590681644, NULL],
                ['/user-management/user-permission/set', 3, NULL, NULL, NULL, 1590500441, 1590500441, NULL],
                ['/user-management/user-permission/set-roles', 3, NULL, NULL, NULL, 1590500441, 1590500441, NULL],
                ['/user-management/user-visit-log/*', 3, NULL, NULL, NULL, 1590681644, 1590681644, NULL],
                ['/user-management/user-visit-log/bulk-activate', 3, NULL, NULL, NULL, 1590681644, 1590681644, NULL],
                ['/user-management/user-visit-log/bulk-deactivate', 3, NULL, NULL, NULL, 1590681644, 1590681644, NULL],
                ['/user-management/user-visit-log/bulk-delete', 3, NULL, NULL, NULL, 1590681644, 1590681644, NULL],
                ['/user-management/user-visit-log/create', 3, NULL, NULL, NULL, 1590681644, 1590681644, NULL],
                ['/user-management/user-visit-log/delete', 3, NULL, NULL, NULL, 1590681644, 1590681644, NULL],
                ['/user-management/user-visit-log/grid-page-size', 3, NULL, NULL, NULL, 1590681644, 1590681644, NULL],
                ['/user-management/user-visit-log/grid-sort', 3, NULL, NULL, NULL, 1590681644, 1590681644, NULL],
                ['/user-management/user-visit-log/index', 3, NULL, NULL, NULL, 1590681644, 1590681644, NULL],
                ['/user-management/user-visit-log/toggle-attribute', 3, NULL, NULL, NULL, 1590681644, 1590681644, NULL],
                ['/user-management/user-visit-log/update', 3, NULL, NULL, NULL, 1590681644, 1590681644, NULL],
                ['/user-management/user-visit-log/view', 3, NULL, NULL, NULL, 1590681644, 1590681644, NULL],
                ['/user-management/user/*', 3, NULL, NULL, NULL, 1590681644, 1590681644, NULL],
                ['/user-management/user/bulk-activate', 3, NULL, NULL, NULL, 1590500441, 1590500441, NULL],
                ['/user-management/user/bulk-deactivate', 3, NULL, NULL, NULL, 1590500441, 1590500441, NULL],
                ['/user-management/user/bulk-delete', 3, NULL, NULL, NULL, 1590500441, 1590500441, NULL],
                ['/user-management/user/change-password', 3, NULL, NULL, NULL, 1590500441, 1590500441, NULL],
                ['/user-management/user/create', 3, NULL, NULL, NULL, 1590500441, 1590500441, NULL],
                ['/user-management/user/delete', 3, NULL, NULL, NULL, 1590500441, 1590500441, NULL],
                ['/user-management/user/grid-page-size', 3, NULL, NULL, NULL, 1590500441, 1590500441, NULL],
                ['/user-management/user/grid-sort', 3, NULL, NULL, NULL, 1590681644, 1590681644, NULL],
                ['/user-management/user/index', 3, NULL, NULL, NULL, 1590500441, 1590500441, NULL],
                ['/user-management/user/toggle-attribute', 3, NULL, NULL, NULL, 1590681644, 1590681644, NULL],
                ['/user-management/user/update', 3, NULL, NULL, NULL, 1590500441, 1590500441, NULL],
                ['/user-management/user/view', 3, NULL, NULL, NULL, 1590500441, 1590500441, NULL],
                ['/user/*', 3, NULL, NULL, NULL, 1590681643, 1590681643, NULL],
                ['/user/bulk-activate', 3, NULL, NULL, NULL, 1590681643, 1590681643, NULL],
                ['/user/bulk-deactivate', 3, NULL, NULL, NULL, 1590681643, 1590681643, NULL],
                ['/user/bulk-delete', 3, NULL, NULL, NULL, 1590681643, 1590681643, NULL],
                ['/user/change-password', 3, NULL, NULL, NULL, 1590681643, 1590681643, NULL],
                ['/user/create', 3, NULL, NULL, NULL, 1590681643, 1590681643, NULL],
                ['/user/delete', 3, NULL, NULL, NULL, 1590681643, 1590681643, NULL],
                ['/user/grid-page-size', 3, NULL, NULL, NULL, 1590681643, 1590681643, NULL],
                ['/user/grid-sort', 3, NULL, NULL, NULL, 1590681643, 1590681643, NULL],
                ['/user/index', 3, NULL, NULL, NULL, 1590681643, 1590681643, NULL],
                ['/user/toggle-attribute', 3, NULL, NULL, NULL, 1590681643, 1590681643, NULL],
                ['/user/update', 3, NULL, NULL, NULL, 1590681643, 1590681643, NULL],
                ['/user/view', 3, NULL, NULL, NULL, 1590681643, 1590681643, NULL],
                ['Admin', 1, 'Admin', NULL, NULL, 1590500441, 1590500441, NULL],
                ['assignRolesToUsers', 2, 'Assign roles to users', NULL, NULL, 1590500441, 1590500441, 'userManagement'],
                ['bindUserToIp', 2, 'Bind user to IP', NULL, NULL, 1590500441, 1590500441, 'userManagement'],
                ['changeOwnPassword', 2, 'Change own password', NULL, NULL, 1590500441, 1590500441, 'userCommonPermissions'],
                ['changeUserPassword', 2, 'Change user password', NULL, NULL, 1590500441, 1590500441, 'userManagement'],
                ['commonPermission', 2, 'Common permission', NULL, NULL, 1590500440, 1590500440, NULL],
                ['createUsers', 2, 'Create users', NULL, NULL, 1590500441, 1590500441, 'userManagement'],
                ['deleteUsers', 2, 'Delete users', NULL, NULL, 1590500441, 1590500441, 'userManagement'],
                ['editUserEmail', 2, 'Edit user email', NULL, NULL, 1590500441, 1590500441, 'userManagement'],
                ['editUsers', 2, 'Edit users', NULL, NULL, 1590500441, 1590500441, 'userManagement'],
                ['user', 1, 'user', NULL, NULL, 1590681422, 1590681422, NULL],
                ['user2', 2, 'User', NULL, NULL, 1590681615, 1590681615, NULL],
                ['viewRegistrationIp', 2, 'View registration IP', NULL, NULL, 1590500441, 1590500441, 'userManagement'],
                ['viewUserEmail', 2, 'View user email', NULL, NULL, 1590500441, 1590500441, 'userManagement'],
                ['viewUserRoles', 2, 'View user roles', NULL, NULL, 1590500441, 1590500441, 'userManagement'],
                ['viewUsers', 2, 'View users', NULL, NULL, 1590500441, 1590500441, 'userManagement'],
                ['viewVisitLog', 2, 'View visit log', NULL, NULL, 1590500441, 1590500441, 'userManagement'],
            ],
        );

        $this->batchInsert(
            'auth_item_child',
            [
                'parent',
                'child',
            ],
            [
                ['user2', '/patientss/*'],
                ['user2', '/patientss/captcha'],
                ['user2', '/patientss/create'],
                ['user2', '/patientss/delete'],
                ['user2', '/patientss/error'],
                ['user2', '/patientss/index'],
                ['user2', '/patientss/update'],
                ['user2', '/patientss/view'],
                ['user2', '/site/*'],
                ['changeOwnPassword', '/user-management/auth/change-own-password'],
                ['assignRolesToUsers', '/user-management/user-permission/set'],
                ['assignRolesToUsers', '/user-management/user-permission/set-roles'],
                ['editUsers', '/user-management/user/bulk-activate'],
                ['editUsers', '/user-management/user/bulk-deactivate'],
                ['deleteUsers', '/user-management/user/bulk-delete'],
                ['changeUserPassword', '/user-management/user/change-password'],
                ['createUsers', '/user-management/user/create'],
                ['deleteUsers', '/user-management/user/delete'],
                ['viewUsers', '/user-management/user/grid-page-size'],
                ['viewUsers', '/user-management/user/index'],
                ['editUsers', '/user-management/user/update'],
                ['viewUsers', '/user-management/user/view'],
                ['Admin', 'assignRolesToUsers'],
                ['Admin', 'changeOwnPassword'],
                ['Admin', 'changeUserPassword'],
                ['Admin', 'createUsers'],
                ['Admin', 'deleteUsers'],
                ['Admin', 'editUsers'],
                ['user', 'user2'],
                ['editUserEmail', 'viewUserEmail'],
                ['assignRolesToUsers', 'viewUserRoles'],
                ['Admin', 'viewUsers'],
                ['assignRolesToUsers', 'viewUsers'],
                ['changeUserPassword', 'viewUsers'],
                ['createUsers', 'viewUsers'],
                ['deleteUsers', 'viewUsers'],
                ['editUsers', 'viewUsers'],
            ],
        );

        $this->batchInsert(
            'auth_assignment',
            [
                'item_name',
                'user_id',
                'created_at',
            ],
            [
                ['Admin', 1, 1590653334],
                ['user', 9, 1590683226],
                ['user', 10, 1590683290],
            ],
        );
    }
}