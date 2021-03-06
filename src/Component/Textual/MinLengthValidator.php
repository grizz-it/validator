<?php

/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace GrizzIt\Validator\Component\Textual;

use GrizzIt\Validator\Common\ValidatorInterface;

class MinLengthValidator implements ValidatorInterface
{
    /**
     * The minimum size of the string.
     *
     * @var float
     */
    private float $minimum;

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
    public function __invoke(mixed $data): bool
    {
        return !(is_string($data)) || mb_strlen($data) >= $this->minimum;
    }
}
