<!DOCTYPE HTML>
<html>  
<head>
    <meta charset="UTF-8">
    <title>Nhập Thông Tin</title>
</head>
<body>

<?php
// Khởi tạo biến để lưu dữ liệu và thông báo lỗi
$name = $email = $password = $dob = "";
$nameErr = $emailErr = $passwordErr = $dobErr = "";

// Hàm làm sạch dữ liệu đầu vào
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Xử lý dữ liệu khi form được gửi
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Xử lý trường Name
    if (empty($_POST["name"])) {
        $nameErr = "Vui lòng nhập tên";
    } else {
        $name = test_input($_POST["name"]);
    }

    // Xử lý trường Email
    if (empty($_POST["email"])) {
        $emailErr = "Vui lòng nhập email";
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Định dạng email không hợp lệ";
        }
    }

    // Xử lý trường Password
    if (empty($_POST["password"])) {
        $passwordErr = "Vui lòng nhập mật khẩu";
    } else {
        $password = test_input($_POST["password"]);
    }

    // Xử lý trường Date of Birth
    if (empty($_POST["dob"])) {
        $dobErr = "Vui lòng nhập ngày sinh";
    } else {
        $dob = test_input($_POST["dob"]);
        // Kiểm tra định dạng ngày sinh (YYYY-MM-DD)
        if (!preg_match("/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/", $dob)) {
            $dobErr = "Định dạng ngày sinh phải là YYYY-MM-DD";
        }
    }
}
?>

<h2>Nhập Thông Tin</h2>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    Name: <input type="text" name="name" value="<?php echo $name;?>">
    <span style="color:red"><?php echo $nameErr;?></span><br><br>
    
    E-mail: <input type="text" name="email" value="<?php echo $email;?>">
    <span style="color:red"><?php echo $emailErr;?></span><br><br>
    
    Password: <input type="password" name="password">
    <span style="color:red"><?php echo $passwordErr;?></span><br><br>
    
    Date of Birth (YYYY-MM-DD): <input type="text" name="dob" value="<?php echo $dob;?>">
    <span style="color:red"><?php echo $dobErr;?></span><br><br>
    
    <input type="submit" value="Submit">
</form>

<?php
// Hiển thị dữ liệu nếu không có lỗi và form đã được gửi
if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($nameErr) && empty($emailErr) && empty($passwordErr) && empty($dobErr)) {
    echo "<h2>Thông Tin Đã Nhập:</h2>";
    echo "Tên: " . $name . "<br>";
    echo "Email: " . $email . "<br>";
    echo "Mật khẩu: " . $password . "<br>";
    echo "Ngày sinh: " . $dob . "<br>";
}
?>

</body>
</html>
