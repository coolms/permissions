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

/**
 * Authentication identity provider to handle authenticated identity
 *
 * @author Dmitry Popov <d.popov@altgraphic.com>
 */
class AuthenticationProvider extends InMemoryProvider
{
    /**
     * {@inheritDoc}
     */
    protected function getAuthenticatedRole()
    {
        if (null === $this->authenticatedRole) {
            $this->setAuthenticatedRole($this->authenticationService->getIdentity());
        }

        return parent::getAuthenticatedRole();
    }
}
