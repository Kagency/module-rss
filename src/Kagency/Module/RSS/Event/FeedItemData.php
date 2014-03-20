<?php

namespace Kagency\Module\RSS\Event;

use Kagency\Kagent\Struct;

/**
 * Class: FeedItemData
 *
 * Data of a feed item
 *
 * @version $Revision$
 */
class FeedItemData extends Struct
{
    /**
     * Title
     *
     * @var string
     */
    public $title;

    /**
     * Author
     *
     * @var string
     */
    public $author;

    /**
     * Link
     *
     * @var string
     */
    public $link;

    /**
     * Content
     *
     * @var string
     */
    public $content;

    /**
     * Date
     *
     * @var \DateTime
     */
    public $date;
}
