<?php

class Test extends PHPUnit_Framework_TestCase
{
    public function testPlugin()
    {
        $obj = new QuickMenus();
    }
    
    public function testPage()
    {
        $page = new QMDisplay();
        $this->assertInternalType('boolean', $page->preprocess());
        ob_start();
        $page->head_content();
        $this->assertInternalType('string', ob_get_clean());
        CoreLocal::set('qmNumber', 99);
        ob_start();
        $page->body_content();
        $this->assertInternalType('string', ob_get_clean());
    }

    public function testParser()
    {
        $p = new QuickMenuLauncher();
        $this->assertEquals(true, $p->check('QM1'));
        $this->assertEquals(false, $p->check('Foo'));
        $this->assertInternalType('array', $p->parse('QM1'));
        $p->doc();
    }
}

