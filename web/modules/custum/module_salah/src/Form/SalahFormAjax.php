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
    // Créer un champ de sélection qui mettra à jour le contenu de la zone de texte ci-dessous.
    $form['example_select'] = [
      '#type' => 'select',
      '#title' => $this->t('Select element'),
      '#options' => [
        '0' => $this->t(''),
        '1' => $this->t('Salah'),
        '2' => $this->t('Malak'),
        '3' => $this->t('Imane'),
      ],
      '#ajax' => [
        'callback' => '::myAjaxCallback', // n'oubliez pas :: lors de l'appel d'une méthode de classe.
        //'callback' => [$this, 'myAjaxCallback'], // notation alternative
        'disable-refocus' => FALSE, // Ou TRUE pour empêcher le recentrage sur l'élément déclencheur.
        'event' => 'change',
        'wrapper' => 'edit-output', // Cet élément est mis à jour avec ce rappel AJAX.
        'progress' => [
          'type' => 'throbber',
          'message' => $this->t('Vérification de l\'entrée...'),
        ],
      ]

    ];

    // Créer une zone de texte qui sera mise à jour lorsque l'utilisateur sélectionne un élément
    // dans la zone de sélection ci-dessus.
    $form['output'] = [
      '#type' => 'textfield',
      '#size' => '80',
      '#disabled' => TRUE,
      '#value' => 'Ici on affiche votre selection',
      '#prefix' => '<div id="edit-output">',
      '#suffix' => '</div>',
    ];

    // Créer un bouton de soumission.
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
    // Essayez d'obtenir le texte sélectionné à partir de l'élément select de notre formulaire.
    $selectedText = '';
    if ($selectedValue = $form_state->getValue('example_select')) {
      // Obtenir le texte de l'option sélectionnée.
      $selectedText = $form['example_select']['#options'][$selectedValue];
    }

    // Crée un nouvel élément textfield contenant le texte sélectionné.
    // Nous remplaçons le champ de texte d'origine à l'aide d'une commande de remplacement AJAX qui
    // attend soit un tableau de rendu, soit un balisage HTML simple.
    $elem = [
      '#type' => 'textfield',
      '#size' => '60',
      '#disabled' => TRUE,
      '#value' => "vous avez choisi: $selectedText!",
      '#attributes' => [
        'id' => ['edit-output'],
      ],
    ];

    // Attachez la bibliothèque javascript pour la commande de la boîte de dialogue
    // de la même manière que vous joindrez vos scripts JS personnalisés.
    $dialogText['#attached']['library'][] = 'core/drupal.dialog.ajax';
    // Prepare the text for our dialogbox.
    $dialogText['#markup'] = "You selected: $selectedText";

    // Si nous voulons exécuter des commandes AJAX, notre rappel doit renvoyer
    // un objet AjaxResponse. créons-le et ajoutons nos commandes.
    $response = new AjaxResponse();
    // Émettez une commande qui remplace l'élément #edit-output
    // avec le balisage rendu du champ créé ci-dessus.
    // ReplaceCommand() se chargera de rendre notre champ de texte en HTML.
    $response->addCommand(new ReplaceCommand('#edit-output', $elem));
    // Afficher le modal de réponse
    $response->addCommand(new OpenModalDialogCommand('My title', $dialogText, ['width' => '300']));

    // Renvoyez enfin l'objet AjaxResponse.
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
