<?php

/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace GrizzIt\Validator\Tests\Component\Object;

use PHPUnit\Framework\TestCase;
use GrizzIt\Validator\Component\Object\DependencyValidator;
use GrizzIt\Validator\Component\Object\RequiredValidator;

/**
 * @coversDefaultClass GrizzIt\Validator\Component\Object\DependencyValidator
 */
class DependencyValidatorTest extends TestCase
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
        $subject = new DependencyValidator('foo', new RequiredValidator('bar'));
        $this->assertEquals($expected, $subject($data));
    }

    /**
     * @return array
     */
    public function dataProvider(): array
    {
        return [
            [
                (object) [
                    'foo' => 'baz',
                    'bar' => 'qux',
                    'baz' => 'foo'
                ],
                true
            ],
            [
                (object) [
                    'foo' => 'baz'
                ],
                false
            ],
            [
                (object) [
                    'foo' => 1
                ],
                false
            ],
            [
                (object) [
                    'bar' => 'baz'
                ],
                true
            ],
            [
                'foo',
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
