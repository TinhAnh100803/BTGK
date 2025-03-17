<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sinh viên</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2 class="text-center">Danh sách sinh viên</h2>
        <div class="d-flex justify-content-between mb-3">
            <a href="create.php" class="btn btn-primary">Thêm sinh viên</a>
        </div>
        <table class="table table-bordered table-hover">
            <thead class="table-dark text-center">
                <tr>
                    <th>Mã SV</th>
                    <th>Họ Tên</th>
                    <th>Giới Tính</th>
                    <th>Ngày Sinh</th>
                    <th>Hình</th>
                    <th>Mã Ngành</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'db.php';
                $result = $conn->query("SELECT * FROM SinhVien");
                while ($row = $result->fetch_assoc()) { ?>
                    <tr class="align-middle text-center">
                        <td><?= htmlspecialchars($row['MaSV']) ?></td>
                        <td><?= htmlspecialchars($row['HoTen']) ?></td>
                        <td><?= $row['GioiTinh'] == 'M' ? 'Nam' : 'Nữ' ?></td>
                        <td><?= date('d/m/Y', strtotime($row['NgaySinh'])) ?></td>
                        <td><img src='<?= htmlspecialchars($row['Hinh']) ?>' width='50' class="rounded"></td>
                        <td><?= htmlspecialchars($row['MaNganh']) ?></td>
                        <td>
                            <a href="detail.php?id=<?= $row['MaSV'] ?>" class="btn btn-info btn-sm">Xem</a>
                            <a href="edit.php?id=<?= $row['MaSV'] ?>" class="btn btn-warning btn-sm">Sửa</a>
                            <a href="delete.php?id=<?= $row['MaSV'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa?');">Xóa</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>