# GrizzIT Validator - Create a validator

Validators are very simple object which determine whether a supplied value
matches the configured set of rules. All validators are made for a specific type
and check whether the supplied data matches the type first. If the type doesn't
match, it will always return true. The reason for this design decision is so it
first of all complies with the JSON schema standard. And secondly so
applications don't need to worry about what kind of data is being passed, when
a more strict check is required, then this check should be implemented as well.
This also keeps the validators responsible for a single comparison.

All validators must implement the
[ValidatorInterface](../../src/Common/ValidatorInterface.php). All configuration
for the logic in the check should be added to the constructor. The validator
should not keep track of any type of state that would interfere with future
checks (unless explicitely required). This keeps the validators simple and won't
cause unexpected inconsistencies.

Taking the MaxItemsValidator as an example, the class would look like this:
```php
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
    private $maximum;

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
    public function __invoke($data): bool
    {
        return !(is_array($data)) || count($data) <= $this->maximum;
    }
}
```

## Further reading

[Back to development index](index.md)
