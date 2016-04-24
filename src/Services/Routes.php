<?php
namespace Frogsystem\Legacy\Polls\Services;

use Aura\Router\Map;
use Frogsystem\Legacy\Bridge\Providers\PagesRoutesProvider;
use Frogsystem\Legacy\Polls\Controllers\PollsController;

/**
 * Class Routes
 * @package Frogsystem\Legacy\Polls\Services
 */
class Routes extends PagesRoutesProvider
{
    /**
     * Add the legacy route
     * @param Map $map
     * @return mixed|void
     */
    public function registerRoutes(Map $map)
    {
        $map->attach('legacy.', '/', function (Map $map) {
            $map->get('polls', 'polls/', $this->page('polls', PollsController::class))->allows(['POST']);
        });
    }
}
