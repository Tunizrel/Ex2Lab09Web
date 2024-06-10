<?php 
include "db.php";

// Fetching all courses from the database
$sql = "SELECT * FROM course";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Courses</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Courses</h2>
        <a class="btn btn-info" href="create.php?>">Add Course</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Course Level ID</th>
                    <th>Name</th>
                    <th>Name VN</th>
                    <th>Credit Theory</th>
                    <th>Credit Lab</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody> 
                <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['course_level_id']; ?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['name_vn']; ?></td>
                                <td><?php echo $row['credit_theory']; ?></td>
                                <td><?php echo $row['credit_lab']; ?></td>
                                <td><?php echo $row['description']; ?></td>
                                <td>
                                    <a class="btn btn-info" href="update.php?id=<?php echo $row['id']; ?>">Edit</a>
                                    <a class="btn btn-danger" href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>
                                </td>
                            </tr>                       
                <?php
                        }
                    } else {
                        echo "<tr><td colspan='8'>No records found</td></tr>";
                    }
                ?>                
            </tbody>
        </table>
    </div> 
</body>
</html>