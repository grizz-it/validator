# GrizzIT Validator - Object validators

Object validators are validators that verify the contents of objects.

- [DependencyValidator](../../src/Component/Object/DependencyValidator.php)
  - Executes a configured validator if a configured key exists within the
  object.
- [MaxPropertiesValidator](../../src/Component/Object/MaxPropertiesValidator.php)
  - Returns true if the amount of keys in the object is lower than or equals
  to the configured value.
- [MinPropertiesValidator](../../src/Component/Object/MinPropertiesValidator.php)
  - Returns true if the amount of keys in the object is higher than or equals
  to the configured value.
- [PropertiesValidator](../../src/Component/Object/PropertiesValidator.php)
  - Allows the confguration of validators to the keys defined in the passed
  object.
- [RequiredValidator](../../src/Component/Object/RequiredValidator.php)
  - Returns true if a set of keys are defined in the object.

## Further reading

[Back to usage index](index.md)

[Chain validators](chain-validators.md)

[Iterable validators](iterable-validators.md)

[Logical validators](logical-validators.md)

[Numeric validators](numeric-validators.md)

[Textual validators](textual-validators.md)

[Type validators](type-validators.md)
