<?php
$box = new View('kanjibox');
$box->kanji = $this->kanji;

?>
<?php require('theme/header.php'); ?>

<?php
echo $box;
?>

<ul class="cbox jlptlvl">
<?php foreach(JLPT_LEVELS as $lvl => $name): ?>
  <li>
  <input type='checkbox' id='cblvl<?php echo urlencode($lvl); ?>' data-lvl='<?php echo urlencode($lvl); ?>' name='cblvl<?php echo urlencode($lvl); ?>'/>
  <label for='cblvl<?php echo urlencode($lvl); ?>'><?php echo htmlspecialchars(substr($name, 0, 2))?></label>
  </li>
<?php endforeach; ?>
</ul>

<?php require('theme/footer.php'); ?>