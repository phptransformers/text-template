<?php

namespace PhpTransformers\TextTemplate;

use PhpTransformers\PhpTransformer\Transformer;

/**
 * Class TextTemplateTransformer.
 *
 * The PhpTransformer for phpunit Text_Template template engine.
 * {@link https://github.com/sebastianbergmann/php-text-template/}
 *
 * @author  MacFJA
 * @package PhpTransformers\TextTemplate
 * @license MIT
 */
class TextTemplateTransformer extends Transformer
{
    /**
     * Build the Text_Template transformer.
     *
     * @param array $options An array of parameters used to set up the Text_Template configuration.
     *                       Available configuration values include:
     *                       - `open-delimiter`: a string that represent the beginning of a variable
     *                       - `close-delimiter`: a string that represent the end of a variable
     *                      If `text-template`, both `open-delimiter` and `close-delimiter` are ignored.
     *
     * @throws \InvalidArgumentException
     */
    public function __construct(array $options = array())
    {
        $defaults = array(
            'open-delimiter' => '{',
            'close-delimiter' => '}'
        );
        $options += $defaults;

        parent::__construct($options);
    }

    public function getName()
    {
        return 'text-template';
    }

    public function renderFile($file, array $locals = array())
    {
        $engine = new \Text_Template($file, $this->options['open-delimiter'], $this->options['close-delimiter']);
        $engine->setVar($locals);

        return $engine->render();
    }

    public function render($template, array $locals = array())
    {
        $file = tempnam(sys_get_temp_dir(), 'ptt');
        file_put_contents($file, $template);
        $result = $this->renderFile($file, $locals);
        unlink($file);

        return $result;
    }
}
