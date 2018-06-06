<?php
session_start();
$success=FALSE;
function connect_to_db()
{
    // Connect to the database
    global $success,$conn;
    $user = 'root';
    $password = 'root';
    $db = 'My_db';
    $host = 'localhost';
    $port = 3306;
    $conn = mysqli_init();
    $success = mysqli_real_connect(
        $conn,
        $host,
        $user,
        $password,
        $db,
        $port
    );
    return $conn;
}
$errors   = array();
if (isset($_POST['enter_btn'])) {
    enter_data();
}
/*if (isset($_POST['remove'])) {
    remove_emp();
}*/
function display_error()
{
    global $errors;

    if (count($errors) > 0){
        echo '<div class="error">';
        foreach ($errors as $error){
            echo $error .'<br>';
        }
        echo '</div>';
    }
}
/*function remove_emp()
{
    $emp_id = 0;
    if (!empty($_GET['emp_id'])) {
        $emp_id = $_REQUEST['emp_id'];
    }
    if (!empty($_POST)) {
        // keep track post values
        $emp_id = $_POST['emp_id'];
        $conn=connect_to_db();
        $query="DELETE FROM my_db.employee WHERE emp_id='$emp_id'";
        $conn->query($query);
        header("Location: list.php");
    }
}*/
function enter_data()
{
    global $errors,$success,$conn;
    // receive all input values from the form
    $emp_id=$_POST['emp_id'];
    $name = $_POST['name'];
    $sys_no=$_POST['sys_no'];
    $mem=$_POST['mem'];
    $monitor=$_POST['monitor'];
    // form validation: ensure that the form is correctly filled
    if (empty($name)) {
        array_push($errors, "Name is required");
    }
    if (empty($emp_id)) {
        array_push($errors, "Enter  Employee ID");
    }
    if (empty($sys_no)) {
        array_push($errors, "Enter system no");
    }
    if (empty($mem)) {
        array_push($errors, "Enter system memory");
    }
    if (empty($monitor)) {
        array_push($errors, "Enter Monitor Company");
    }
    if (count($errors) == 0)
    {
        connect_to_db();
        if(!$success)
        {
            array_push($errors, "Connection Error");
        }
        $query="INSERT INTO my_db.employee VALUES ('$emp_id','$name','$sys_no','$mem','$monitor')";
        //$result=mysqli_query($link,$query);
        //$user = mysqli_fetch_assoc($result);
        if($conn->query($query)===TRUE)
        {
            array_push($errors, "Inserted Data");
        }
        else
        {
            array_push($errors, "Failed");
        }
        $conn->close();
    }
}