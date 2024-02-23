<?php

namespace app\modules\userauth\admin;

/**
 * Userauth Admin Module.
 *
 * File has been created with `module/create` command.
 *
 * @author
 * @since 1.0.0
 */
class Module extends \luya\admin\base\Module
{
    public $apis = [
        'api-userauth-user' => 'app\modules\userauth\admin\apis\UserController',
        'api-userauth-user-address' => 'app\modules\userauth\admin\apis\UserAddressController',
    ];

    public function getMenu()
    {
        return (new \luya\admin\components\AdminMenuBuilder($this))
            ->node('userauthadmin.admin.menu.node', 'verified_user')
            ->group('userauthadmin.admin.menu.group')
            ->itemApi('userauthadmin.admin.menu.item.user', 'userauthadmin/user/index', 'people', 'api-userauth-user')
            ->itemApi('Addresses', 'userauthadmin/user-address/index', 'list', 'api-userauth-user-address');
    }


    /**
     * @inheritdoc
     */
    public static function onLoad()
    {
        self::registerTranslation('userauthadmin', static::staticBasePath() . '/messages', [
            'userauthadmin' => 'userauthadmin.php',
        ]);
    }

    /**
     * @inheritdoc
     */
    public static function t($message, array $params = [])
    {
        return parent::baseT('userauthadmin', $message, $params);
    }
}
