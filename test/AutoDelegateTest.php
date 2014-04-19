<?php
/**
 * Created by PhpStorm.
 * User: shina
 * Date: 19/04/14
 * Time: 16:59
 */

class AutoDelegateTest extends PHPUnit_Framework_TestCase {

    public function testDelegate() {
        $auto = new \stub\AutoDelegateStub(new \stub\AutoDelegateTargetStub('Leo'));

        $this->assertEquals('Leo', $auto->getName());

        $auto->setName('shina');
        $this->assertEquals('shina', $auto->getName());
    }

    public function testDelegate2() {
        $auto = new \stub\AutoDelegateStub2(new \stub\AutoDelegateTargetStub('Leo'));

        $this->assertEquals('Leo', $auto->getName());

        $auto->setName('shina');
        $this->assertEquals('shina', $auto->getName());
    }

    public function testInvalidDelegate() {
        $this->setExpectedException('BadMethodCallException');

        $auto = new \stub\AutoDelegateNotImplemented();
        $auto->test();
    }

}