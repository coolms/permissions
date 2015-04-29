<?php
/**
 * CoolMS2 Permissions Module (http://www.coolms.com/)
 *
 * @link      http://github.com/coolms/permissions for the canonical source repository
 * @copyright Copyright (c) 2006-2015 Altgraphic, ALC (http://www.altgraphic.com)
 * @license   http://www.coolms.com/license/new-bsd New BSD License
 * @author    Dmitry Popov <d.popov@altgraphic.com>
 */

namespace CmsPermissions\Guard;

use Zend\EventManager\ListenerAggregateInterface,
    Zend\Mvc\MvcEvent;

/**
 * Interface for generic guard listeners
 *
 * @author Dmitry Popov <d.popov@altgraphic.com>
 */
interface GuardInterface extends ListenerAggregateInterface
{
    /**
     * Constant for guard that can be added to the MVC event result
     */
    const ERROR_UNAUTHORIZED = 'guard-unauthorized';

    /**
     * @param  MvcEvent $event
     * @throws \CmsPermissions\Exception\UnauthorizedException
     * @return bool
     */
    public function isAuthorized(MvcEvent $event);
}
