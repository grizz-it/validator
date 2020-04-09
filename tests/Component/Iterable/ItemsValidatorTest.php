<?php
/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace GrizzIt\Validator\Tests\Component\Iterable;

use PHPUnit\Framework\TestCase;
use GrizzIt\Validator\Common\ValidatorInterface;
use GrizzIt\Validator\Component\Iterable\ItemsValidator;
use GrizzIt\Validator\Component\Type\StringValidator;
use GrizzIt\Validator\Component\Logical\AlwaysValidator;
use stdClass;

/**
 * @coversDefaultClass GrizzIt\Validator\Component\Iterable\ItemsValidator
 */
class ItemsValidatorTest extends TestCase
{
    /**
     * @param ValidatorInterface[]|ValidatorInterface $items
     * @param ValidatorInterface                      $additionalItems
     * @param mixed                                   $data
     * @param bool                                    $expected
     *
     * @return void
     *
     * @covers ::__invoke
     * @covers ::__construct
     *
     * @dataProvider dataProvider
     */
    public function testInvoke(
        $items,
        ValidatorInterface $additionalItems,
        $data,
        bool $expected
    ): void {
        $subject = new ItemsValidator(
            $items,
            $additionalItems
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
                new StringValidator(),
                new AlwaysValidator(true),
                ['foo', 1],
                false
            ],
            [
                [new StringValidator()],
                new AlwaysValidator(false),
                ['foo', 1],
                false
            ],
            [
                [new StringValidator()],
                new AlwaysValidator(false),
                ['foo'],
                true
            ],
            [
                [new StringValidator()],
                new AlwaysValidator(false),
                [1],
                false
            ],
            [
                [new StringValidator()],
                new AlwaysValidator(false),
                [],
                true
            ],
            [
                [new StringValidator()],
                new AlwaysValidator(false),
                1,
                true
            ],
            [
                [new StringValidator()],
                new AlwaysValidator(false),
                2.5,
                true
            ],
            [
                [new StringValidator()],
                new AlwaysValidator(false),
                new stdClass(),
                true
            ],
            [
                [new StringValidator()],
                new AlwaysValidator(false),
                'foo',
                true
            ],
            [
                [new StringValidator()],
                new AlwaysValidator(false),
                true,
                true
            ],
            [
                [new StringValidator()],
                new AlwaysValidator(false),
                null,
                true
            ]
        ];
    }
}
