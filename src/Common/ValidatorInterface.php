<?php
/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace GrizzIt\Validator\Common;

interface ValidatorInterface
{
    /**
     * Validate the data against the validator.
     *
     * @param string|object|array $data
     *
     * @return bool
     */
    public function __invoke($data): bool;
}
