<?php

namespace Drupal\user_api\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\user_api\Model\ModelTest;

class PruebaController extends ControllerBase{


  /**
   * PruebaController constructor.
   */

  protected $model;

  /**
   * PruebaController constructor.
   * @param ModelTest $modelTest
   */
  public function __construct(ModelTest $modelTest)
  {
    $this->model = $modelTest;
  }
}