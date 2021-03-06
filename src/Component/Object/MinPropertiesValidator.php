<?php

/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace GrizzIt\Validator\Component\Object;

use GrizzIt\Validator\Common\ValidatorInterface;

class MinPropertiesValidator implements ValidatorInterface
{
    /**
     * The minimum amount of properties an object must have.
     *
     * @var int
     */
    private int $minimum;

    /**
     * Constructor
     *
     * @param int $minimum
     */
    public function __construct(int $minimum)
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
        return !(is_object($data))
            || count(get_object_vars($data)) >= $this->minimum;
    }
}
