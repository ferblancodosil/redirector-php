<?php
declare(strict_types=1);

namespace App\Application\Actions;

use App\Domain\DomainException\DomainRecordNotFoundException;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Log\LoggerInterface;
use Slim\Exception\HttpBadRequestException;
use Slim\Exception\HttpNotFoundException;

class ActionToken
{

    /**
     * @throws HttpNotFoundException
     * @param request $request
     * @param string $token
     */
    public function validate(Request $request, $token = null): void
    {
        if ($token == null)
        {
            throw new HttpNotFoundException($request, 'NOT FOUND AUTHORIZATION TOKEN');
        }
        $queue = Array();
        $tokenElements = str_split($token);

        foreach ($tokenElements as $tokenPosition) {
        	$queueElement = end($queue);
            if (($queueElement == '{' && $tokenPosition == '}') ||
                ($queueElement == '(' && $tokenPosition == ')') ||
                ($queueElement == '[' && $tokenPosition == ']'))
            {
                array_pop($queue);
            } else {
                array_push($queue, $tokenPosition);
            }
        }

        if (count($queue) > 0)
        {
            throw new HttpNotFoundException($request, 'NOT VALID AUTHORIZATION TOKEN');
        }
    }
}