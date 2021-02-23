<?php

/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace GrizzIt\Validator\Tests\Component\Type;

use PHPUnit\Framework\TestCase;
use GrizzIt\Validator\Component\Type\NullValidator;
use stdClass;

/**
 * @coversDefaultClass GrizzIt\Validator\Component\Type\NullValidator
 */
class NullValidatorTest extends TestCase
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
        $subject = new NullValidator();
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
                false
            ],
            [
                2.5,
                false
            ],
            [
                true,
                false
            ],
            [
                null,
                true
            ],
            [
                [],
                false
            ]
        ];
    }
}
