<?php

/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace GrizzIt\Validator\Tests\Component\Logical;

use PHPUnit\Framework\TestCase;
use GrizzIt\Validator\Component\Logical\IfThenElseValidator;
use GrizzIt\Validator\Component\Numeric\MaximumValidator;
use GrizzIt\Validator\Component\Type\NumberValidator;
use GrizzIt\Validator\Component\Type\StringValidator;

/**
 * @coversDefaultClass GrizzIt\Validator\Component\Logical\IfThenElseValidator
 */
class IfThenElseValidatorTest extends TestCase
{
    /**
     * @param mixed $data
     * @param bool  $expected
     *
     * @return void
     *
     * @covers ::__invoke
     * @covers ::__construct
     *
     * @dataProvider dataProvider
     */
    public function testInvoke($data, bool $expected): void
    {
        $subject = new IfThenElseValidator(
            new NumberValidator(),
            new MaximumValidator(1),
            new StringValidator()
        );
        $this->assertEquals($expected, $subject($data));
    }

    /**
     * @return array
     */
    public function dataProvider(): array
    {
        return [
            [
                .5,
                true
            ],
            [
                1.5,
                false
            ],
            [
                'foo',
                true
            ],
            [
                [],
                false
            ]
        ];
    }
}
