<?php
include "conn.php"
?>
<?php

function fetchUtilities($conn) {
    $sql = "SELECT * FROM tienich";
    return $conn->query($sql);
}

function addUtility($conn, $itemName) {
    $stmt = $conn->prepare("INSERT INTO tienich (Tienich) VALUES (?)");
    $stmt->bind_param("s", $itemName);
    $stmt->execute();
    $stmt->close();
}

function deleteUtility($conn, $id) {
    $stmt = $conn->prepare("DELETE FROM tienich WHERE IDTienich = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["itemName"])) {
        addUtility($conn, $_POST["itemName"]);
        header("Location: Utilities.php");
        exit;
    }

    if (isset($_POST["deleteItemId"])) {
        deleteUtility($conn, intval($_POST["deleteItemId"]));
        exit;
    }
}
?>