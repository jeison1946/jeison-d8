<?php

namespace Drupal\user_api\Plugin\rest\resource;

use Drupal\rest\ModifiedResourceResponse;
use Drupal\rest\Plugin\ResourceBase;
use Drupal\rest\ResourceResponse;
use Psr\Log\LoggerInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;


/**
 * Provides a edit Properties Rest.
 *
 * @RestResource(
 *   id = "consult_user",
 *   label = @Translation("Consultar usuarios"),
 *   uri_paths = {
 *     "canonical" = "/consult/user"
 *   }
 * )
 */
class ConsultUserRest extends ResourceBase{

  /**
   * ConsultUserRest constructor.
   */
  public function __construct(array $configuration, $plugin_id, $plugin_definition, $serializer_formats, LoggerInterface $logger)
  {
    parent::__construct($configuration, $plugin_id, $plugin_definition, $serializer_formats, $logger);
  }

  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->getParameter('serializer.formats'),
      $container->get('logger.factory')->get('rest')
    );
  }

  public function get(){

    $response = [
      'code' => 200,
      'data' => [
        [
          'name' => 'John',
          'city' => 'USA'
        ],
        [
          'name' => 'Elizabeth',
          'city' => 'Colombia'
        ],
        [
          'name' => 'Roberto',
          'city' => 'Mexico'
        ],
        [
          'name' => 'Camilo',
          'city' => 'Brasil'
        ],
        [
          'name' => 'Miguel',
          'city' => 'Chile'
        ],
        [
          'name' => 'Nicolas',
          'city' => 'Argentina'
        ],
      ],
    ];

    return new ResourceResponse($response, 200);
  }
}