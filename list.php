<?php include('functions.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="bootstrap/js/bootstrap.min.js"></script>
</head>

<body>
<div class="container">
    <div class="row">
        <h3>Employee Details</h3>
    </div>
    <div class="row">
        <p>
            <a href="employee.php" class="btn btn-success">Enter Data</a>
        </p>
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>Employee ID</th>
                <th>Name</th>
                <th>System No</th>
                <th>Ram Memory</th>
                <th>Monitor Company</th>
                <th>Remove emp</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $conn=connect_to_db();
            $sql = 'SELECT * FROM My_db.employee ORDER BY emp_id ASC';
            foreach ($conn->query($sql) as $row) {
                echo '<tr>';
                echo '<td>'. $row['emp_id'] . '</td>';
                echo '<td>'. $row['name'] . '</td>';
                echo '<td>'. $row['sys_no'] . '</td>';
                echo '<td>'. $row['ram_mem'] . '</td>';
                echo '<td>'. $row['monitor_company'] . '</td>';
                echo '<td>'. '<a class="btn btn-danger" href="remove.php?id='.$row["emp_id"].'">Remove</a>'. '</td>';

                echo '</tr>';
            }
            $conn->close();
            ?>
            </tbody>
        </table>
    </div>
</div> <!-- /container -->
</body>
</html>