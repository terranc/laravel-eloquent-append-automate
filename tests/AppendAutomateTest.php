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
        $user->status = 1;

        $this->assertArrayHasKey('fullname', $user->toArray());
        $this->assertArrayHasKey('status_text', $user->toArray());

        Model::unguard();
    }
}
