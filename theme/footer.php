  <script
    src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
    crossorigin="anonymous"></script>
  </body>
  <script
    src="https://cdnjs.cloudflare.com/ajax/libs/js-cookie/2.2.1/js.cookie.min.js"
    integrity="sha256-oE03O+I6Pzff4fiMqwEGHbdfcW7a3GRRxlL+U49L5sA="
    crossorigin="anonymous"></script>
  <?php foreach($this->scripts as $s): ?>
    <?php echo $s; ?>
  <?php endforeach; ?>
  <script src="js/includes.js"></script>
  <script src="js/main.js"></script>
</html>