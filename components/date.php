<?php
  $this->props([
    'format' => ['type' => 'String', 'default' => 'Y-m-d']
  ]);
?>

<div class="date">
  <p><?php echo date($this->format); ?></p>
</div>