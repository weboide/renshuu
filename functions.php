<?php

require_once('config.php');

function get_random_kanji($jlpt = NULL) {

  $cond = '';
  $params = [];
  if($jlpt && preg_match('/^[1-5]\+?$/', $jlpt)) {
    if(strlen($jlpt) == 1) {
      $cond = 'WHERE jlpt = :jlpt';
      $params[':jlpt'] = JLPT_LEVELS[(int)$jlpt{0}];
    }
    else {
      $cond = 'WHERE jlpt IN (';
      for($i = (int)$jlpt{0}; $i <= 5; $i++) {
        $cond .= ':jlpt'.$i.',';
        $params[':jlpt'.$i] = JLPT_LEVELS[$i];
      }
      $cond = trim($cond,',');
      $cond .= ')';
    }
  }
  
  $stmt = get_db()->prepare('SELECT * FROM kanjidict '.$cond.' ORDER BY RANDOM() LIMIT 1;');
  foreach($params as $name => $value) {
    $stmt->bindvalue($name, $value, SQLITE3_TEXT);
  }
  $result = $stmt->execute();

  return $result->fetchArray();

}

function get_jlpt_level() {
  $param_jlpt = filter_input(INPUT_GET, 'jlpt');
  if(preg_match('/^[0-9]\+?$/', $param_jlpt) > 0) {
    return $param_jlpt;
  }
  return NULL;
}