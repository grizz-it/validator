<?php

/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace GrizzIt\Validator\Component\Iterable;

use GrizzIt\Validator\Common\ValidatorInterface;

class MaxItemsValidator implements ValidatorInterface
{
    /**
     * The maximum size of the array.
     *
     * @var int
     */
    private int $maximum;

    /**
     * Constructor
     *
     * @param int $maximum
     */
    public function __construct(int $maximum)
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
        return !(is_array($data)) || count($data) <= $this->maximum;
    }
}
