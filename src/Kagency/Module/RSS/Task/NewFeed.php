<?php

namespace Kagency\Module\RSS\Task;

use Kagency\Kagent\Versioned\Task;

class NewFeed extends Task
{
    /**
     * __construct
     *
     * @param string $url
     * @return void
     */
    public function __construct($url)
    {
        $this->type = "rss/new_feed";
        $this->data = $url;
    }
}
