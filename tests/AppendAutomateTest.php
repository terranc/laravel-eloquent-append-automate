<?php

use Lookfeel\AppendAutomate\Database\Eloquent\Model;
use Lookfeel\AppendAutomate\Tests\Model\User;

require_once __DIR__.'/TestCase.php';

class AppendAutomateTest extends TestCase
{
    /**
     * Test the save method on a relationship
     *
     * @return void
     */
    public function testAppendAutomate()
    {
        Model::unguard();

        $user = new User();

        $user->firstname = "Terran";
        $user->lastname = "Chao";
        $user->gender = 0;
        $user->status = 1;

        $user->save();

        $user = User::select(['id', 'firstname', 'gender'])->first();

        $this->assertArrayNotHasKey('fullname', $user->toArray());
        $this->assertArrayHasKey('first_letter', $user->toArray());
        $this->assertArrayNotHasKey('status_text', $user->toArray());
        $this->assertArrayHasKey('gender_text', $user->toArray());
        $this->assertArrayHasKey('access', $user->toArray());
        $this->assertArrayHasKey('access_text', $user->toArray());

        Model::unguard();
    }
}
