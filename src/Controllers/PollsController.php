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
     * @var string
     */
    protected $pagePath = __DIR__ . "/../pages";
}
