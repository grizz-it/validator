<?php

/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace GrizzIt\Validator\Tests\Component\Chain;

use PHPUnit\Framework\TestCase;
use GrizzIt\Validator\Component\Chain\OneOfValidator;
use GrizzIt\Validator\Component\Type\StringValidator;
use GrizzIt\Validator\Component\Type\NumberValidator;
use stdClass;

/**
 * @coversDefaultClass GrizzIt\Validator\Component\Chain\OneOfValidator
 */
class OneOfValidatorTest extends TestCase
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
        $subject = new OneOfValidator(
            new StringValidator(),
            new NumberValidator()
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
                true
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
                true
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
