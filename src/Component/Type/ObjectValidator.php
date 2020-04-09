<?php
/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace GrizzIt\Validator\Component\Type;

use GrizzIt\Validator\Common\ValidatorInterface;

class ObjectValidator implements ValidatorInterface
{
    /**
     * Validate the data against the validator.
     *
     * @param mixed $data The data that needs to be validated.
     *
     * @return bool
     */
    public function __invoke($data): bool
    {
        return is_object($data);
    }
}
