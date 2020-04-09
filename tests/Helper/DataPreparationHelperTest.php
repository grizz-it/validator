<?php
/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace GrizzIt\Validator\Tests\Helper;

use PHPUnit\Framework\TestCase;
use GrizzIt\Validator\Helper\DataPreparationHelper;
use stdClass;

/**
 * @coversDefaultClass GrizzIt\Validator\Helper\DataPreparationHelper
 */
class DataPreparationHelperTest extends TestCase
{
    /**
     * @param mixed $data
     * @param bool  $expected
     *
     * @return void
     *
     * @covers ::prepareComparisonData
     *
     * @dataProvider dataProvider
     */
    public function testPrepareComparisonData(string $data, $expected): void
    {
        $this->assertEquals(
            $expected,
            DataPreparationHelper::prepareComparisonData(json_decode($data))
        );
    }

    /**
     * @return array
     */
    public function dataProvider(): array
    {
        return [
            [
                '{"foo": ["bar", "baz", 1], "qux": {}}',
                [
                    'foo' => [
                        'bar',
                        'baz',
                        1
                    ],
                    'qux' => new stdClass()
                ]
            ]
        ];
    }
}
