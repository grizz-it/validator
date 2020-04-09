# GrizzIT Validator - Chain validators

Chain validators are validators which verify the outcome of multiple nested
validators against data and contain their own logic.

- [AndValidator](../../src/Component/Chain/AndValidator.php)
  - All of the sub validators should match before it returns true.
- [OrValidator](../../src/Component/Chain/OrValidator.php)
  - One of the validators should match, it will return true immediatly.
- [OneOfValidator](../../src/Component/Chain/OneOfValidator.php)
  - Only one of the validators should match.

## Further reading

[Back to usage index](index.md)

[Iterable validators](iterable-validators.md)

[Logical validators](logical-validators.md)

[Numeric validators](numeric-validators.md)

[Object validators](object-validators.md)

[Textual validators](textual-validators.md)

[Type validators](type-validators.md)
