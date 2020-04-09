<?php
/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace GrizzIt\Validator\Component\Numeric;

use GrizzIt\Validator\Common\ValidatorInterface;

class MinimumValidator implements ValidatorInterface
{
    /**
     * The minimum the input can be.
     *
     * @var float
     */
    private $minimum;

    /**
     * Constructor
     *
     * @param float $minimum
     */
    public function __construct(float $minimum)
    {
        $this->minimum = $minimum;
    }

    /**
     * Validate the data against the validator.
     *
     * @param mixed $data The data that needs to be validated.
     *
     * @return bool
     */
    public function __invoke($data): bool
    {
        return !(is_int($data) || is_float($data)) || $data >= $this->minimum;
    }
}
