<?php

/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace GrizzIt\Validator\Tests\Component\Numeric;

use PHPUnit\Framework\TestCase;
use GrizzIt\Validator\Component\Numeric\MultipleOfValidator;
use stdClass;

/**
 * @coversDefaultClass GrizzIt\Validator\Component\Numeric\MultipleOfValidator
 */
class MultipleOfValidatorTest extends TestCase
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
        $subject = new MultipleOfValidator(2);
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
                2.5,
                false
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
