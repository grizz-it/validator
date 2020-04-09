# GrizzIT Validator - Logical validators

Logical validators are type independent logical validators.

- [AlwaysValidator](../../src/Component/Logical/AlwaysValidator.php)
  - Will always return the configured boolean value.
- [ConstValidator](../../src/Component/Logical/ConstValidator.php)
  - Determines if a value matches an exact value.
- [EnumValidator](../../src/Component/Logical/EnumValidator.php)
  - Determines whether the value occurs in the predefined set of values.
- [IfThenElseValidator](../../src/Component/Logical/IfThenElseValidator.php)
  - If the if validator matches, the then validator will be executed and
  returned. Otherwise the else validator will be executed.
- [NotValidator](../../src/Component/Logical/NotValidator.php)
  - Will invert the outcome of the sub validator.

## Further reading

[Back to usage index](index.md)

[Chain validators](chain-validators.md)

[Iterable validators](iterable-validators.md)

[Numeric validators](numeric-validators.md)

[Object validators](object-validators.md)

[Textual validators](textual-validators.md)

[Type validators](type-validators.md)
