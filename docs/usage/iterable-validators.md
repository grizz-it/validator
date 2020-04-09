# GrizzIT Validator - Iterable validators

Iterable validators are validators that work with numeric arrays.

- [ContainsValidator](../../src/Component/Iterable/ContainsValidator.php)
  - Accepts a sub validator, if one of the items matches, it returns true.
- [ItemsValidator](../../src/Component/Iterable/ItemsValidator.php)
  - Validates items against a set or a single validator.
  - All non-validated items will be compared against the additional validator.
- [MaxItemsValidator](../../src/Component/Iterable/MaxItemsValidator.php)
  - Returns true if the amount of items doesn't exceed the set maximum.
- [MinItemsValidator](../../src/Component/Iterable/MinItemsValidator.php)
  - Returns true if the amount of items reaches a set minimum.
- [UniqueItemsValidator](../../src/Component/Iterable/UniqueItemsValidator.php)
  - Returns true if all items in the array are unique.

## Further reading

[Back to usage index](index.md)

[Chain validators](chain-validators.md)

[Logical validators](logical-validators.md)

[Numeric validators](numeric-validators.md)

[Object validators](object-validators.md)

[Textual validators](textual-validators.md)

[Type validators](type-validators.md)
