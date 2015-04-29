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

use Zend\EventManager\EventManagerInterface,
    Zend\EventManager\ListenerAggregateTrait,
    Zend\Mvc\MvcEvent,
    CmsPermissions\Exception\UnauthorizedException,
    CmsPermissions\Exception\UnauthorizedExceptionInterface;

/**
 * Abstract Guard listener, allows checking of permissions
 * during {@see \Zend\Mvc\MvcEvent::EVENT_ROUTE}
 *
 * @author Dmitry Popov <d.popov@altgraphic.com>
 */
abstract class AbstractGuard implements GuardInterface
{
    use ListenerAggregateTrait;

    /**
     * Event priority
     */
    const EVENT_PRIORITY = -5;

    /**
     * MVC event to listen
     */
    const EVENT_NAME = MvcEvent::EVENT_ROUTE;

    /**
     * {@inheritDoc}
     */
    public function attach(EventManagerInterface $events)
    {
        $this->listeners[] = $events->attach(static::EVENT_NAME, [$this, 'onResult'], static::EVENT_PRIORITY);
    }

    /**
     * Event callback to be triggered on MVC event, causes application error triggering
     * in case of failed authorization check
     *
     * @param MvcEvent $event
     */
    public function onResult(MvcEvent $event)
    {
        try {
            if ($this->isAuthorized($event)) {
                return;
            }
        } catch (UnauthorizedExceptionInterface $e) {
            $event->setParam('exception', $e);
        }

        $event->setError(self::ERROR_UNAUTHORIZED);
        if (!$event->getParam('exception') instanceof UnauthorizedExceptionInterface) {
            $event->setParam('exception', new UnauthorizedException(
                'You are not authorized to access this resource',
                403
            ));
        }

        $event->stopPropagation(true);

        $application  = $event->getApplication();
        $eventManager = $application->getEventManager();

        $eventManager->trigger(MvcEvent::EVENT_DISPATCH_ERROR, $event);
    }
}
