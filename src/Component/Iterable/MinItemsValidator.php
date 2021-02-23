<?php

/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace GrizzIt\Validator\Component\Iterable;

use GrizzIt\Validator\Common\ValidatorInterface;

class MinItemsValidator implements ValidatorInterface
{
    /**
     * The minimum size of the array.
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
        return !(is_array($data)) || count($data) >= $this->minimum;
    }
}
