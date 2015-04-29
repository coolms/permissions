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
    Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Factory responsible of building {@see \CmsPermissions\Identity\ProviderInterface}
 *
 * @author Dmitry Popov <d.popov@altgraphic.com>
 */
class IdentityProviderFactory implements FactoryInterface
{
    /**
     * {@inheritDoc}
     *
     * @return \CmsPermissions\Identity\ProviderInterface
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        /* @var $options \CmsPermissions\Options\ModuleOptionsInterface */
        $options = $serviceLocator->get('CmsPermissions\\Options\\ModuleOptions');
        $identityProvider = $options->getIdentityProvider();

        if ($serviceLocator->has($identityProvider)) {
            return $serviceLocator->get($identityProvider);
        }

        return new $identityProvider($options, $serviceLocator->get($options->getAuthenticationService()));
    }
}
