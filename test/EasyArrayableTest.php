<?php
/**
 * Created by PhpStorm.
 * User: shina
 * Date: 19/04/14
 * Time: 12:24
 */

class EasyArrayableTest extends PHPUnit_Framework_TestCase {

    public function testToArray() {
        $arr = new \stub\EasyArrayableStub(10, 'Leo', 'Shina');

        $this->assertEquals([
            'id' => 10,
            'name' => 'Leo',
            'last_name' => 'Shina'
        ], $arr->toArray());
    }

    public function testToArrayWithEnum() {
        // @Todo
    }

    public function testFromArray() {
        $arr = new \stub\EasyArrayableStub(10, 'Leo', 'Shina');

        $values = [
            'id' => 11,
            'name' => 'Leonardo',
            'last_name' => 'Shinagawa'
        ];

        $arr->fromArray($values);
        $this->assertEquals($values, $arr->toArray());
    }

}