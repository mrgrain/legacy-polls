<?php
namespace Frogsystem\Legacy\Polls;

use Aura\Router\Map;
use Frogsystem\Legacy\Polls\Controllers\PollsController;
use Frogsystem\Metamorphosis\Providers\RoutesProvider;

/**
 * Class Routes
 * @package Frogsystem\Legacy\Polls
 */
class Routes extends RoutesProvider
{
    /**
     * Add the legacy route
     * @param Map $map
     * @return mixed|void
     */
    public function registerRoutes(Map $map)
    {
        $map->attach('legacy.', '/', function (Map $map) {
            $map->get('polls', 'polls/', $this->controller(PollsController::class, 'polls'))->allows(['POST']);
        });
    }
}
