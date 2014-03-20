<?php

namespace Kagency\Module\RSS\EventSource;

use Kagency\Kagent\Versioned\Event;
use Kagency\Kagent\EventSource;
use Kagency\Kagent\EventSource\Configuration;

use Kagency\Module\RSS\Event\FeedItemData;

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
        $channel = \Zend\Feed\Reader\Reader::import($configuration->url);

        $events = array();
        foreach ($channel as $item) {
            $date = $this->getFeedItemDate($item);

            $events[] = new Event(
                array(
                    'type' => 'rss/item',
                    'sourceRevision' => $date->format('U'),
                    'data' => new FeedItemData(
                        array(
                            'title' => $item->getTitle(),
                            'author' => $item->getAuthor(),
                            'link' => $item->getLink(),
                            'content' => $item->getContent() ?: $item->getDescription(),
                            'date' => $date,
                        )
                    ),
                )
            );
        }

        usort(
            $events,
            function (Event $eventA, Event $eventB) {
                return $eventA->sourceRevision < $eventB->sourceRevision ? -1 : 1;
            }
        );

        $events = array_filter(
            $events,
            function (Event $event) use ($since) {
                return $event->sourceRevision > $since;
            }
        );

        return $events;
    }

    /**
     * getFeedItemDate
     *
     * @param mixed $item
     * @return void
     */
    protected function getFeedItemDate($item)
    {
        $dateFields = array(
            'dateModified',
            'updated',
            'pubDate',
            'published',
        );

        foreach ($dateFields as $dateField) {
            $method = 'get' . ucfirst($dateField);
            if (is_callable(array($item, $method)) &&
                $item->$method()) {
                return $item->$method();
            }
        }

        return new \DateTime();
    }
}
