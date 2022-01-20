<?php

namespace Tests\Unit;

use App\User;
use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $this->assertTrue(true);
    }

    public function testComparador_table()
    {
        $user = new User();

        $colunas = [
          'name',
          'email',
          'password'
        ];

        $comparador = array_diff($colunas, $user->getFillable());

        $this->assertEquals(0, count($comparador));
    }
}
