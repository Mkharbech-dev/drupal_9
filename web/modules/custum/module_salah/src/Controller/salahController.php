<?php
namespace Drupal\module_salah\Controller;
use Drupal\Core\Controller\ControllerBase;
/**
 * celui ci est salah controller
 */
class salahController extends ControllerBase{

  public function carsList(){

    $cars = [
      ['name' => 'audi'],
      ['name' => 'mercedes'],
      ['name' => 'peugeot'],
      ['name' => 'fiat'],
      ['name' => 'mazda'],
      ['name' => 'renault'],
      ['name' => 'kia'],
    ];

   /* $ourCars = '';
    foreach ($cars as $car){
      $ourCars .='<li>'. $car['name'].'</li>';
    }*/

    return [
      '#theme' => 'cars_liste',
      '#items'=> $cars,
      '#title' => $this->t('notre meilleurs marques de voitures')
    ];
  }
}
