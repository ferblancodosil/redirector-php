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
    public function validate(Request $request, $token = null): bool
    {
        if ($token == null) {
            throw new HttpNotFoundException($request, 'NOT FOUND AUTHORIZATION TOKEN');
        }
        return true;
    }
}