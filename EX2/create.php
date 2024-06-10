<?php
include "db.php";

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $course_level_id = $_POST['course_level_id'];
    $name = $_POST['name'];
    $name_vn = $_POST['name_vn'];
    $credit_theory = $_POST['credit_theory'];
    $credit_lab = $_POST['credit_lab'];
    $description = $_POST['description'];

    $sql = "INSERT INTO course (id, course_level_id, name, name_vn, credit_theory, credit_lab, description) VALUES (?, ?, ?, ?, ?, ?, ?)";
    
    // Prepare the statement
    $stmt = $conn->prepare($sql);
    
    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }

    // Bind parameters
    $stmt->bind_param("sissiis", $id, $course_level_id, $name, $name_vn, $credit_theory, $credit_lab, $description);
    
    // Execute the statement
    if ($stmt->execute()) {
        echo "New record created successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close(); 
}
?>

<!DOCTYPE html>
<html>
<body>
<h2>Add Course Form</h2>
<form action="" method="POST">
  <fieldset>
    <legend>Course</legend>
    ID:<br>
    <input type="text" name="id" required>
    <br>
    Course level ID:<br>
    <input type="number" name="course_level_id" required>
    <br>
    Name:<br>
    <input type="text" name="name" required>
    <br>
    Name VN:<br>
    <input type="text" name="name_vn" required>
    <br>
    Credit theory:<br>
    <input type="number" name="credit_theory" required>
    <br>
    Credit lab:<br>
    <input type="number" name="credit_lab" required>
    <br>
    Description:<br>
    <input type="text" name="description">
    <br><br>
    <input type="submit" name="submit" value="submit">
  </fieldset>
</form>
</body>
</html>
