<?php include 'conn.php'?>
<?php
// Hàm lấy thông tin thành viên từ cơ sở dữ liệu
// function getMembers() {
//     // Khai báo biến kết nối
//     global $conn;
//     // Câu truy vấn SQL để lấy thông tin thành viên từ bảng taikhoan
//     $sql = "SELECT * FROM taikhoan";
//     // Thực thi câu truy vấn và lấy kết quả
//     $result = mysqli_query($conn, $sql);
//     // Khởi tạo mảng để lưu thông tin thành viên
//     $members = [];
//     // Kiểm tra và lặp qua từng dòng kết quả
//     if (mysqli_num_rows($result) > 0) {
//         while ($row = mysqli_fetch_assoc($result)) {
//             // Thêm thông tin của mỗi thành viên vào mảng
//             $member = [
//                 'name' => $row['Ten'],
//                 'phone' => $row['Sodt'],
//                 'email' => $row['Email'],
//                 'created_at' => $row['Ngaytao'],
//                 'image' => $row['Avatar'],
//                 'id' => $row['IDTaikhoan']
//             ];
//             // Thêm thành viên vào mảng chứa thông tin các thành viên
//             array_push($members, $member);
//         }
//     }
//     // Trả về mảng chứa thông tin thành viên
//     return $members;
// }
function getMembers($search_query = '', $search_type = 'all') {
    global $conn;
    
    $sql = "SELECT * FROM taikhoan";
    $params = [];
    $types = '';

    if (!empty($search_query)) {
        switch  ($search_type) {
            case 'name':
            case 'all':  // Allow "all" to search by name
                $sql .= " WHERE Ten LIKE ?";
                $types .= 's';
                $params[] = "%" . $search_query . "%";
                break;
            case 'phone':
                $sql .= " WHERE Sodt LIKE ?";
                $types .= 's';
                $params[] = "%" . $search_query . "%";
                break;
            case 'email':
                $sql .= " WHERE Email LIKE ?";
                $types .= 's';
                $params[] = "%" . $search_query . "%";
                break;
            case 'created_at':
                $sql .= " WHERE Ngaytao LIKE ?";
                $types .= 's';
                $params[] = "%" . $search_query . "%";
                break;
        }
    }

    $stmt = $conn->prepare($sql);
    
    if (!empty($params)) {
        $stmt->bind_param($types, ...$params);
    }

    $stmt->execute();
    $result = $stmt->get_result();
    
    $members = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $member = [
                'name' => $row['Ten'],
                'phone' => $row['Sodt'],
                'email' => $row['Email'],
                'created_at' => $row['Ngaytao'],
                'image' => $row['Avatar'],
                'id' => $row['IDTaikhoan']
            ];
            array_push($members, $member);
        }
    }
    
    return $members;
}





//insert form
function insertMember($conn, $Giayto, $name, $gender, $birthday, $email, $phone, $address, $id) {
    // Giả sử kết nối cơ sở dữ liệu được lưu trữ trong $conn
// Câu lệnh SQL và các tham số
$sql = "UPDATE taikhoan SET loaigiayto=?, ten=?, gioitinh=?, ngaysinh=?, email=?, sodt=?, diachi=? WHERE IDTaikhoan=?";
if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param("sssssssi", $Giayto, $name, $gender, $birthday, $email, $phone, $address,$id);
    if ($stmt->execute()) {
        echo "Cập nhật thành công";
    } else {
        echo "Lỗi: " . $stmt->error;
    }
    $stmt->close();
} else {
    echo "Chuẩn bị thất bại: (" . $conn->errno . ") " . $conn->error;
}

// Đóng kết nối
// $conn->close();
}

?>
