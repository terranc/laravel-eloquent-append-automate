<?php

namespace Lookfeel\AppendAutomate;

trait AppendAutomateTrait
{
    protected function getArrayableAppends()
    {
        foreach ($this->appends as $k => $v) {
            if (is_string($k)) {
                $columns = explode('|', $k);
                foreach ($columns as $column) {
                    if (!isset($this->$column)) {
                        unset($this->appends[$k]);
                    }
                }
            }
        }

        return parent::getArrayableAppends();
    }
}
