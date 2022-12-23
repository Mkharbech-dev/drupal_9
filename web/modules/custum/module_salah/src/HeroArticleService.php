<?php
namespace Drupal\module_salah;
/**
 * Notre class d'article d'héros service
 */
class HeroArticleService {

  /**
   * Méthode pour lister les articles
   */

  public function getHeroArticles(){
    $articles = ['Hulk is green', 'Flash is red'];

    return $articles;
  }
}

