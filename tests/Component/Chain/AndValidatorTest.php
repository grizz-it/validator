<?php

/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace GrizzIt\Validator\Tests\Component\Chain;

use PHPUnit\Framework\TestCase;
use GrizzIt\Validator\Component\Chain\AndValidator;
use GrizzIt\Validator\Component\Numeric\MinimumValidator;
use GrizzIt\Validator\Component\Type\NumberValidator;
use stdClass;

/**
 * @coversDefaultClass GrizzIt\Validator\Component\Chain\AndValidator
 */
class AndValidatorTest extends TestCase
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
        $subject = new AndValidator(
            new NumberValidator(),
            new MinimumValidator(2)
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
                [],
                false
            ],
            [
                1,
                false
            ],
            [
                2.5,
                true
            ],
            [
                new stdClass(),
                false
            ],
            [
                'foo',
                false
            ],
            [
                true,
                false
            ],
            [
                null,
                false
            ]
        ];
    }
}
