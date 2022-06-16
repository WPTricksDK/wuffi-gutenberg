<?php 

use Wuffi\View;
use Wuffi\Composer;

/**
 * Load environment file
 */
function loadEnv(string $path = '.env') {

  $path = THEME_PATH.'/'.$path;

  if (!file_exists($path) || !is_readable($path)) { 
    return;
  }

  $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

  foreach ($lines as $line) {

    if (strpos(trim($line), '#') === 0) { 
      continue; 
    }

    list($name, $value) = explode('=', $line, 2);
    $name = trim($name);
    $value = trim($value);

    putenv(sprintf('%s=%s', $name, $value));
    $_ENV[$name] = $value;
    $_SERVER[$name] = $value;

  }

}


/**
 * Render component
 */
function component(string $path, array $data = []) {
  (new View)->render('components.'.$path, $data);
}


/**
 * Compose components
 */
function compose($acf = [], $custom = []) {
  (new Composer($acf, $custom))->build();
}


/**
 * Return path to public folder
 */
function asset($asset) {
  return get_template_directory_uri() . '/public' . $asset;
}


/**
 * Format var_vump
 */
function pre_dump($data) {
  echo '<pre>';
  var_dump($data);
  echo '</pre>';
}


/**
 * Dump and die
 */
function dd($data) {
  pre_dump($data);
  die;
}
