<?php

/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace GrizzIt\Validator\Component\Textual;

use GrizzIt\Validator\Common\ValidatorInterface;

class PatternValidator implements ValidatorInterface
{
    /**
     * The pattern which needs to validate the string.
     *
     * @var string
     */
    private string $pattern;

    /**
     * Constructor
     *
     * @param string $pattern
     */
    public function __construct(string $pattern)
    {
        $this->pattern = sprintf('/%s/', $pattern);
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
        return !(is_string($data)) || preg_match($this->pattern, $data) === 1;
    }
}
