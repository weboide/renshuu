  <script
    src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
    crossorigin="anonymous"></script>
  </body>
  <?php foreach($this->scripts as $s): ?>
    <?php echo $s; ?>
  <?php endforeach; ?>
  <script src="js/includes.js"></script>
  <script src="js/main.js"></script>
</html>