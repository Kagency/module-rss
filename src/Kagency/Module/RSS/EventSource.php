<?php

namespace Kagency\Module\RSS;

use Kagency\Kagent\EventSource as EventSourceBase;
use Kagency\Kagent\EventSource\Configuration;

class EventSource extends EventSourceBase
{
    /**
     * Get new events
     *
     * Get all new events since the provided revision
     *
     * @param Configuration $configuration
     * @param string $since
     * @return Event[]
     */
    public function getNewEvents(Configuration $configuration, $since)
    {
        return array();
    }
}
