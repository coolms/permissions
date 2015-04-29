<?php
/**
 * CoolMS2 Permissions Module (http://www.coolms.com/)
 *
 * @link      http://github.com/coolms/permissions for the canonical source repository
 * @copyright Copyright (c) 2006-2015 Altgraphic, ALC (http://www.altgraphic.com)
 * @license   http://www.coolms.com/license/new-bsd New BSD License
 * @author    Dmitry Popov <d.popov@altgraphic.com>
 */

namespace CmsPermissions\Role;

use CmsCommon\Persistence\MapperInterface,
    CmsCommon\Persistence\MapperProviderInterface,
    CmsCommon\Persistence\MapperProviderTrait,
    CmsPermissions\Role\ProviderInterface;

/**
 * Role provider based on a {@see \CmsCommon\Persistence\MapperInterface}
 *
 * @author Dmitry Popov <d.popov@altgraphic.com>
 */
abstract class AbstractMapperProvider implements MapperProviderInterface, ProviderInterface
{
    use MapperProviderTrait;

    /**
     * __construct
     *
     * @param MapperInterface $mapper
     */
    public function __construct(MapperInterface $mapper)
    {
        $this->setMapper($mapper);
    }
}
