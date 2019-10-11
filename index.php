<?php
require_once('bootstrap.php');

$jlpt = get_jlpt_levels();
$view = new View('home');
$kanji = get_random_kanji($jlpt);
$view->kanji = $kanji;
$view->selected_jlpt = $jlpt;
print $view;
