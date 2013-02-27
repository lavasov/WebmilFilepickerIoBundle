Symfony 2 FilepickerIo Bundle
========================
## Installation
### Step 1) Download bundle
#### Method a) Using composer (symfony 2.1 pattern)

Add on composer.json (see http://getcomposer.org/)

    "require" :  {
        // ...
        "webmil/filepickerio-bundle": "dev-master",
    }

#### Method b) Using the `deps` file (symfony 2.0 pattern)

Add the following lines to your  `deps` file and then run `php bin/vendors
install`:

```
[WebmilFilepickerIoBundle]
    git=https://github.com/imsashko/WebmilFilepickerIoBundle.git
    target=bundles/Webmil/FilepickerIoBundle
    version=origin/2.0
```

### Step 2) Register the namespaces

If you installed the bundle by composer, use the created autoload.php  (jump to step 3).
Add the following two namespace entries to the `registerNamespaces` call
in your autoloader:

```php
<?php
// app/autoload.php
$loader->registerNamespaces(array(
    // ...
    'Webmil\\FilepickerIoBundle' => __DIR__.'/../vendor/bundles',
    // ...
));
```

### Step 3) Register the bundle

To start using the bundle, register it in your Kernel:

```php
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new Webmil\FilepickerIoBundle\WebmilFilepickerIoBundle(),
    );
    // ...
}
```

### Step 4) Configure the bundle

The bundle comes with a sensible default configuration, which is listed below.
If you skip this step, these defaults will be used.

```yaml
# app/config/config.yml
webmil_filepicker_io:
    api_key: yourKey
```

## Usage
### Initializing in twig template:

```jinja
{{ filepicker_io_initialize() }}
```

### Adding an upload field to your form:

Set **type** to 'filepicker' in form builder. To enable drag&drop set 'dragdrop' => true.
See [the filepicker.io documentation](https://developers.filepicker.io/docs/web/#widgets-pick) for the full options list.

```php
$form = $this->createFormBuilder()
    ->add('filepicker', 'filepicker', array(
        'dragdrop' => true,
        'attr' => array(
            'data-fp-mimetype' => 'image/png'
            )
        ))
    ->getForm();
```

### Displaying an image:

```jinja
{{ filepicker_io_image_tag('https://www.filepicker.io/api/file/hFHUCB3iTxyMzseuWOgG', {'w': '200'}, {'class': 'classname'})}}
```
See [the filepicker.io documentation](https://developers.filepicker.io/docs/web/#fpurl-images) for the full options list.


### Allowing the user to download a file (or upload it to any of the supported services)

```jinja
{{ filepicker_io_save_button('http://path/to/file.png', 'Download file', 'image/png', {'data-fp-suggestedFilename': 'name.png'}) }}
```
See [the filepicker.io documentation](https://developers.filepicker.io/docs/web/#widgets-export) for the full options list.
