<?php 
/**
 * CoolMS2 Permissions Module (http://www.coolms.com/)
 *
 * @link      http://github.com/coolms/permissions for the canonical source repository
 * @copyright Copyright (c) 2006-2015 Altgraphic, ALC (http://www.altgraphic.com)
 * @license   http://www.coolms.com/license/new-bsd New BSD License
 * @author    Dmitry Popov <d.popov@altgraphic.com>
 */

namespace CmsPermissions\Options;

use Zend\Stdlib\AbstractOptions;

class ModuleOptions extends AbstractOptions implements ModuleOptionsInterface
{
    /**
     * Turn off strict options mode
     *
     * @var bool
     */
    protected $__strictMode__ = false;

    /**
     * Default role for unauthenticated users
     *
     * @var string
     */
    protected $defaultRole = 'guest';

    /**
     * Default role for authenticated users (if using the
     * 'CmsPermissions\Identity\InMemoryProvider' identity provider)
     *
     * @var string
     */
    protected $authenticatedRole = 'user';

    /**
     * Identity provider service name
     *
     * @var string
     */
    protected $identityProvider = 'CmsPermissions\\Identity\\InMemoryProvider';

    /**
     * Role providers to be used to load all available roles
     * Keys are the provider service names, values are the options to be passed to the provider
     *
     * @var array
     */
    protected $roleProviders = [];

    /**
     * Role entity class name (if using the
     * 'CmsPermissions\Role\AbstractMapperProvider' role provider)
     *
     * @var string
     */
    protected $roleEntityClass;

    /**
     * Cache options have to be compatible with {@see \Zend\Cache\StorageFactory::factory}
     *
     * @var array
     */
    protected $cacheOptions = [
        'adapter' => [
            'name' => 'memory',
        ],
        'plugins' => [
            'serializer',
        ],
    ];

    /**
     * Authentication service name
     *
     * @var string
     */
    protected $authenticationService = 'Zend\\Authentication\\AuthenticationService';

    /**
     * {@inheritDoc}
     */
    public function setDefaultRole($role)
    {
        $this->defaultRole = $role;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getDefaultRole()
    {
        return $this->defaultRole;
    }

    /**
     * {@inheritDoc}
     */
    public function setAuthenticatedRole($role)
    {
        $this->authenticatedRole = $role;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getAuthenticatedRole()
    {
        return $this->authenticatedRole;
    }

    /**
     * {@inheritDoc}
     */
    public function setIdentityProvider($provider)
    {
        $this->identityProvider = $provider;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getIdentityProvider()
    {
        return $this->identityProvider;
    }

    /**
     * {@inheritDoc}
     */
    public function setRoleProviders(array $providers)
    {
        $this->roleProviders = $providers;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getRoleProviders()
    {
        return $this->roleProviders;
    }

    /**
     * {@inheritDoc}
     */
    public function setRoleEntityClass($className)
    {
        $this->roleEntityClass = (string) $className;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getRoleEntityClass()
    {
        return $this->roleEntityClass;
    }

    /**
     * {@inheritDoc}
     */
    public function setCacheOptions(array $options)
    {
        $this->cacheOptions = $options;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getCacheOptions()
    {
        return $this->cacheOptions;
    }

    /**
     * {@inheritDoc}
     */
    public function setAuthenticationService($service)
    {
        $this->authenticationService = $service;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getAuthenticationService()
    {
        return $this->authenticationService;
    }
}
