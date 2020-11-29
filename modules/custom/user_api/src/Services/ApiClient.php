<?php

namespace Drupal\user_api\Services;

use GuzzleHttp\Client;
use Symfony\Component\HttpFoundation\RequestStack;

/**
 * Class ApiClient
 * @package Drupal\d8_test\Services
 */
class ApiClient {

  /**
   * @var Client
   */
  protected $httpClient;
  /**
   * @var RequestStack
   */
  protected $request;

  /**
   * ApiClient constructor.
   * @param Client $client
   * @param RequestStack $request
   */
  public function __construct(Client $client, RequestStack $request)
  {
    $this->httpClient = $client;
    $this->request = $request;
  }

  /**
   * @return \Psr\Http\Message\StreamInterface|string
   */
  public function getUsers(){
    $options = [
      'headers' => [
        'Content-Type' => 'application/json',
        'Authorization' => 'Basic ' . base64_encode('admin:admin'),
      ]
    ];

    $url = $this->request->getCurrentRequest()->getSchemeAndHttpHost();

    try {
      $response = $this->httpClient->request('get',$url.'/consult/user',$options)->getBody();
    }catch (\GuzzleHttp\Exception\GuzzleException $exception) {
      $response = 'Error al conectar el servicio';
    }
    return $response;
  }
}