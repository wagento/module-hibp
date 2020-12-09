<?php
/**
 * Wagento Have I Been Pwned?
 *
 * Adds test to built-in password strength indicator to check if password has
 * been used on other sites.
 *
 * @package Wagento\HIBP\Controller\Index
 * @author Joseph Leedy <joseph@wagento.com>, Chirag Dodia <chirag.dodia@wagento.com>
 * @copyright Copyright (c) Wagento Creative LLC. (https://www.wagento.com/)
 * @license https://opensource.org/licenses/OSL-3.0.php Open Software License 3.0
 */

namespace Wagento\HIBP\Model;

use GuzzleHttp\ClientFactory;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\ResponseFactory;
use Magento\Framework\Webapi\Rest\Request;

class Hibp
{
    /**
     * API request URL
     */
    const API_REQUEST_URI = 'https://api.pwnedpasswords.com/range/';

    /**
     * @var ClientFactory
     */
    protected ClientFactory $clientFactory;
    /**
     * @var ResponseFactory
     */
    protected ResponseFactory $responseFactory;

    /**
     * @var int
     */
    protected $count = 0;
    /**
     * Hibp constructor.
     * @param ClientFactory $clientFactory
     * @param ResponseFactory $responseFactory
     */
    public function __construct(
        ClientFactory $clientFactory,
        ResponseFactory $responseFactory
    ) {
        $this->clientFactory = $clientFactory;
        $this->responseFactory = $responseFactory;
    }

    /**
     * @param $password
     * @param string $requestMethod
     * @return bool|\GuzzleHttp\Psr7\Response
     */
    public function isPwnedPassword($password, $requestMethod = Request::HTTP_METHOD_GET)
    {
        $password = sha1($password);
        $password = strtoupper($password);
        $range = substr($password, 0, 5);
        $endpoint = self::API_REQUEST_URI . $range;

        /** @var Client $client */
        $client = $this->clientFactory->create();

        try {
            $totalCount = 0;
            $data = [];
            $response = $client->request($requestMethod, $endpoint);
            if ($response->getStatusCode() == 200) {
                $body = (string) $response->getBody();
                $data = explode("\r\n", $body);
                foreach ($data as $value) {
                    list($hash, $count) = explode(':', $value);
                    if (strcmp($hash, substr($password, 5)) === 0) {
                        $totalCount = +(int)$count;
                    }
                }
            }
            if ($data === []) {
                return false;
            }
            $this->count = $totalCount;
            return true;
        } catch (GuzzleException $exception) {
            $response = $this->responseFactory->create([
                'status' => $exception->getCode(),
                'reason' => $exception->getMessage()
            ]);
        }
        return $response;
    }

    /**
     * @return int
     */
    public function count()
    {
        return $this->count;
    }
}
