<?php

namespace Lookfeel\AppendAutomate\Tests\Model;

use Lookfeel\AppendAutomate\Database\Eloquent\Model;

class User extends Model
{
    protected $appends = [
        'status' => 'status_text',
        'fullname',
    ];

    public function getStatusTextAttribute()
    {
        return ['Enabled', 'Disabled'][$this->status];
    }

    public function getFullnameAttribute()
    {
        return $this->firstname . " " . $this->lastname;
    }

}
