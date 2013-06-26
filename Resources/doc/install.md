WSFormBundle Installation
==================================

## Prerequisites

This bundle requires 
- Symfony 2.3+.
- [GenemuFormBundle](https://github.com/genemu/GenemuFormBundle)
- [WSTwigExtensionBundle](https://github.com/WedgeSama/WSTwigExtensionBundle)

## Installation

### Step 1: Download WSFormBundle using composer

Add WSFormBundle in your composer.json:

```js
{
    "require": {
        "wedgesama/form-bundle": "dev-master",
        "wedgesama/twig-extension-bundle": "dev-master",
        "genemu/form-bundle": "2.2.*"
    }
}
```

Now tell composer to download the bundle with this command:

``` bash
$ php composer.phar update wedgesama/form-bundle
```

### Step 2: Enable the bundle

Enable the bundle in the kernel:

``` php
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new WS\FormBundle\WSFormBundle(),
        new WS\TwigExtensionBundle\WSTwigExtensionBundle(),
        new Genemu\Bundle\FormBundle\GenemuFormBundle(),
    );
}
```

