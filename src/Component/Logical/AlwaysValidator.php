<?php

/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace GrizzIt\Validator\Component\Logical;

use GrizzIt\Validator\Common\ValidatorInterface;

class AlwaysValidator implements ValidatorInterface
{
    /**
     * Whether the data passed to this validator should always return true or false.
     *
     * @var bool
     */
    private bool $alwaysBool;

    /**
     * Constructor
     *
     * @param bool $alwaysBool
     */
    public function __construct(bool $alwaysBool)
    {
        $this->alwaysBool = $alwaysBool;
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
        return $this->alwaysBool;
    }
}
