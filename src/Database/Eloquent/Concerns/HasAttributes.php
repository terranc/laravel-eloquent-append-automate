<?php

namespace LookFeel\AppendAutomate\Database\Eloquent\Concerns;

use Illuminate\Support\Str;

trait HasAttributes
{
    protected function getArrayableAppends()
    {
        foreach ($this->appends as $k => $v) {
            if (is_string($k) && !isset($this->attributes[$k])) {
                unset($this->appends[$k]);
            }
        }

        return parent::getArrayableAppends();
    }
}
