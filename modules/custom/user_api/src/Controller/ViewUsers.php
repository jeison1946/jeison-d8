<?php

namespace Drupal\user_api\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\user_api\Services\ApiClient;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class ViewUsers
 * @package Drupal\user_api\Controller
 */
class ViewUsers extends ControllerBase
{
  protected $apiClient;
  /**
   * ViewUsers constructor.
   */
  public function __construct(ApiClient $apiClient)
  {
    $this->apiClient = $apiClient;
  }

  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('user_api.client')
    );
  }

  /**
   * @return array
   */
  public function view(){
    $userApi = $this->apiClient->getUsers();
    return [
      '#type' => 'markup',
      '#markup' => $userApi
    ];
  }
}