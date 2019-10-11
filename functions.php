<?php

function get_db() {
  return new SQLite3(KANJIUM_DATABASE);
}

function get_random_kanji(array $jlpt = []) {

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
  if(!$result) {
    return FALSE;
  }
  return $result->fetchArray();
}

function get_random_conjugation(string $type = 'any') {

  $cond = '';
  $params = [];
  if($type === 'adjective') {
    $cond = 'WHERE type = "adji"';
  }
  elseif($type === 'verb') {
    $cond = 'WHERE type LIKE "v%"';
  }
  
  $stmt = get_db()->prepare('SELECT * FROM conjugations '.$cond.' ORDER BY RANDOM() LIMIT 1;');
  foreach($params as $name => $value) {
    $stmt->bindvalue($name, $value, SQLITE3_TEXT);
  }
  $result = $stmt->execute();
  if(!$result) {
    return FALSE;
  }
  return $result->fetchArray();
}

function get_conjugation(int $id) {
  $stmt = get_db()->prepare('SELECT * FROM conjugations WHERE id = :id;');
  $stmt->bindvalue(':id', $id, SQLITE3_INTEGER);
  $result = $stmt->execute();
  if(!$result) {
    return FALSE;
  }
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

function get_conjugation_form_names(array $verb) {
  if($verb['type'] == 'adji') {
    $forms = CONJUGATIONS_ADJI;
  }
  else {
    $forms = CONJUGATIONS_VERB;
  }

  return $forms;
}