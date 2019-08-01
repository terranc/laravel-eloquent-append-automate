<?php

namespace Lookfeel\AppendAutomate\Tests\Model;

use Lookfeel\AppendAutomate\Database\Eloquent\Model;

class User extends Model
{
    protected $appends = [
        'first_letter',
        'firstname|lastname' => 'fullname',     // firstname 和 lastname 字段缺一不可，否则不返回 fullname
        'gender' => 'gender_text',  // gender 是一个 int 字段，0:女，1:男
        'status' => 'status_text', // status 是一个 int 字段，0:禁用，1:启用
        'gender_text' => 'access', // status 是一个 int 字段，0:禁用，1:启用
        'access' => 'access_text', // status 是一个 int 字段，0:禁用，1:启用
    ];

    public function getStatusTextAttribute()
    {
        return ['Enabled', 'Disabled'][$this->status];
    }

    public function getGenderTextAttribute()
    {
        return ['Female', 'Male'][$this->gender];
    }

    public function getFirstLetterAttribute()
    {
        return substr($this->firstname, 0, 1);
    }

    public function getFullnameAttribute()
    {
        return $this->firstname . ' ' . $this->lastname;
    }

    public function getAccessAttribute()
    {
        return $this->gender_text === 'Female';
    }

    public function getAccessTextAttribute()
    {
        return $this->access ? 'can' : 'Can not';
    }

}
