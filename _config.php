<?php

SSImageHelpersExtension::add_image_path(array(
  'assets/',
  'assets/images/',
));

if ($current_theme = SSViewer::current_theme()) {
  SSImageHelpersExtension::add_image_path('themes/' . $current_theme . '/images/');
}
