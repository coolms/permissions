<?php
/**
 * CoolMS2 Permissions Module (http://www.coolms.com/)
 *
 * @link      http://github.com/coolms/permissions for the canonical source repository
 * @copyright Copyright (c) 2006-2015 Altgraphic, ALC (http://www.altgraphic.com)
 * @license   http://www.coolms.com/license/new-bsd New BSD License
 * @author    Dmitry Popov <d.popov@altgraphic.com>
 */

namespace CmsPermissions\Identity;

use Zend\Authentication\AuthenticationServiceInterface,
    CmsPermissions\Options\ModuleOptionsInterface;

/**
 * Simple identity provider to handle simple user|guest identity
 *
 * @author Dmitry Popov <d.popov@altgraphic.com>
 */
class InMemoryProvider implements ProviderInterface
{
    /**
     * @var ModuleOptionsInterface
     */
    protected $options;

    /**
     * @var AuthenticationServiceInterface
     */
    protected $authenticationService;

    /**
     * @var string
     */
    protected $defaultRole;

    /**
     * @var string
     */
    protected $authenticatedRole;

    /**
     * __construct
     *
     * @param ModuleOptionsInterface $options
     * @param AuthenticationServiceInterface $authenticationService
     */
    public function __construct(
        ModuleOptionsInterface $options,
        AuthenticationServiceInterface $authenticationService
    ) {
        $this->options = $options;
        $this->authenticationService = $authenticationService;
    }

    /**
     * {@inheritDoc}
     */
    public function getIdentity()
    {
        if ($this->authenticationService->hasIdentity()) {
            return $this->getAuthenticatedRole();
        }

        return $this->getDefaultRole();
    }

    /**
     * Get the role that's used if authenticated identity doesn't exist
     *
     * @return string
     */
    protected function getDefaultRole()
    {
        if (null === $this->defaultRole) {
            $this->setDefaultRole($this->options->getDefaultRole());
        }

        return $this->defaultRole;
    }

    /**
     * Set the role that's used if authenticated identity doesn't exist
     *
     * @param string $role
     * @return self
     */
    public function setDefaultRole($role)
    {
        $this->defaultRole = $role;
        return $this;
    }

    /**
     * Get the role that's used if authenticated identity exists
     *
     * @return string
     */
    protected function getAuthenticatedRole()
    {
        if (null === $this->authenticatedRole) {
            $this->setAuthenticatedRole($this->options->getAuthenticatedRole());
        }

        return $this->authenticatedRole;
    }

    /**
     * Set the role that's used if authenticated identity exists
     *
     * @param string $role
     * @return self
     */
    public function setAuthenticatedRole($role)
    {
        $this->authenticatedRole = $role;
        return $this;
    }
}
