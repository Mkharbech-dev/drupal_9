<?php

namespace Drupal\module_salah\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Our example Form.
 */
class ExampleForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return "module_salah_exampleform";
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

    $form['text'] = array(
      '#type' => 'textarea',
      '#title' => $this
        ->t('Message'),
    );

    $form['copy'] = array(
      '#type' => 'checkbox',
      '#title' => $this
        ->t('Envoyez-moi une copie'),
    );

    $form['settings']['active'] = array(
      '#type' => 'radios',
      '#title' => $this
        ->t('Etat de sondage'),
      '#default_value' => 1,
      '#options' => array(
        0 => $this
          ->t('Férmé'),
        1 => $this
          ->t('Actif'),
      ),
    );

    $form['example_select'] = [
      '#type' => 'select',
      '#title' => $this
        ->t('Select element'),
      '#options' => [
        '1' => $this
          ->t('Un'),
        '2' => $this
          ->t('Deux'),
        '3' => $this
          ->t('Trois'),
      ],
    ];

    $form['expiration'] = array(
      '#type' => 'date',
      '#title' => $this
        ->t('Expiration du contenu'),
      '#default_value' => array(
        'year' => 2023,
        'month' => 2,
        'day' => 15,
      ),
    );

    $form['submit'] = array(
      '#type' => 'submit',
      '#value' => $this->t('Valider'),
    );

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    $msg_value = $form_state->getValue('text');

    if (!str_contains($msg_value, 'Drupal')){
      $form_state->setErrorByName('text', 'Le texte doit contenir le mot Drupal svp ...');
    }
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // Display result.
    foreach ($form_state->getValues() as $key => $value) {
      \Drupal::messenger()->addStatus($key . ': ' . $value);
    }
  }
}
