<?php

/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace GrizzIt\Validator\Tests\Component\Object;

use PHPUnit\Framework\TestCase;
use GrizzIt\Validator\Common\ValidatorInterface;
use GrizzIt\Validator\Component\Object\PropertiesValidator;
use GrizzIt\Validator\Component\Type\StringValidator;
use GrizzIt\Validator\Component\Type\NumberValidator;
use GrizzIt\Validator\Component\Logical\AlwaysValidator;
use GrizzIt\Validator\Component\Textual\MaxLengthValidator;

/**
 * @coversDefaultClass GrizzIt\Validator\Component\Object\PropertiesValidator
 */
class PropertiesValidatorTest extends TestCase
{
    /**
     * @param ValidatorInterface|null $additionalValidator
     * @param mixed                   $data
     * @param bool                    $expected
     *
     * @return void
     *
     * @covers ::__invoke
     * @covers ::__construct
     *
     * @dataProvider dataProvider
     */
    public function testInvoke(
        ?ValidatorInterface $additionalValidator,
        $data,
        bool $expected
    ): void {
        $subject = new PropertiesValidator(
            ['bar' => new StringValidator()],
            ['ba(?!r).*' => new NumberValidator()],
            new MaxLengthValidator(3),
            $additionalValidator
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
                new AlwaysValidator(false),
                (object) [
                    'baz' => 'foo',
                    'foo' => 'baz',
                    'bar' => 'qux'
                ],
                false
            ],
            [
                new AlwaysValidator(false),
                (object) [
                    'bar' => 'qux',
                    'baz' => 1
                ],
                true
            ],
            [
                new AlwaysValidator(false),
                (object) [
                    'bar' => 'qux',
                    'bazz' => 1
                ],
                false
            ],
            [
                new AlwaysValidator(false),
                (object) [
                    'foo' => 'baz'
                ],
                false
            ],
            [
                new AlwaysValidator(false),
                (object) [
                    'bar' => 1
                ],
                false
            ],
            [
                new AlwaysValidator(false),
                (object) [
                    'bar' => 'baz'
                ],
                true
            ],
            [
                null,
                'foo',
                true
            ],
            [
                null,
                1,
                true
            ],
            [
                null,
                2.5,
                true
            ],
            [
                null,
                true,
                true
            ],
            [
                null,
                null,
                true
            ],
            [
                null,
                [],
                true
            ]
        ];
    }
}
