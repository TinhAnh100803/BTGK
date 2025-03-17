<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết sinh viên</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <?php
    include 'db.php';
    
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $MaSV = $_GET['id'];
        
        // Sử dụng Prepared Statements để tránh SQL Injection
        $stmt = $conn->prepare("SELECT * FROM SinhVien WHERE MaSV = ?");
        $stmt->bind_param("i", $MaSV);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $stmt->close();
    }
    ?>

    <div class="card shadow-lg p-4">
        <h2 class="text-center text-primary">Chi tiết sinh viên</h2>
        <?php if (!empty($row)) { ?>
            <p><strong>Họ tên:</strong> <?= htmlspecialchars($row['HoTen']) ?></p>
            <p><strong>Giới tính:</strong> <?= $row['GioiTinh'] == 'M' ? 'Nam' : 'Nữ' ?></p>
            <p><strong>Ngày sinh:</strong> <?= date("d/m/Y", strtotime($row['NgaySinh'])) ?></p>
            <img src='<?= htmlspecialchars($row['Hinh']) ?>' class="img-fluid rounded" width='150'>
        <?php } else { ?>
            <p class="text-danger">Không tìm thấy sinh viên!</p>
        <?php } ?>
        <a href="index.php" class="btn btn-primary mt-3">⬅ Quay lại</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>