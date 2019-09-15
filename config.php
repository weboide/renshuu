<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
define('DATABASE', './kanjium/data/kanjidb.sqlite');
define('SITE_TITLE', 'Kanjislide');
define('JLPT_LEVELS', [
  1 => 'N1 (advanced)',
  2 => 'N2 (intermediate)',
  3 => 'N3 (lower intermediate)',
  4 => 'N4 (basic)',
  5 => 'N5 (beginner)',
]);

function get_db() {
  return new SQLite3(DATABASE);
}