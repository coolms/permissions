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

interface ModuleOptionsInterface
{
    /**
     * Sets default role
     *
     * @param string $role
     * @return self
     */
    public function setDefaultRole($role);

    /**
     * Retrieves default role
     *
     * @return string
     */
    public function getDefaultRole();

    /**
     * Sets default authenticated role
     *
     * @param string $role
     * @return self
     */
    public function setAuthenticatedRole($role);

    /**
     * Retrieves default authenticated role
     *
     * @return string
     */
    public function getAuthenticatedRole();

    /**
     * @param string $provider
     * @return self
     */
    public function setIdentityProvider($provider);

    /**
     * @return string
     */
    public function getIdentityProvider();

    /**
     * @param array $providers
     * @return self
     */
    public function setRoleProviders(array $providers);

    /**
     * @return array
     */
    public function getRoleProviders();

    /**
     * Set role model class name.
     *
     * @param string $className
     * @return self
     */
    public function setRoleClass($className);

    /**
     * Retrieves role model class name.
     *
     * @return string
     */
    public function getRoleClass();

    /**
     * @param array $options
     * @return self
     */
    public function setCacheOptions(array $options);

    /**
     * @return array
     */
    public function getCacheOptions();

    /**
     * @param string $service
     * @return self
     */
    public function setAuthenticationService($service);

    /**
     * @return string
     */
    public function getAuthenticationService();
}
