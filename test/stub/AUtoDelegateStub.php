<?php
/**
 * Created by PhpStorm.
 * User: shina
 * Date: 19/04/14
 * Time: 16:52
 */

namespace stub;


use ebussola\common\superpower\AutoDelegate;
use ebussola\common\superpower\Delegatable;

class AutoDelegateStub implements Delegatable {
    use AutoDelegate;

    public $target;

    public function __construct($target) {
        $this->target = $target;
    }

    /**
     * Must return an array with key value.
     * Where key is the method called
     * And the value is the object to be delegated
     *
     * @return array
     */
    public function _delegateSchema()
    {
        return [
            'getName' => $this->target,
            'setName' => $this->target
        ];
    }

}


class AutoDelegateStub2 extends AutoDelegateStub {

    public function _delegateSchema()
    {
        return [
            '::' => $this->target
        ];
    }

}

class AutoDelegateTargetStub {

    public $name;

    public function __construct($name) {
        $this->name = $name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }

}

class AutoDelegateNotImplemented {
    use AutoDelegate;
}