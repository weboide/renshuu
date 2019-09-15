<div class="kanjibox">
    <div class="kunyomi"><?php echo htmlspecialchars($this->kanji['kunyomi']); ?></div>
    <div class="onyomi"><?php echo htmlspecialchars($this->kanji['onyomi']); ?></div>
    <div class="kanji"><?php echo htmlspecialchars($this->kanji['kanji']); ?></div>
    <div class="meaning"><?php echo htmlspecialchars($this->kanji['meaning']); ?></div>
    <div class="jlpt"><?php echo htmlspecialchars(substr($this->kanji['jlpt'], 0, 2)); ?></div>
</div>
