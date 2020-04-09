<?php
/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace GrizzIt\Validator\Tests\Component\Type;

use PHPUnit\Framework\TestCase;
use GrizzIt\Validator\Component\Type\NumberValidator;
use stdClass;

/**
 * @coversDefaultClass GrizzIt\Validator\Component\Type\NumberValidator
 */
class NumberValidatorTest extends TestCase
{
    /**
     * @param mixed $data
     * @param bool  $expected
     *
     * @return void
     *
     * @covers ::__invoke
     *
     * @dataProvider dataProvider
     */
    public function testInvoke($data, bool $expected): void
    {
        $subject = new NumberValidator();
        $this->assertEquals($expected, $subject($data));
    }

    /**
     * @return array
     */
    public function dataProvider(): array
    {
        return [
            [
                new stdClass(),
                false
            ],
            [
                'foo',
                false
            ],
            [
                1,
                true
            ],
            [
                2.5,
                true
            ],
            [
                true,
                false
            ],
            [
                null,
                false
            ],
            [
                [],
                false
            ]
        ];
    }
}