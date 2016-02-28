# Text_Template for PHPTransformers

[PHPUnit's Text_Template](https://github.com/sebastianbergmann/php-text-template/) support for [PHPTransformers](http://github.com/phptransformers/phptransformer).

## Install

Via Composer

``` bash
$ composer require phptransformers/text-template
```

## Usage

``` php
$engine = new TextTemplateTransformer();
echo $engine->render('Hello, {name}!', array('name' => 'phptransformers'));
```

### Options

``` php
$engine = new TextTemplateTransformer(array(
    'open-delimiter' => '{', // Default to '{' (Text_Template default)
    'close-delimiter' => '}' // Default to '}' (Text_Template default)
));

// ...

$textTemplate = new \Text_Template();
$engine = new TextTemplateTransformer(array(
    'text-template' => $textTemplate // All others options are ignored
));
```

## Testing

``` bash
$ composer test
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.