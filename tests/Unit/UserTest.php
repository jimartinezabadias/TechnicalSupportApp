<?php

namespace Tests\Unit;

// use PHPUnit\Framework\TestCase;
use Tests\TestCase;
use App\Models\User;

class UserTest extends TestCase
{

    public function testUserIsAdmin()
    {
        $user = User::factory()->create(['role' => 'admin']);
        $userIsAdmin = $user->isAdmin();
        $this->assertTrue($userIsAdmin);
    }
    
    public function testUserIsNotAdmin()
    {
        $user = User::factory()->create(['role' => 'client']);
        $userIsAdmin = $user->isAdmin();
        $this->assertFalse($userIsAdmin);
    }
}
