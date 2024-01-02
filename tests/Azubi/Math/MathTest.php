<?php
declare(strict_types=1);

namespace Azubi\tests\Math;
require __DIR__ . '/../../../vendor/autoload.php';


use Azubi\Math\Math;
use Azubi\Math\MathInterface;
use PHPUnit\Framework\TestCase;
use DivisionByZeroError;

class MathTest extends TestCase
{
    /**
     * Subject Under Test
     */
    private ?MathInterface $sut;

    /**
     * runs before each test method
     */
    protected function setUp(): void
    {
        $this->sut = new Math();
    }

    /**
     * runs after each test method
     */
    protected function tearDown(): void
    {
        $this->sut = null;
    }

    public function testAdd()
    {
        $this->assertEquals(4.0, $this->sut->add(2.0, 2.0));
        $this->assertEquals(3.0, $this->sut->add(1.5, 1.5));
        $this->assertEquals(-3.0, $this->sut->add(-5.0, 2.0));
        $this->assertEquals(-7.0, $this->sut->add(-5.0, -2.0));
        $this->expectExceptionMessageMatches('/must be of type float, string given/');
        $this->sut->add(0.0,"string");
        $this->sut->add("string",0.0);
    }

    public function testSubtract()
    {
        $this->assertEquals(3.0, $this->sut->subtract(9.0, 6.0));
        $this->assertEquals(5.5, $this->sut->subtract(15.5, 10.0));
        $this->assertEquals(-3.0, $this->sut->subtract(6.0, 9.0));
        $this->assertEquals(-7.0, $this->sut->subtract(-5.0, 2.0));
        $this->assertEquals(-3.0, $this->sut->subtract(-5.0, -2.0));
        $this->expectExceptionMessageMatches('/must be of type float, string given/');
        $this->sut->subtract(0.0,"string");
        $this->sut->subtract("string",0.0);
    }

    public function testMultiply()
    {
        $this->assertEquals(8.0, $this->sut->multiply(2.0, 4.0));
        $this->assertEquals(0.0, $this->sut->multiply(0.0, 4.0));
        $this->assertEquals(6.75, $this->sut->multiply(2.5, 2.7));
        $this->assertEquals(-10.0, $this->sut->multiply(-2.0, 5.0));
        $this->assertEquals(10.0, $this->sut->multiply(-2.0, -5.0));
        $this->expectExceptionMessageMatches('/must be of type float, string given/');
        $this->sut->multiply(0.0,"string");
        $this->sut->multiply("string",0.0);
    }

    public function testDivide()
    {
        $this->assertEquals(3.0, $this->sut->divide(6.0, 2.0));
        $this->assertEquals(0.0, $this->sut->divide(0.0, 2.0));
        $this->assertEquals(12.1, $this->sut->divide(24.2, 2.0));
        $this->assertEquals(-5.0, $this->sut->divide(-10.0, 2.0));
        $this->assertEquals(5.0, $this->sut->divide(-10.0, -2.0));
        $this->expectExceptionMessageMatches('/must be of type float, string given/');
        $this->sut->divide(0.0,"string");
        $this->sut->divide("string",0.0);
        $this->expectException(DivisionByZeroError::class);
        $this->sut->divide(1.0, 0.0);
    }

    public function testCalculate()
    {
        $this->assertEquals(9.0, $this->sut->calculate(6.0,3.0,"Add"));
        $this->assertEquals(3.0, $this->sut->calculate(6.0,3.0,"Subtract"));
        $this->assertEquals(18.0, $this->sut->calculate(6.0,3.0,"Multiply"));
        $this->assertEquals(2.0, $this->sut->calculate(6.0,3.0,"Divide"));
        $this->assertEquals("Devision by zero is not possible.", $this->sut->calculate(6.0,0.0,"Divide"));
        $this->assertEquals("Error: incorrect operation.", $this->sut->calculate(6.0,3.0,"text"));
    }
}