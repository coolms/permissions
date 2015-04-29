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
 * Interface for identity providers, which are objects capable of
 * retrieving an active identity's role
 *
 * @author Dmitry Popov <d.popov@altgraphic.com>
 */
interface ProviderInterface
{
    /**
     * Retrieve current identity
     *
     * @return string|IdentityInterface
     */
    public function getIdentity();
}
