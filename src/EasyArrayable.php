<?php

namespace ebussola\common\superpower;

use Doctrine\Common\Inflector\Inflector;

/**
 * User: Leonardo Shinagawa
 * Date: 23/02/13
 * Time: 16:29
 */
trait EasyArrayable {
    /**
     * TODO explicar como funciona
     */

    /**
     * @return array
     */
    public function toArray() {
        $result = array();

        foreach (get_class_methods($this) as $methodName) {
            if (substr($methodName, 0, 3) === 'get') {
                $value = $this->$methodName();

                $value = $this->processEnumValue($value);

                $indexName = Inflector::tableize(substr($methodName, 3));
                $result[$indexName] = $value;
            }
        }

        foreach (get_object_vars($this) as $property => $value) {
            $value = $this->processEnumValue($value);
            $result[$property] = $value;
        }

        return $result;
    }

    /**
     * @param array $data
     */
    public function fromArray(Array $values) {
        foreach ($values as $key => $value) {
            $methodName = 'set' . Inflector::camelize($key);
            if (method_exists($this, $methodName)) {
                $this->$methodName($value);
            } else {
                $this->$key = $value;
            }
        }
    }

    /**
     * @param $value
     * @return mixed
     */
    private function processEnumValue($value)
    {
        if (class_exists('\ebussola\common\datatype\Enum') && $value instanceof \ebussola\common\datatype\Enum) {
            $value = $value->getIndex();
            return $value;
        }
        return $value;
    }

}