
var reveal_delay = 5000;
var cycle_delay = 15000;

$(function() {
  // Show the yomi and meaning after a certain time or click.

  // Load selected lvls from cookies
  var lvls = Cookies.getJSON('lvls');
  if(lvls) {
    $('.jlptlvl input[type=checkbox]').each(function() {
      if(lvls.includes($(this).data('lvl'))) {
        $(this).attr('checked', 'checked')
      }
    });
    showNewKanji(0);
  }

  // Save selected lvls to cookies on change
  $('.jlptlvl input[type=checkbox]').change(function() {
    Cookies.set('lvls', getJLPTlvls());
  });

  // Reveal the first one on page load.
  setupReveal();
  // Set timer for next kanji to show
  setTimeout(showNewKanji, cycle_delay);

});

