<?php
namespace Frogsystem\Legacy\Polls\Controllers;

use Frogsystem\Legacy\Bridge\Controllers\PageController;
use Frogsystem\Legacy\Bridge\Services\Config;
use Frogsystem\Metamorphosis\Response\View;
use Psr\Http\Message\ResponseInterface;

/**
 * Class PollsController
 * @package Frogsystem\Legacy\Polls\Controllers
 */
class PollsController extends PageController
{
    /**
     * @param View $view
     * @return ResponseInterface
     * @internal param ResponseInterface $response
     */
    public function polls(View $view)
    {
        $template = '';
        include(__DIR__ . "../pages/polls.php");

        return $this->display($view, $template);
    }
}
