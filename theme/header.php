<!DOCTYPE html>
<html class="no-js">
  <script>
      // Sets 'js' on html element and removes 'no-js' if present (here to prevent flashing)
      (function(){
          document.documentElement.className = document.documentElement.className.replace(/(^|\s)no-js(\s|$)/, '$1$2') + (' js '); 
      })();
  </script>
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1">
      <title><?php echo htmlspecialchars(SITE_TITLE);?></title>
    <meta name="author" content="Arnaud Soyez">
    <meta name="description" content="A slideshow of Japanese kanji and words, for learners of the Japanese language.">
    <meta name="keywords" content="kanji,japanese,learning,slideshow,flashcards,kunyomi,onyomi">
    <link href="https://fonts.googleapis.com/css?family=Noto+Serif+JP&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha256-l85OmPOjvil/SOvVt3HnSSjzF1TUMyT9eV0c2BzEGzU=" crossorigin="anonymous" />
    <link rel="stylesheet" href="theme/main.css" type="text/css">
    <?php foreach($this->heads as $h): ?>
      <?php echo $h; ?>
    <?php endforeach; ?>
  </head>
  <body>
  <h1><?php echo htmlspecialchars(SITE_TITLE);?></h1>