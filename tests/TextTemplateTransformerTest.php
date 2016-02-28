<?php

namespace PhpTransformers\TextTemplate\Test;

use PhpTransformers\TextTemplate\TextTemplateTransformer;

class TextTemplateTransformerTest extends \PHPUnit_Framework_TestCase
{
    public function testRenderFile()
    {
        $engine = new TextTemplateTransformer();
        $template = 'tests/Fixtures/TextTemplateTransformer.txt';
        $locals = array(
            'name' => 'Linus',
        );
        $actual = $engine->renderFile($template, $locals);
        self::assertEquals('Hello, Linus!', $actual);
    }

    public function testRender()
    {
        $engine = new TextTemplateTransformer();
        $template = file_get_contents('tests/Fixtures/TextTemplateTransformer.txt');
        $locals = array(
            'name' => 'Linus',
        );
        $actual = $engine->render($template, $locals);
        self::assertEquals('Hello, Linus!', $actual);
    }

    public function testGetName()
    {
        $engine = new TextTemplateTransformer();
        self::assertEquals('text-template', $engine->getName());
    }

    public function testDelimiters()
    {
        $engine = new TextTemplateTransformer(array(
            'open-delimiter' => '<',
            'close-delimiter' => '>'
        ));
        $template = 'Hello, <name>!';
        $locals = array(
            'name' => 'Linus',
        );
        $actual = $engine->render($template, $locals);
        self::assertEquals('Hello, Linus!', $actual);
    }
}
