<?php

class SSImageHelpersExtension extends Extension {

  protected static $image_paths = array();

  // Instance Methods

  public function ImageAbsoluteUrl($image_name) {
    return $this->getImageInstance($image_name)->getAbsoluteUrl();
  }

  public function ImageTag($image_name) {
    return $this->getImageInstance($image_name)->getTag();
  }

  public function ImageUrl($image_name) {
    return $this->getImageInstance($image_name)->getUrl();
  }

  // Static Methods

  public static function add_image_path($paths = null) {
    switch (gettype($paths)) {
      case 'string':
        array_push(static::$image_paths, $paths);
        break;
      case 'array':
        foreach ($paths as $path)
          static::add_image_path($path);
    }

    array_unique(static::$image_paths);
  }

  // Private Instance Methods

  private function getImageInstance($image_name) {
    $image = Injector::inst()->get('Image');

    if ($image_path = $this->searchForFileInPaths($image_name)) {
      $image->fileName = $image_path;
      return $image;
    } else {
      throw new Exception('Could not find "' . $image_name . '". You may either mispelled it or it\'s location is not included in the SSImageHelpers::$image_paths.');
    }
  }

  private function searchForFileInPaths($file_name) {
    foreach (static::$image_paths as $path) {
      if (substr($path, -1) != "/") $path .= "/";
      $file_path = $path . $file_name;
      $search_path = Director::baseFolder() . ($path[0] == "/" ? "" : "/") . $file_path;
      if (file_exists($search_path)) return $file_path;
    }
    return false;
  }

}
