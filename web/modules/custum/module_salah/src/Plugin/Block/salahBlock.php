<?php
namespace Drupal\module_salah\Plugin\Block;
use Drupal\Core\Block\BlockBase;

/**
 * Provides a block called "exemple Héro block".
 *
 * @Block(
 *   id= "module_salah_salah",
 *   admin_label =@Translation ("Example Héro block")
 * )
 */

class salahBlock extends BlockBase{

  /**
   * {@inheritdoc}
   */
  public function build(){
    $heroes = [
      ['hero_name' => 'Hulk', 'real_name' => 'David Banner'],
      ['hero_name' => 'Thor', 'real_name' => 'Thor Odinson'],
      ['hero_name' => 'Iron Man', 'real_name' => 'Tony Stark'],
      ['hero_name' => 'Luke Cage', 'real_name' => 'Carl Lucas'],
      ['hero_name' => 'Black Widow', 'real_name' => 'Natalia Romanova'],
      ['hero_name' => 'Daredevil', 'real_name' => 'Matthew Murdock'],
      ['hero_name' => 'Captain America', 'real_name' => 'Steven Rogers'],
      ['hero_name' => 'Wolverine', 'real_name' => 'James Howlett']
    ];

    $table = [
      '#type' => 'table',
      '#header' => [
        $this->t('Pseudo'),
        $this->t('Nom'),
      ]
    ];

    foreach($heroes as $hero) {
      $table[] = [
        'hero_name' => [
          '#type' => 'markup',
          '#markup' => $hero['hero_name'],
        ],
        'real_name' => [
          '#type' => 'markup',
          '#markup' => $hero['real_name'],
        ],
      ];
    }

    return $table;
  }
}
