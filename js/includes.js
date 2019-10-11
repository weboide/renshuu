$.extend({
  getUrlVars: function(){
    var vars = [], hash;
    var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
    for(var i = 0; i < hashes.length; i++)
    {
      hash = hashes[i].split('=');
      vars.push(hash[0]);
      vars[hash[0]] = hash[1];
    }
    return vars;
  },
  getUrlVar: function(name){
    return $.getUrlVars()[name];
  }
});

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