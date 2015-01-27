<?php

if ($current_theme = SSViewer::current_theme()) {
  SSImageHelpersExtension::add_image_path('themes/' . $current_theme . '/images/');
}
