<?php
class View {

  public $heads = [];
  public $scripts = [];

  public function __construct($template) {
    $this->template = $template;
  }

  public function __toString() {
    ob_start();
    include('views/'.$this->template.'.php');
    return ob_get_clean();
  }

}