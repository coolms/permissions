<?php
/**
 * CoolMS2 Permissions Module (http://www.coolms.com/)
 *
 * @link      http://github.com/coolms/permissions for the canonical source repository
 * @copyright Copyright (c) 2006-2015 Altgraphic, ALC (http://www.altgraphic.com)
 * @license   http://www.coolms.com/license/new-bsd New BSD License
 * @author    Dmitry Popov <d.popov@altgraphic.com>
 */

namespace CmsPermissions;

return [
    'service_manager' => [
        'aliases' => [
            'CmsPermissions\Options\ModuleOptionsInterface'
                => 'CmsPermissions\Options\ModuleOptions',
        ],
        'factories' => [
            'CmsPermissions\Cache' => 'CmsPermissions\Factory\CacheFactory',
            'CmsPermissions\Identity\ProviderInterface'
                => 'CmsPermissions\Factory\IdentityProviderFactory',
            'CmsPermissions\Options\ModuleOptions'
                => 'CmsPermissions\Factory\ModuleOptionsFactory',
        ],
    ],
];
