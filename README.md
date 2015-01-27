# SilverStripe Image Helpers Module

SS-image-helpers is a SilverStripe Module that provides some template methods, a.k.a., View Helpers, for image usage.

Works fine with [SS-Image-Min](https://github.com/encoda/ss-image-min).

## Requirements

SilverStripe Framework 3.0+

## Installation

### Composer

Create a composer.json file:

``` json
{
    "require" : {
        "encoda/ss-image-helpers": "0.0.0"
    }
}
```

Navigate to your project root and run the install command.

`$ composer install`

### Github

Navigate to the root directory of your SilverStripe application and execute `git clone https://github.com/encoda/ss-image-helpers.git`

### Manually

Download [this zip file](https://github.com/encoda/ss-image-helpers/zipball/master) and extract it in your SilverStripe root directory.

## Usage

### ImageAbsoluteUrl( string $image_file_name )

Returns the `AbsoluteUrl` for the `Image` of the given file name, starting with the application `absoluteBaseURL`.

``` ss
  <img src="$ImageAbsoluteUrl('example.png')" />
  <!-- <img src="http://example.com/assets/images/example.png" /> -->
```

### ImageRelativeUrl( string $image_file_name )

Returns the `RelativeLink` for the `Image` of the given file name.

``` ss
  <img src="$ImageRelativeLink('example.png')" />
  <!-- <img src="assets/images/example.png" /> -->
```

### ImageUrl( string $image_file_name )

Returns the `Url` for the `Image` of the given file name, starting with the application `baseURL`.

``` ss
  <img src="$ImageUrl('example.png')" />
  <!-- <img src="/assets/images/example.png" /> -->
```

### ImageTag( string $image_file_name )

Returns the html `Tag` for the `Image` of the given file name.

``` ss
  $ImageTag('example.png')
  <!-- <img src="/assets/images/example.png" /> -->
```

## Configurations

### Image Paths

By default, when any of the helpers methods is used to insert an image in the template, the module searches for the image file, by its name, in the following directories:

- assets/
- assets/images/
- themes/{current theme}/images/


Images out of the the Images Path are ignored by the helpers. To add new directories to the Images Path, add the following line to your `_config.php`.

``` php
<?php

SSImageHelpersExtension::add_image_path('my/custom/image/path/');
```

It also accepts multiple paths at the same time in the form of an array.

``` php
<?php

SSImageHelpersExtension::add_image_path(array(
  'path/',
  'some/image/path/',
  'some/new/image/path/',
  'and/another/image/path/',
));
```

## License (MIT)

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
