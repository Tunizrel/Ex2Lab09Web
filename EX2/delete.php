<?php 

include "db.php"; 

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM `course` WHERE `id` = ?";

    $stmt = $conn->prepare($sql);
    
    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }


    $stmt->bind_param("s", $id);


    if ($stmt->execute()) {
        echo "Record deleted successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }


    $stmt->close();

} else {
    echo "No ID parameter provided.";
}

$conn->close(); 

?>
