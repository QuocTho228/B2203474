<?php
// Định nghĩa hàm cộng hai mảng
function congMang($mang1, $mang2) {
    // Kiểm tra độ dài của hai mảng
    if (count($mang1) !== count($mang2)) {
        return "Lỗi: Hai mảng không có cùng độ dài.";
    }
    
    // Tạo mảng kết quả
    $ketQua = [];
    for ($i = 0; $i < count($mang1); $i++) {
        $ketQua[] = $mang1[$i] + $mang2[$i];
    }
    
    return $ketQua;
}

// Khai báo hai mảng để chạy thử
$a = [344, 224, 223, 7737, 9922, -828];
$b = [-344, -324, 123, 773, -9922, 828];

// Gọi hàm và hiển thị kết quả
$ketQua = congMang($a, $b);

// Kiểm tra nếu kết quả là mảng thì hiển thị, ngược lại in lỗi
if (is_array($ketQua)) {
    echo "Kết quả cộng hai mảng: [" . implode(", ", $ketQua) . "]";
} else {
    echo $ketQua;
}
?>