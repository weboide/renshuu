<?php
require_once('functions.php');
require_once('view.php');

$query = filter_input(INPUT_GET, 'query');
if($query === 'kanjibox') {
  $view = new View('kanjibox');
  $kanji = get_random_kanji(get_jlpt_levels());
  $view->kanji = $kanji;
  print $view;
}