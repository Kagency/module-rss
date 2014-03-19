<?php

namespace Kagency\Module\RSS;

use Kagency\Kagent\Module as ModuleBase;

/**
 * Class: Module
 *
 * @version $Revision$
 */
class Module extends ModuleBase
{
    /**
     * Get event sources
     *
     * @return EventSource[]
     */
    public function getEventSources()
    {
        return array(
            'rss' => new EventSource()
        );
    }
}
