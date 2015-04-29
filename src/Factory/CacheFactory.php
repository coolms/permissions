<?php
/**
 * CoolMS2 Permissions Module (http://www.coolms.com/)
 *
 * @link      http://github.com/coolms/permissions for the canonical source repository
 * @copyright Copyright (c) 2006-2015 Altgraphic, ALC (http://www.altgraphic.com)
 * @license   http://www.coolms.com/license/new-bsd New BSD License
 * @author    Dmitry Popov <d.popov@altgraphic.com>
 */

namespace CmsPermissions\Factory;

use Zend\ServiceManager\FactoryInterface,
    Zend\ServiceManager\ServiceLocatorInterface,
    Zend\Cache\StorageFactory;

/**
 * Factory for building the cache storage
 *
 * @author  Dmitry Popov <d.popov@altgraphic.com>
 */
class CacheFactory implements FactoryInterface
{
    /**
     * {@inheritDoc}
     *
     * @return \Zend\Cache\Storage\StorageInterface
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        /* @var $options \CmsPermissions\Options\ModuleOptions */
        $options = $serviceLocator->get('CmsPermissions\\Options\\ModuleOptions');

        return StorageFactory::factory($options->getCacheOptions());
    }
}
