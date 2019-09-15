
var reveal_delay = 5000;
var cycle_delay = 15000;

$(function() {
  // Show the yomi and meaning after a certain time or click.

  function showNewKanji() {
    $.get('api.php', {
      'query': 'kanjibox',
      'jlpt': decodeURIComponent($.getUrlVars()['jlpt']),
    }, function(data) {
      $('.kanjibox').fadeOut('slow', function(){
        $('.kanjibox').replaceWith(data)
        $('.kanjibox').css('opacity', 0).animate({opacity:1}, 800, 'swing', setupReveal);
        setTimeout(showNewKanji, cycle_delay);
      });
    });
  }

  function setupReveal() {
    $('.kanjibox .kunyomi,.kanjibox .onyomi,.kanjibox .meaning').delay(reveal_delay).animate({opacity:1}, 800);
  }

  // Reveal the first one on page load.
  setupReveal();

  setTimeout(showNewKanji, cycle_delay);
});

