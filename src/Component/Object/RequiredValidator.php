<?php

/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace GrizzIt\Validator\Component\Object;

use GrizzIt\Validator\Common\ValidatorInterface;

class RequiredValidator implements ValidatorInterface
{
    /**
     * The required properties of an object.
     *
     * @var string[]
     */
    private array $required;

    /**
     * Constructor
     *
     * @param string[] $required
     */
    public function __construct(string ...$required)
    {
        $this->required = $required;
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
        if (!is_object($data)) {
            return true;
        }

        $keys = get_object_vars($data);

        foreach ($this->required as $required) {
            if (!array_key_exists($required, $keys)) {
                return false;
            }
        }

        return true;
    }
}
