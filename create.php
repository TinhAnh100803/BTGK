<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sinh viên</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="card shadow-lg p-4">
            <h2 class="text-center text-primary">Thêm sinh viên</h2>
            <form method="POST">
                <div class="mb-3">
                    <label class="form-label">Mã SV:</label>
                    <input type="text" name="MaSV" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Họ Tên:</label>
                    <input type="text" name="HoTen" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Giới Tính:</label>
                    <select name="GioiTinh" class="form-select" required>
                        <option value="Nam">Nam</option>
                        <option value="Nữ">Nữ</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Ngày Sinh:</label>
                    <input type="date" name="NgaySinh" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Hình:</label>
                    <input type="text" name="Hinh" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Mã Ngành:</label>
                    <input type="text" name="MaNganh" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Thêm</button>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>