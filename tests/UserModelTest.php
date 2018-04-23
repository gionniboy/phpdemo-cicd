<?php

namespace Demo\Tests;

use Demo\Model\User;

/**
 * Class UserModelTest
 *
 * @package Demo\Tests
 */
class UserModelTest extends AbstractModelTest
{
    /**
     * @test
     */
    public function canSelectAllUsers()
    {
        $users = User::all();
        $this->assertInstanceOf(
            'Illuminate\Database\Eloquent\Collection',
            $users
        );

        $this->assertTrue($users->count() > 0);
    }

    /**
     * @test
     */
    public function canSelectUserById()
    {
        $testId = 1;

        $user = User::find($testId);
        $this->assertInstanceOf('Demo\Model\User', $user);

        $this->assertEquals($testId, $user->id);
    }
}