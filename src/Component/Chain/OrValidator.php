<?php

/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace GrizzIt\Validator\Component\Chain;

use GrizzIt\Validator\Common\ValidatorInterface;

class OrValidator implements ValidatorInterface
{
    /**
     * The validators that need to be chain checked.
     *
     * @var ValidatorInterface[]
     */
    private array $validators;

    /**
     * Constructor
     *
     * @param ValidatorInterface[] $validators
     */
    public function __construct(ValidatorInterface ...$validators)
    {
        $this->validators = $validators;
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
        foreach ($this->validators as $validator) {
            if ($validator($data)) {
                return true;
            }
        }

        return false;
    }
}
