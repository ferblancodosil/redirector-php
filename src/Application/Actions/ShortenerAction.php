<?php

declare(strict_types=1);

namespace App\Application\Actions;

use Slim\Exception\HttpNotFoundException;
use Psr\Http\Message\ResponseInterface as Response;
use App\Application\Actions\Action;
use Psr\Log\LoggerInterface;

class ShortenerAction extends Action
{

    public function __construct(LoggerInterface $logger)
    {
        parent::__construct($logger);
    }

    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $data = $this->getFormData();
        if (count($data) == 0 || $data['url'] == null) {
            throw new HttpNotFoundException($this->request, 'NOT FOUND URL PARAM');
        }
        $url = $data['url'];
        $shortUrl = file_get_contents("https://tinyurl.com/api-create.php?url=".$url, False);
        $data = array('url' => $shortUrl);
        return $this->respondWithData($data);
    }
}
