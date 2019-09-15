<?php

require_once('config.php');

function get_random_kanji($jlpt = []) {

  $cond = '';
  $params = [];
  if($jlpt) {
    $cond = 'WHERE jlpt IN (';
    foreach($jlpt as $lvl) {
      $lvl = (int)$lvl;
      $cond .= ':jlpt'.$lvl.',';
      $params[':jlpt'.$lvl] = JLPT_LEVELS[$lvl];
    }
    $cond = trim($cond,',');
    $cond .= ')';
  }
  
  $stmt = get_db()->prepare('SELECT * FROM kanjidict '.$cond.' ORDER BY RANDOM() LIMIT 1;');
  foreach($params as $name => $value) {
    $stmt->bindvalue($name, $value, SQLITE3_TEXT);
  }
  $result = $stmt->execute();

  return $result->fetchArray();

}

function get_jlpt_levels() {
  if(empty($_GET['jlpt']) || !is_array($_GET['jlpt'])) {
    return [];
  }
  $lvls = [];
  foreach($_GET['jlpt'] as $lvl) {
    $lvls[] = (int)$lvl;
  }

  return $lvls;
}