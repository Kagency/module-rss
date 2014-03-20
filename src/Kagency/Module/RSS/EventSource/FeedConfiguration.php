<?php

namespace Kagency\Module\RSS\EventSource;

use Kagency\Kagent\EventSource\Configuration;

class FeedConfiguration extends Configuration
{
    /**
     * Feed type
     *
     * @var string
     */
    public $type;

    /**
     * Feed URL
     *
     * @var string
     */
    public $url;
}
