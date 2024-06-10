<?php 

include "db.php";

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $course_level_id = $_POST['course_level_id'];
    $name = $_POST['name'];
    $name_vn = $_POST['name_vn'];
    $credit_theory = $_POST['credit_theory'];
    $credit_lab = $_POST['credit_lab'];
    $description = $_POST['description'];

    $sql = "UPDATE `course` SET `course_level_id`='$course_level_id', `name`='$name', `name_vn`='$name_vn', `credit_theory`='$credit_theory', `credit_lab`='$credit_lab', `description`='$description' WHERE `id`='$id'"; 

    $result = $conn->query($sql); 

    if ($result == TRUE) {
        echo "Record updated successfully.";
    } else {
        echo "Error:" . $sql . "<br>" . $conn->error;
    }
}

if (isset($_GET['id'])) {
    $id = $_GET['id']; 

    $sql = "SELECT * FROM `course` WHERE `id`='$id'";
    $result = $conn->query($sql); 

    if ($result->num_rows > 0) {        
        while ($row = $result->fetch_assoc()) {
            $course_level_id = $row['course_level_id'];
            $name = $row['name'];
            $name_vn = $row['name_vn'];
            $credit_theory = $row['credit_theory'];
            $credit_lab = $row['credit_lab'];
            $description = $row['description'];
        } 
    ?>

        <h2>Course Update Form</h2>

        <form action="" method="post">
          <fieldset>
            <legend>Course Information:</legend>

            ID:<br>
            <input type="text" name="id" value="<?php echo $id; ?>">
            <br>

            Course level ID:<br>
            <input type="number" name="course_level_id" value="<?php echo $course_level_id; ?>">
            <br>

            Name:<br>
            <input type="text" name="name" value="<?php echo $name; ?>">
            <br>

            Name VN:<br>
            <input type="text" name="name_vn" value="<?php echo $name_vn; ?>">
            <br>

            Credit theory:<br>
            <input type="number" name="credit_theory" value="<?php echo $credit_theory; ?>">
            <br>

            Credit lab:<br>
            <input type="number" name="credit_lab" value="<?php echo $credit_lab; ?>">
            <br>

            Description:<br>
            <input type="text" name="description" value="<?php echo $description; ?>">
            <br><br>

            <input type="submit" value="Update" name="update">
          </fieldset>
        </form> 

    <?php
    } else { 
        header('Location: view.php');
    } 
}
?>
