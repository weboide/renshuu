<?php

require_once('functions.php');
require_once('view.php');



$jlpt = get_jlpt_level();
$view = new View('home');
$kanji = get_random_kanji($jlpt);
$view->kanji = $kanji;
$view->selected_jlpt = $jlpt;
print $view;
