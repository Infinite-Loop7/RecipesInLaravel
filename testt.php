<?php
require_once(dirname(__FILE__) . '/../autorun.php');
require_once(dirname(__FILE__) . '/../url.php');
require_once(dirname(__FILE__) . '/../form.php');
require_once(dirname(__FILE__) . '/../page.php');
require_once(dirname(__FILE__) . '/../encoding.php');
Mock::generate('SimplePage');

class TestOfForm extends UnitTestCase {
    
    function page($url, $action = false) {
        $page = new MockSimplePage();
        $page->returns('getUrl', new SimpleUrl($url));
        $page->returns('expandUrl', new SimpleUrl($url));
        return $page;
    }
    
    function testPost() {
        $form = new SimpleForm(new SimpleFormTag(array('method' => 'post')), $this->page('C:\Users\Garen\Documents\CS580\Recipes\RecipesInLaravel\public\testtt.html'));
        $select = new SimpleSelectionTag(array('name' => 'a'));
        $select->addTag(new SimpleOptionTag(
                array('value' => 'aaa', 'selected' => '')));
        $form->addWidget($select);
        $this->assertIdentical(
                $form->submit(),
                new SimplePostEncoding(array('a' => 'aaa')));
    }

}
?>