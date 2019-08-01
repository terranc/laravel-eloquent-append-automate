<?php

namespace Lookfeel\AppendAutomate\Database\Eloquent;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Lookfeel\AppendAutomate\AppendAutomateTrait;

class Model extends Eloquent
{
    use AppendAutomateTrait;
}
