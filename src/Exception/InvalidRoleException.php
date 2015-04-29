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
 * Invalid role exception for CmsPermissions
 */
class InvalidRoleException extends InvalidArgumentException
{
    /**
     * @param mixed $role
     * @return self
     */
    public static function invalidRoleInstance($role)
    {
        return new self(
            sprintf(
                'Invalid role of type "%s" provided',
                is_object($role)
                    ? get_class($role)
                    : gettype($role)
            )
        );
    }
}
