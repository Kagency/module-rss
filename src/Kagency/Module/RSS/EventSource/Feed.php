<?php

namespace Kagency\Module\RSS\EventSource;

use Kagency\Kagent\EventSource;
use Kagency\Kagent\EventSource\Configuration;

class Feed extends EventSource
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
