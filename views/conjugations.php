
<?php require('theme/header.php'); ?>


<?php if(isset($this->result)): ?>
<div class="result">
  Result: <?php echo htmlspecialchars($this->result ? 'Correct!' : 'Incorrect!') ?>
</div>
<?php endif; ?>

<?php if(isset($this->old_verb)): ?>
  <div class="answer">
    <?php if(isset($this->old_answer)): ?>
      The <?php echo htmlspecialchars($this->old_form) ?> form for <?php echo htmlspecialchars($this->old_verb) ?> is <?php echo htmlspecialchars($this->old_answer) ?>
    <?php endif; ?>
  </div>
<?php endif; ?>

<div class="conjbox">
    <div class="verb">
      <span class="word"><?php echo htmlspecialchars($this->verb['okurigana'].' ('.$this->verb['plain'].')'); ?></span>
      <div class="jisho"><a href="https://jisho.org/search/<?php echo urlencode($this->verb['okurigana'])?>">view on jisho.org</a></div>
    </div>
</div>

<div class="answerbox">
<form method="post" action="/conjugations.php">
  <input type="hidden" name="verb_id" value="<?php echo htmlspecialchars($this->verb['id'])?>"/>
  <input type="hidden" name="verb_form" value="<?php echo htmlspecialchars($this->verb_form)?>"/>
  <label class="answerlabel" for="answer">Write the <em><?php echo htmlspecialchars($this->human_verb_form)?></em> form:</label>
  <input class="answer" autofocus type="textfield" name="answer" placeholder="Answer..." value="<?php echo htmlspecialchars(!empty($this->answer) ? $this->answer : '')?>"/>

  <button class="button-primary" type="submit" name="submit">submit</button>
  <button class="button-secondary" type="submit" name="skip">skip</button>

</form>
</div>


<?php require('theme/footer.php'); ?>
