<?php 

include "./conn.php";

if(isset($_GET['idimg'])){
    $idimg = $_GET['idimg'];

    // Prepare the SQL statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM hinhphong WHERE IDHinh = ?");
    $stmt->bind_param("i", $idimg);

    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $r = $result->fetch_assoc();
            echo json_encode(['success' => true, 'data' => $r]);
        } else {
            echo json_encode(['success' => false, 'message' => 'No image found']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Query failed']);
    }

    $stmt->close();
} else {
    echo json_encode(['success' => false, 'message' => 'IDimg not provided']);
}

$conn->close();
?>