<?php
/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace GrizzIt\Validator\Tests\Component\Iterable;

use PHPUnit\Framework\TestCase;
use GrizzIt\Validator\Component\Iterable\ContainsValidator;
use GrizzIt\Validator\Component\Type\StringValidator;
use stdClass;

/**
 * @coversDefaultClass GrizzIt\Validator\Component\Iterable\ContainsValidator
 */
class ContainsValidatorTest extends TestCase
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
        $subject = new ContainsValidator(new StringValidator());
        $this->assertEquals($expected, $subject($data));
    }

    /**
     * @return array
     */
    public function dataProvider(): array
    {
        return [
            [
                ['foo'],
                true
            ],
            [
                [1],
                false
            ],
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
            ]
        ];
    }
}
