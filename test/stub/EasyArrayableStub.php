<?php
/**
 * Created by PhpStorm.
 * User: shina
 * Date: 19/04/14
 * Time: 12:22
 */

namespace stub;


use ebussola\common\superpower\EasyArrayable;

class EasyArrayableStub {
    use EasyArrayable;

    private $id;
    public $name;
    protected $last_name;

    public function __construct($id, $name, $lastname) {
        $this->id = $id;
        $this->name = $name;
        $this->last_name = $lastname;
    }

    /**
     * @param mixed $lastname
     */
    public function setLastName($lastname)
    {
        $this->last_name = $lastname;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

} 