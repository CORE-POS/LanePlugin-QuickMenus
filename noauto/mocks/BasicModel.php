<?php
namespace COREPOS\pos\lib\models;

class BasicModel
{
    protected $columns = array();
    protected $instance = array();

    public function find($sort)
    {
        return array();
    }

    public function __call($name, $arguments)
    {
        if (!isset($this->columns[$name])) {
            $refl = new \ReflectionClass($this);
            throw new \Exception('Invalid accessor: ' . $name);
        }

        if (count($arguments) == 0) {
            if (isset($this->instance[$name])) {
                return $this->instance[$col];
            } elseif (isset($this->columns[$name]['default'])) {
                return $this->columns[$name]['default'];
            } else {
                return null;
            }
        } elseif (count($arguments) == 1) {
            $this->instance[$name] = $arguments[0];
        }
    }
}

