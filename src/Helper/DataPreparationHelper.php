<?php

/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace GrizzIt\Validator\Helper;

use stdClass;

class DataPreparationHelper
{
    /**
     * A default empty object so strict comparison can be used.
     *
     * @var stdClass
     */
    private static ?stdClass $defaultEmptyObject = null;

    /**
     * Prepares nested objects for direct comparison.
     *
     * @param mixed $data
     *
     * @return mixed
     */
    public static function prepareComparisonData(mixed $data): mixed
    {
        if (self::$defaultEmptyObject === null) {
            self::$defaultEmptyObject = new stdClass();
        }

        if (is_array($data)) {
            foreach ($data as $key => $value) {
                $data[$key] = static::prepareComparisonData($value);
            }

            return $data;
        } elseif (is_object($data)) {
            $variables = get_object_vars($data);
            if (count($variables) === 0) {
                return self::$defaultEmptyObject;
            }

            $return = [];
            foreach ($variables as $key => $value) {
                $return[$key] = static::prepareComparisonData($value);
            }

            ksort($return);

            return $return;
        } elseif (is_int($data)) {
            return floatval($data);
        }

        return $data;
    }
}
