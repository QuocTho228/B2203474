<?php
// Định nghĩa hàm tính giai thừa
function tinhGiaiThua($n) {
    if ($n < 0) {
        return "Không thể tính giai thừa của số âm";
    }
    if ($n == 0) {
        return 1;
    }
    $result = 1;
    for ($i = 1; $i <= $n; $i++) {
        $result *= $i;
    }
    return $result;
}

// Nhập số từ bàn phím (CLI)
echo "Nhập số nguyên không âm: ";
$handle = fopen("php://stdin", "r");
$so = trim(fgets($handle));
fclose($handle);

// Kiểm tra đầu vào
if (!is_numeric($so) || $so < 0) {
    echo "Vui lòng nhập một số nguyên không âm.\n";
} else {
    $ketQua = tinhGiaiThua($so);
    echo "Giai thừa của $so là: $ketQua\n";
}

// Chạy thử với 10! nếu không nhập
if (empty($so)) {
    $so = 10;
    $ketQua = tinhGiaiThua($so);
    echo "Chạy thử với 10! Giai thừa của $so là: $ketQua\n";
}
?>