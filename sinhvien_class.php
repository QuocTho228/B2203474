<?php
class SinhVien {
    // Thuộc tính
    private $mssv; // Mã số sinh viên (chuỗi)
    private $hoten; // Họ tên (chuỗi)
    private $ngaysinh; // Ngày sinh (chuỗi định dạng Y-m-d)

    // Phương thức xây dựng (constructor)
    public function __construct($mssv = "", $hoten = "", $ngaysinh = "") {
        $this->mssv = $mssv;
        $this->hoten = $hoten;
        $this->ngaysinh = $ngaysinh;
    }

    // Phương thức hủy (destructor)
    public function __destruct() {
        // Không cần thực hiện gì đặc biệt, có thể để trống
        // echo "Đối tượng SinhVien {$this->hoten} đã bị hủy.<br>";
    }

    // Phương thức gán giá trị
    public function setMssv($mssv) {
        $this->mssv = $mssv;
    }

    public function setHoten($hoten) {
        $this->hoten = $hoten;
    }

    public function setNgaysinh($ngaysinh) {
        // Kiểm tra định dạng ngày sinh Y-m-d
        if (preg_match("/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/", $ngaysinh)) {
            $this->ngaysinh = $ngaysinh;
        } else {
            throw new Exception("Ngày sinh phải có định dạng Y-m-d (VD: 2000-01-01)");
        }
    }

    // Phương thức trả về giá trị
    public function getMssv() {
        return $this->mssv;
    }

    public function getHoten() {
        return $this->hoten;
    }

    public function getNgaysinh() {
        return $this->ngaysinh;
    }

    // Phương thức tính tuổi
    public function tinhTuoi() {
        if (empty($this->ngaysinh)) {
            return "Ngày sinh chưa được thiết lập";
        }

        try {
            $ngaySinh = new DateTime($this->ngaysinh);
            $ngayHienTai = new DateTime(); // Ngày hiện tại: 04/06/2025
            $khoangCach = $ngaySinh->diff($ngayHienTai);
            return $khoangCach->y; // Trả về số năm (tuổi)
        } catch (Exception $e) {
            return "Lỗi khi tính tuổi: " . $e->getMessage();
        }
    }
}

// Khai báo đối tượng sinh viên và gán giá trị
$sv = new SinhVien();

// Gán thông tin (giả lập thông tin cá nhân)
try {
    $sv->setMssv("b2203474");
    $sv->setHoten("Vo Quoc Tho");
    $sv->setNgaysinh("2004-08-22");
} catch (Exception $e) {
    echo "Lỗi: " . $e->getMessage() . "<br>";
}

// Hiển thị thông tin sinh viên
echo "Thông tin sinh viên:<br>";
echo "MSSV: " . $sv->getMssv() . "<br>";
echo "Họ tên: " . $sv->getHoten() . "<br>";
echo "Ngày sinh: " . $sv->getNgaysinh() . "<br>";
echo "Tuổi: " . $sv->tinhTuoi() . "<br>";
?>