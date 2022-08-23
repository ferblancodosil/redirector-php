<?php

declare(strict_types=1);

namespace App\Application\Actions;

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
        $url = (int) $this->getFormData()['url'];
        $this->logger->info("ShortenerAction with url: ".$url);
        $shortUrl = file_get_contents("https://tinyurl.com/api-create.php?url=http://www.example.com".$url, False);
        $data = array('url' => $shortUrl);
        return $this->respondWithData($data);
    }
}
