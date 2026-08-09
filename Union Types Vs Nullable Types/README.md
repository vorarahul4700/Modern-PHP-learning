# Union Types vs Nullable Types in PHP

This document explains the concepts of Union Types and Nullable Types, as demonstrated in `Types.php`.

## Union Types

Introduced in PHP 8.0, **Union Types** allow a variable to accept multiple different types, rather than just one. This is denoted by the pipe `|` character.

```php
class Product {
    // This property can store either an integer OR a float
    private int|float $price;

    // The parameter must be an integer OR a float
    public function setPrice(int|float $price) {
        $this->price = $price;
    }
}
```

**Key Advantages:**
*   Provides more flexibility compared to strict single typing.
*   More accurate than removing the type hint entirely (which would allow *any* type).
*   Great for values that naturally come in multiple formats, like a price being either `10` (int) or `10.50` (float).

---

## Nullable Types

Introduced in PHP 7.1, **Nullable Types** allow a variable to accept its designated type *or* `null`. This is a specific kind of union type, indicated by prefixing the type with a question mark `?` (e.g., `?int`, which is equivalent to `int|null` in PHP 8.0+).

```php
class NullableProduct {
    // In PHP 8.0+, you can also explicitly write int|float|null
    private int|float|null $price;

    // The parameter can be an integer OR null
    // The return type must be an integer OR null
    public function setPrice(?int $price): ?int {
        // Handling the potential null value
        $price = is_null($price) ? 500 : $price;
        $this->price = $price;
        return $price;
    }
}
```

**Key Differences & Usage:**
*   **Syntax:** Nullable types use `?Type` (shorthand for `Type|null`).
*   **Purpose:** Nullable types are specifically used when a value might be intentionally absent or unassigned (`null`).
*   **Handling Null:** When using a nullable type, you typically need to write logic to handle the scenario where the value is actually `null` (as seen in the `setPrice` method using the ternary operator).
