<?php

namespace Drupal\module_salah\Form;

use Drupal\Core\Ajax\OpenModalDialogCommand;
use Drupal\Core\Ajax\ReplaceCommand;
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

    $form['gamer_1'] = [
      '#type' => 'textfield',
      '#title' => $this->t('premier joueur'),
    ];

    $form['gamer_2'] = [
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
   * An Ajax callback.
   */
  public function myAjaxCallback(array &$form, FormStateInterface $form_state) {
    // Try to get the selected text from the select element on our form.
    $selectedText = 'nothing selected';
    if ($selectedValue = $form_state->getValue('example_select')) {
      // Get the text of the selected option.
      $selectedText = $form['example_select']['#options'][$selectedValue];
    }

    // Create a new textfield element containing the selected text.
    // We're replacing the original textfield using an AJAX replace command which
    // expects either a render array or plain HTML markup.
    $elem = [
      '#type' => 'textfield',
      '#size' => '60',
      '#disabled' => TRUE,
      '#value' => "I am a new textfield: $selectedText!",
      '#attributes' => [
        'id' => ['edit-output'],
      ],
    ];

    // Attach the javascript library for the dialog box command
    // in the same way you would attach your custom JS scripts.
    $dialogText['#attached']['library'][] = 'core/drupal.dialog.ajax';
    // Prepare the text for our dialogbox.
    $dialogText['#markup'] = "You selected: $selectedText";

    // If we want to execute AJAX commands our callback needs to return
    // an AjaxResponse object. let's create it and add our commands.
    $response = new AjaxResponse();
    // Issue a command that replaces the element #edit-output
    // with the rendered markup of the field created above.
    // ReplaceCommand() will take care of rendering our text field into HTML.
    $response->addCommand(new ReplaceCommand('#edit-output', $elem));
    // Show the dialog box.
    $response->addCommand(new OpenModalDialogCommand('My title', $dialogText, ['width' => '300']));

    // Finally return the AjaxResponse object.
    return $response;
  }

  public function submitForm(array &$form, FormStateInterface $form_state) {}
}
