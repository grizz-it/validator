<?php

/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace GrizzIt\Validator\Component\Logical;

use GrizzIt\Validator\Common\ValidatorInterface;
use GrizzIt\Validator\Helper\DataPreparationHelper;

class ConstValidator implements ValidatorInterface
{
    /**
     * The value that needs to be checked.
     *
     * @var mixed
     */
    private mixed $value;

    /**
     * Constructor
     *
     * @param mixed $value
     */
    public function __construct(mixed $value)
    {
        $this->value = DataPreparationHelper::prepareComparisonData($value);
    }

    /**
     * Validate the data against the validator.
     *
     * @param mixed $data The data that needs to be validated.
     *
     * @return bool
     */
    public function __invoke(mixed $data): bool
    {
        return DataPreparationHelper::prepareComparisonData(
            $data
        ) === $this->value;
    }
}
