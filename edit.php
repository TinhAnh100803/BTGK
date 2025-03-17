<?php
include 'db.php';

$MaSV = $_GET['id'] ?? null;

if (!$MaSV) {
    die("Không tìm thấy sinh viên!");
}

// Lấy thông tin sinh viên
$stmt = $conn->prepare("SELECT * FROM SinhVien WHERE MaSV = ?");
$stmt->bind_param("s", $MaSV);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if (!$row) {
    die("Không tìm thấy sinh viên!");
}

// Xử lý cập nhật thông tin
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $HoTen = $_POST['HoTen'];
    $GioiTinh = $_POST['GioiTinh'];
    $NgaySinh = $_POST['NgaySinh'];
    $Hinh = $_POST['Hinh'];

    $updateStmt = $conn->prepare("UPDATE SinhVien SET HoTen=?, GioiTinh=?, NgaySinh=?, Hinh=? WHERE MaSV=?");
    $updateStmt->bind_param("sssss", $HoTen, $GioiTinh, $NgaySinh, $Hinh, $MaSV);

    if ($updateStmt->execute()) {
        header("Location: index.php");
        exit();
    } else {
        echo "Lỗi cập nhật!";
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa sinh viên</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-4">
    <h2 class="mb-4">Sửa thông tin sinh viên</h2>
    <form method="POST" class="border p-4 shadow rounded">
        <div class="mb-3">
            <label class="form-label">Họ Tên:</label>
            <input type="text" name="HoTen" class="form-control" value="<?= htmlspecialchars($row['HoTen']) ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Giới Tính:</label>
            <select name="GioiTinh" class="form-select" required>
                <option value="Nam" <?= $row['GioiTinh'] == "Nam" ? "selected" : "" ?>>Nam</option>
                <option value="Nữ" <?= $row['GioiTinh'] == "Nữ" ? "selected" : "" ?>>Nữ</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Ngày Sinh:</label>
            <input type="date" name="NgaySinh" class="form-control" value="<?= $row['NgaySinh'] ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Hình:</label>
            <input type="text" name="Hinh" class="form-control" value="<?= $row['Hinh'] ?>">
            <br>
            <img src="<?= $row['Hinh'] ?>" alt="Hình ảnh sinh viên" width="100" class="border">
        </div>

        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <a href="index.php" class="btn btn-secondary">⬅ Quay lại</a>
    </form>
</body>
</html>
