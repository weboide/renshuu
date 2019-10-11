<?php
require_once('bootstrap.php');

$jlpt = get_jlpt_levels();
$view = new View('conjugations');


$new_question  = TRUE;
$verb_id = filter_input(INPUT_POST, 'verb_id', FILTER_VALIDATE_INT);
$verb_form = filter_input(INPUT_POST, 'verb_form');
$verb = $verb_id ? get_conjugation($verb_id) : NULL;
$answer = filter_input(INPUT_POST, 'answer');
// If an answer has been submitted.
if(isset($_POST['submit']) && $answer && $verb_id && $verb_form && $verb) {
  $forms = get_conjugation_form_names($verb);
  // Make sure the requested verb form is valid.
  if(array_key_exists($verb_form, $forms)) {
    $view->answer = $answer;
    $view->verb = $verb;
    $view->verb_form = $verb_form;
    // If we got the correct answer.
    if(trim($view->answer) === $view->verb[$verb_form]) {
      $view->result = TRUE;
      $view->old_verb = $view->verb['plain'];
      $view->old_form = $view->verb_form;
      $view->old_answer = $view->verb[$verb_form];
      $new_question = TRUE;
    }
    else { // Incorrect answer.
      $view->result = FALSE;
      $new_question = FALSE;
    }
  }
  else {
    die('invalid verb form');
  }
}

if(isset($_POST['skip'])) {
  $view->old_verb = $verb['plain'];
  $view->old_form = $verb_form;
  $view->old_answer = $verb[$verb_form];
  $new_question = TRUE;
}


if($new_question) { // New question.
  $view->verb = get_random_conjugation();
  $forms = get_conjugation_form_names($view->verb);
  $view->verb_form = array_rand($forms);
}

$view->human_verb_form = str_replace('_', ' ', $forms[$view->verb_form]);
print $view;
