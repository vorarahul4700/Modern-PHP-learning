# Switch vs Match in PHP

This document explains the differences between the traditional `switch` statement and the newer `match` expression (introduced in PHP 8.0), as demonstrated in `Switch_vs_Match.php`.

## The `switch` Statement

The `switch` statement has been a core part of PHP for a long time. It is used to perform different actions based on different conditions.

```php
$status = "Processing";
switch ($status) {
    case "pending":
    case "processing":
        echo "Order is being processed";
        break;
    case "shipped":
        echo "Order has been shipped";
        break;
    // ...
    default:
        echo "Unknown order status";
}
```

**Key Characteristics:**
*   **Loose Comparison:** Uses loose comparison (`==`). For example, `0 == '0'` or `0 == 'string'` (before PHP 8.0).
*   **Fall-through:** If you omit the `break;` statement, the code will continue executing the next `case` block, even if the condition doesn't match. This can lead to unexpected bugs if forgotten.
*   **Action-oriented:** It doesn't return a value directly; you have to assign a value to a variable or use `echo`/`return` inside the blocks.

---

## The `match` Expression

The `match` expression, introduced in **PHP 8.0**, is a more modern, strict, and concise alternative to `switch`.

```php
$status = "Processing";
$value = match ($status) {
    'pending', 'Processing' => "Order Is Being Processed",
    'shipped' => 'Order Has Been Shipped',
    'delivered' => 'Order Has Been Delivered',
    'cancelled' => 'Order Has Been cancelled',
    default => 'Unknown Order Status'
};

echo $value;
```

**Key Advantages:**
*   **Strict Comparison:** Uses strict comparison (`===`). Types and values must match exactly, preventing subtle bugs (e.g., `0 === '0'` is false).
*   **No Fall-through:** It only evaluates the matching arm and immediately stops. You don't need `break` statements.
*   **Expression:** It evaluates to a value. This means you can assign its result directly to a variable (`$value = match(...)`), making the code much cleaner.
*   **Multiple Conditions:** You can easily group multiple conditions on a single line separated by commas (e.g., `'pending', 'Processing' => ...`).
*   **Exhaustiveness:** If no `default` arm is provided and no case matches, PHP will throw an `UnhandledMatchError`.

## Advanced Usage: `match(true)` with Expressions

A very powerful pattern is using `match (true)` to evaluate arbitrary expressions, similar to a chain of `if/elseif` statements. This is particularly useful with functions like `str_contains()` or complex logic.

```php
$logMessage = "Error: database connection failed in processing";

$result = match (true) {
    str_contains($logMessage, 'processing') => 'System is processing data',
    str_contains($logMessage, 'database')   => 'Database issue detected',
    str_contains($logMessage, 'timeout')    => 'Connection timed out',
    default                                 => 'Unknown log message'
};

echo $result; // Outputs: System is processing data (since it's the first match)
```

In this pattern, PHP evaluates each arm's expression until one returns `true`, making it a highly readable alternative to deep `if-else` chains.

## Summary

In modern PHP development, the `match` expression is highly recommended over `switch` whenever you need to map a single value to different outcomes, due to its strictness, conciseness, and safer behavior.
