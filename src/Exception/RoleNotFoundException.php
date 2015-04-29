<?php
/**
 * CoolMS2 Permissions Module (http://www.coolms.com/)
 *
 * @link      http://github.com/coolms/permissions for the canonical source repository
 * @copyright Copyright (c) 2006-2015 Altgraphic, ALC (http://www.altgraphic.com)
 * @license   http://www.coolms.com/license/new-bsd New BSD License
 * @author    Dmitry Popov <d.popov@altgraphic.com>
 */

namespace CmsPermissions\Exception;

/**
 * Exception that is thrown when a role cannot be found (for instance from a provider)
 */
class RoleNotFoundException extends RuntimeException
{
    /**
     * @var string
     */
    protected $message = 'No role could be found';
}
