
var reveal_delay = 5000;
var cycle_delay = 15000;

$(function() {
  // Show the yomi and meaning after a certain time or click.

  function showNewKanji(speed) {
    if(speed === undefined) {
      speed = 800;
    }
    $.get('api.php', {
      'query': 'kanjibox',
      'jlpt': getJLPTlvls(),
    }, function(data) {
      $('.kanjibox').fadeOut(speed, function(){
        $('.kanjibox').replaceWith(data)
        $('.kanjibox').css('opacity', 0).animate({opacity:1}, speed, 'swing', setupReveal);
        setTimeout(showNewKanji, cycle_delay);
      });
    });
  }

  function setupReveal() {
    $('.kanjibox .kunyomi,.kanjibox .onyomi,.kanjibox .meaning').delay(reveal_delay).animate({opacity:1}, 800);
  }

  function getJLPTlvls() {
    var param = [];
    $('.jlptlvl input[type=checkbox]').each(function() {
      if($(this).is(":checked")) {
        param.push($(this).data('lvl'));
      };
    });
    return param;
  }


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

