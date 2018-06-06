<?php include('functions.php') ?>
<!DOCTYPE >
<html>
<head>
    <title>Home</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" media="screen,projection" type="text/css" href="Style.css" />
</head>
<body>
<!-- START PAGE SOURCE -->
<div class="login-page">
    <div class="form">
        <h1>Employee Details</h1>
        <form class="register-form" method="post" action="employee.php" >
            <?php echo display_error(); ?>
            <input type="text" placeholder="Employee ID" name="emp_id" id="emp_id"/>
            <input type="text" placeholder="Name" name="name" id="name"/>
            <input type="text" placeholder="System No" name="sys_no" id="sys_no"/>
            <input type="text" placeholder="Ram Memory" name="mem" id="mem"/>
            <input type="text" placeholder="Monitor Company" name="monitor" id="monitor"/>
            <button type="submit" class="btn" name="enter_btn">submit</button>
            <p class="message"><a href="list.php">Home</a></p>
        </form>
    </div>
</div>
</body>
</html>
