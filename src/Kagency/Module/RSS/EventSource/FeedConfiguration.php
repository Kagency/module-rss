<?php

namespace Kagency\Module\RSS\EventSource;

use Kagency\Kagent\EventSource\Configuration;

class FeedConfiguration extends Configuration
{
    /**
     * Name of corresponding event source. Must always be set.
     *
     * @var string
     */
    public $name = 'rss';

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
