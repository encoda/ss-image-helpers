<?php

class SSImageHelpersExtension extends Extension {

  public function ImagePath($image_name) {
    return $this->getImageInstance($image_name)->getAbsoluteURL();
  }

  public function ImageTag($image_name) {
    return $this->getImageInstance($image_name)->getTag();
  }

  // Protected

  protected function getImageInstance($image_name) {
    $image = Injector::inst()->get('Image');
    $image->fileName = $this->ThemeDir() . '/images/' . $image_name;
    return $image;
  }

  protected function ThemeDir($subtheme = null) {
    if ($theme = SSViewer::current_theme()) {
      return "themes/$theme" . ($subtheme ? "_$subtheme" : "");
    } else {
      return project();
    }
  }

}
