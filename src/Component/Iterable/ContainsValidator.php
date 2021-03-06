<?php

/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace GrizzIt\Validator\Component\Iterable;

use GrizzIt\Validator\Common\ValidatorInterface;

class ContainsValidator implements ValidatorInterface
{
    /**
     * Contains the validator which requires a match in the array.
     *
     * @var ValidatorInterface
     */
    private ValidatorInterface $validator;

    /**
     * Constructor
     *
     * @param ValidatorInterface $validator
     */
    public function __construct(ValidatorInterface $validator)
    {
        $this->validator = $validator;
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
        if (!is_array($data)) {
            return true;
        }

        foreach ($data as $value) {
            if (($this->validator)($value)) {
                return true;
            }
        }

        return false;
    }
}
