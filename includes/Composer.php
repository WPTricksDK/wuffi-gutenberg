<?php 

namespace Wuffi;

class Composer {
  private $args;

  public function __get($name) {
    return $this->args[$name];
  }

  public function __construct($acf, $custom) {
    $this->acf = $acf;
    $this->custom = $custom;
  }

  private function reposition(&$array, $a, $b) {
    $p1 = array_splice($array, $a, 1);
    $p2 = array_splice($array, 0, $b);
    $array = array_merge($p2,$p1,$array);
  }

  public function build() {

    if ($this->acf || $this->custom):
      $components = $this->acf ? $this->acf : [];

      if ($this->custom) {
        foreach ($this->custom as $component) {
          $components[] = $component;
          if (isset($component['index'])) {
            $this->reposition($components, count($components) - 1, $component['index']);
          }
        }
      }

      echo '<div class="composer">';
        foreach ($components as $key => $component) {
          $layout = str_replace('_', '-', $component['acf_fc_layout']);
          component($layout, $component);
        }
      echo '</div>';

    endif;

  }

}
