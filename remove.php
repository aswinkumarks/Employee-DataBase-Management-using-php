<?php include('functions.php'); ?>
<?php
    //$emp_id =$_POST['emp_id'];
    $emp_id = 0;

    if ( !empty($_GET['id'])) {
        $emp_id = $_REQUEST['id'];
    }
    if ( !empty($_POST)) {
        // keep track post values
        $emp_id = $_POST['emp_id'];
        $conn=connect_to_db();
        // delete data
        $sql = "DELETE FROM my_db.employee WHERE emp_id='$emp_id'";
        if($conn->query($sql)===TRUE)
        {
            //array_push($errors, "Deleted");
        }
        else
        {
            array_push($errors, "Error");
        }
        $conn->close();
        header("Location: list.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="bootstrap/js/bootstrap.min.js"></script>
</head>

<body>
<div class="container">

    <div class="span10 offset1">
        <div class="row">
            <h3>Delete a Employee</h3>
        </div>

        <form class="form-horizontal" action="remove.php" method="post">
            <input type="hidden" name="emp_id" id="emp_id" value="<?php echo $_GET['id'];?>"/>
            <p class="alert alert-error">Are you sure to delete ?</p>
            <div class="form-actions">
                <button type="submit" class="btn btn-danger" name="remove">Yes</button>
                <a class="btn" href="list.php">No</a>
            </div>
        </form>
    </div>
</div> <!-- /container -->
<?php echo display_error(); ?>
</body>
</html>