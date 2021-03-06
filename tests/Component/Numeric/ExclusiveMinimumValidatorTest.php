<?php

/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace GrizzIt\Validator\Tests\Component\Numeric;

use PHPUnit\Framework\TestCase;
use GrizzIt\Validator\Component\Numeric\ExclusiveMinimumValidator;
use stdClass;

/**
 * @coversDefaultClass GrizzIt\Validator\Component\Numeric\ExclusiveMinimumValidator
 */
class ExclusiveMinimumValidatorTest extends TestCase
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
        $subject = new ExclusiveMinimumValidator(2);
        $this->assertEquals($expected, $subject($data));
    }

    /**
     * @return array
     */
    public function dataProvider(): array
    {
        return [
            [
                1,
                false
            ],
            [
                2,
                false
            ],
            [
                2.5,
                true
            ],
            [
                4,
                true
            ],
            [
                new stdClass(),
                true
            ],
            [
                'foo',
                true
            ],
            [
                true,
                true
            ],
            [
                null,
                true
            ],
            [
                [],
                true
            ]
        ];
    }
}
