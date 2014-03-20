<?php

namespace Kagency\Module\RSS\Agent;

use Kagency\Kagent\Agent;
use Kagency\Kagent\User;
use Kagency\Kagent\User\EventSourceContext;
use Kagency\Kagent\Versioned\Task;

use Kagency\Module\RSS\Task\NewFeed as NewFeedTask;
use Kagency\Module\RSS\EventSource\FeedConfiguration;

class NewFeed extends Agent
{
    /**
     * CHeck if current agent can handle the given task
     *
     * @param Task $task
     * @return void
     */
    public function canHandle(Task $task)
    {
        return $task instanceof NewFeedTask;
    }

    /**
     * Handle task
     *
     * @TODO: Inject dependencies
     *
     * @param User $user
     * @param Task $task
     * @return void
     */
    public function handle(User $user, Task $task)
    {
        $feedSet = \Zend\Feed\Reader\Reader::findFeedLinks($task->data);
        $eventSourceContext = new EventSourceContext();

        foreach ($feedSet as $link) {
            $eventSourceContext->addEventSource(
                $user,
                new FeedConfiguration(
                    array(
                        'type' => $link['type'],
                        'url' => $link['href'],
                    )
                )
            );
        }
    }
}
