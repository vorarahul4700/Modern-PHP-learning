# Typed Properties in PHP

This document explains the evolution of property typing in PHP, based on the examples in `properties.php`.

## The "Old" Way: Implicit Typing (Magento Style)

Historically (prior to PHP 7.4), PHP class properties did not have explicit type declarations. Developers had to rely on PHPDoc comments and internal logic to ensure the correct data types were used.

```php
class Product {
    private $name;
    private $price;
    private $qty;

    public function __construct($name, $price, $qty) {
        $this->name = $name;
        $this->price = $price;
        $this->qty = $qty;
    }
    // ... getters ...
}
```

**Drawbacks:**
*   **No type safety at assignment:** You could pass a string to `$price` or a float to `$qty` without PHP raising an error at the time of property assignment.
*   **Debugging:** Type-related errors might only surface later in the application flow when the variable is actually used.

---

## The Modern PHP Way: Enforced Typed Properties

Starting from **PHP 7.4**, PHP introduced Typed Properties. This allows you to explicitly declare the expected data type for a class property.

```php
class EnforcedProduct {
    private string $name;
    private float $price;
    private int $qty;

    public function __construct($name, $price, $qty) {
        $this->name = $name;
        $this->price = $price;
        $this->qty = $qty;
    }
    // ... getters ...
}
```

**Benefits:**
*   **Type Safety:** PHP enforces the type at the moment a value is assigned to the property. If you try to assign a string to the `int $qty` property, PHP will throw a `TypeError`.
*   **Cleaner Code:** Reduces the need for manual type-checking boilerplate code (e.g., `is_int()`, `is_string()`) within setters or constructors.
*   **Self-Documenting:** The code is easier to read and understand because the expected types are explicitly stated in the class definition.
