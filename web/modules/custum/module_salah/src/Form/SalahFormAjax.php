<?php

namespace Drupal\module_salah\Form;

use Drupal\Core\Ajax\OpenModalDialogCommand;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\ReplaceCommand;


/**
 * Provides a default form.
 */
class SalahFormAjax extends FormBase
{

  /**
   * {@inheritdoc}
   */
  public function getFormId()
  {
    return 'module_salah_salahformajax';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state)
  {
    // Create a select field that will update the contents
    // of the textbox below.
    $form['example_select'] = [
      '#type' => 'select',
      '#title' => $this->t('Select element'),
      '#options' => [
        '1' => $this->t('Salah'),
        '2' => $this->t('Malak'),
        '3' => $this->t('Imane'),
      ],
      '#ajax' => [
        'callback' => '::myAjaxCallback', // don't forget :: when calling a class method.
        //'callback' => [$this, 'myAjaxCallback'], //alternative notation
        'disable-refocus' => FALSE, // Or TRUE to prevent re-focusing on the triggering element.
        'event' => 'change',
        'wrapper' => 'edit-output', // This element is updated with this AJAX callback.
        'progress' => [
          'type' => 'throbber',
          'message' => $this->t('Verifying entry...'),
        ],
      ]

    ];

    // Create a textbox that will be updated
    // when the user selects an item from the select box above.
    $form['output'] = [
      '#type' => 'textfield',
      '#size' => '60',
      '#disabled' => TRUE,
      '#value' => 'Hello, Drupal!!1',
      '#prefix' => '<div id="edit-output">',
      '#suffix' => '</div>',
    ];

    // Create the submit button.
    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Submit'),
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
      '#value' => "vous avez choisi: $selectedText!",
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
    //$response->addCommand(new OpenModalDialogCommand('My title', $dialogText, ['width' => '300']));

    // Finally return the AjaxResponse object.
    return $response;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    parent::validateForm($form, $form_state);
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
