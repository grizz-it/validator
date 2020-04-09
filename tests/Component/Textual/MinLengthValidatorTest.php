<?php
/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace GrizzIt\Validator\Tests\Component\Textual;

use PHPUnit\Framework\TestCase;
use GrizzIt\Validator\Component\Textual\MinLengthValidator;
use stdClass;

/**
 * @coversDefaultClass GrizzIt\Validator\Component\Textual\MinLengthValidator
 */
class MinLengthValidatorTest extends TestCase
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
        $subject = new MinLengthValidator(3);
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
                true
            ],
            [
                'foo',
                true
            ],
            [
                'fo',
                false
            ],
            [
                'fooo',
                true
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
