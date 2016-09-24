<?php

class ColorTest extends PHPUnit_Framework_TestCase
{
    /** @var Color Instance of Colorizer\Color */
    protected $color;

    public function setUp() {
        $this->color = new Colorizer\Color(12, 162, 234);
    }

    public function test_it_has_a_red_value()
    {
        $this->assertEquals(12, $this->color->red);
    }

    public function test_it_has_a_green_value()
    {
        $this->assertEquals(162, $this->color->green);
    }

    public function test_it_has_a_blue_value()
    {
        $this->assertEquals(234, $this->color->blue);
    }

    public function test_it_has_a_hex_value()
    {
        $this->assertEquals('#0ca2ea', $this->color->hex());
    }

    public function test_it_has_an_rgb_value()
    {
        $this->assertEquals('rgb(12, 162, 234)', $this->color->rgb());
    }

    public function test_it_can_be_normalized()
    {
        $normalize = $this->color->normalize(64, 224);

        $this->assertEquals(new Colorizer\Color(64, 162, 224), $normalize);
    }

    public function test_it_throws_an_exception_when_normalized_with_an_incorrect_value()
    {
        $this->setExpectedException('OutOfRangeException');

        $color = $this->color->normalize(-1, 256);
    }
}
