<?php
// Không cần declare(strict_types=1) để cho phép ép kiểu tự động
function addNumbers($a, $b) {
    // Ép kiểu các tham số thành số nguyên
    $a = (int)$a;
    $b = (int)$b;
    return $a + $b;
}

// Test cases
echo addNumbers(5, 10) . "\n"; // Output: 15
echo addNumbers(5, "10") . "\n"; // Output: 15
echo addNumbers(5, "so 10") . "\n"; // Output: 5 (chuỗi "so 10" ép thành 0)
?>
