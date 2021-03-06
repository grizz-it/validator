<?php

/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace GrizzIt\Validator\Component\Numeric;

use GrizzIt\Validator\Common\ValidatorInterface;

class ExclusiveMaximumValidator implements ValidatorInterface
{
    /**
     * The maximum the input must be under.
     *
     * @var float
     */
    private float $maximum;

    /**
     * Constructor
     *
     * @param float $maximum
     */
    public function __construct(float $maximum)
    {
        $this->maximum = $maximum;
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
        return !(is_int($data) || is_float($data)) || $data < $this->maximum;
    }
}
