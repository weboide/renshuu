<?php
$box = new View('kanjibox');
$box->kanji = $this->kanji;

?>
<?php require('theme/header.php'); ?>

<span class="jlpt" data-level="<?php echo htmlspecialchars($this->selected_jlpt) ?>">Showing N<?php echo htmlspecialchars($this->selected_jlpt) ?>:</span>

<?php
echo $box;
?>

<?php foreach(JLPT_LEVELS as $lvl => $name): ?>

<a href="?jlpt=<?php echo urlencode($lvl); ?>"><?php echo htmlspecialchars(substr($name, 0, 2))?></a><br/>
<?php if($lvl < 5): ?>
  <a href="?jlpt=<?php echo urlencode($lvl.'+'); ?>"><?php echo htmlspecialchars(substr($name, 0, 2))?> and lower</a><br/>
<?php endif; ?>

<?php endforeach; ?>


<?php require('theme/footer.php'); ?>