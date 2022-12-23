<?php

namespace Drupal\module_salah\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\HtmlCommand;

/**
 * Our custom ajax form.
 */
class AjaxHeroForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return "module_salah_ajaxhero";
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

    $form['message'] = [
      '#type' => 'markup',
      '#markup' => '<div class="result_message"></div>'
    ];

    $form['rival_1'] = [
      '#type' => 'textfield',
      '#title' => $this->t('premier joueur'),
    ];

    $form['rival_2'] = [
      '#type' => 'textfield',
      '#title' => $this->t('deuxième joueur'),
    ];

    $form['submit'] = [
      '#type' => 'button',
      '#value' => $this->t('Lancer le jeu'),
      '#ajax' => [
        'callback' => '::setMessage',
      ]
    ];

    return $form;
  }

  /**
   * Our custom Ajax responce.
   */
  public function setMessage(array &$form, FormStateInterface $form_state) {
    $winner = rand(1, 2);
    $responce = new AjaxResponse();
    $responce->addCommand(
      new HtmlCommand(
        '.result_message',
        'le joueur qui a gagné est  ' . $form_state->getValue('rival_' . $winner)
      )
    );

    return $responce;
  }

  public function submitForm(array &$form, FormStateInterface $form_state) {}
}
