<?php
declare(strict_types=1);

namespace App\Application\Middleware;

use Slim\Exception\HttpNotFoundException;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\MiddlewareInterface as Middleware;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;
use App\Application\Actions\ActionToken as ActionToken;

class SessionMiddleware implements Middleware
{

    protected ActionToken $actionToken;


    public function __construct()
    {
        $this->actionToken = new ActionToken();
    }

    /**
     * {@inheritdoc}
     */
    public function process(Request $request, RequestHandler $handler): Response
    {
        $token = count($request->getHeader('AUTHORIZATION')) > 0 ? $request->getHeader('AUTHORIZATION')[0] : null;
        $this->actionToken->validate($request, $token);
        return $handler->handle($request);
    }
}
