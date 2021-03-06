<?php

/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace GrizzIt\Validator\Component\Object;

use GrizzIt\Validator\Common\ValidatorInterface;

class DependencyValidator implements ValidatorInterface
{
    /**
     * The string which should be checked before executing the validation.
     *
     * @var string
     */
    private string $key;

    /**
     * The validator which must be run if the key exists.
     *
     * @var ValidatorInterface
     */
    private ValidatorInterface $validator;

    /**
     * Constructor
     *
     * @param string             $key
     * @param ValidatorInterface $validator
     */
    public function __construct(string $key, ValidatorInterface $validator)
    {
        $this->key = $key;
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
        return !(is_object($data))
            || (property_exists($data, $this->key) ? ($this->validator)(
                $data
            ) : true);
    }
}
