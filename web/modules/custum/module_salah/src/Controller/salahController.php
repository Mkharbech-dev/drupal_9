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
      '#title' => $this->t('Nos meilleures marques de voitures')
    ];
  }

  public function requests() {
    //Requete pour récupérer les id des contenus, d'utilisateurs, & des cpmmentaires si on en a.
    $query = \Drupal::entityQuery('node');
    $nids = $query->execute();

    $query = \Drupal::entityQuery('user');
    $uids = $query->execute();

    $query = \Drupal::entityQuery('comment');
    $cids = $query->execute();
    //dsm($nids);

    $query = \Drupal::entityQuery('node')->condition('type', 'article');
    $filtred_article_nids = $query->execute();

    $query = \Drupal::entityQuery('node')->condition('type', 'page');
    $filtred_page_nids = $query->execute();

    //Affichage des résultats
    $markup = 'contenu qui a id n°:' . implode(', ',$nids );
    $markup .= '</br> utilisateur qui a id n°:' . implode(', ',$uids );
    $markup .= '</br> commentaire qui a id n°:' . implode(', ',$cids );
    $markup .= '</br> filtrage de contenu type article:' . implode(', ',$filtred_article_nids );
    $markup .= '</br> filtrage de contenu type page de base:' . implode(', ',$filtred_page_nids );

    $build = array(
      '#type' => 'markup',
      '#markup' => $markup,
    );

    return $build;

  }
}
