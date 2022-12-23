<?php

namespace Drupal\module_salah\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * notre custom hero frmulaire
 */

class HeroForm extends FormBase {
  /**
   * {@inheritdoc}
   */
  public function getFormId()
  {
    return "module_salah_heroform";
  }
  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state)
  {
    $form['rival_1'] = [
      '#type' => 'textfield',
      '#title' => $this->t('premier joueur'),
    ];

    $form['rival_2'] = [
      '#type' => 'textfield',
      '#title' => $this->t('deuxième joueur'),
    ];

    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Valider'),
    ];

    return $form;
  }
  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $winner = rand(1, 2);
    // si le form est soumit on affiche un message indiquant le gagnant paris les deux joueurs.
    $this->messenger()->addStatus($this->t('le gangnat entre '. $form_state->getValue('rival_1').' et '
      .$form_state->getValue('rival_2').' est '. $form_state->getValue('rival_'.$winner)));
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    if (empty($form_state->getValue('rival_1'))){
      $form_state->setErrorByName('rival_1', $this->t('saisir le premier joueur svp!'));
    }
    if (empty($form_state->getValue('rival_2'))){
      $form_state->setErrorByName('rival_2', $this->t('saisir le deuxième joueur svp!'));
    }
  }

}
