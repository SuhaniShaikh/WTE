<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $rollno = $_POST['rollno'];
    $dept = $_POST['dept'];
    $showForm = false;
} else {
    $showForm = true;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Student Form</title>
    <style>
        .form-container { width: 300px; margin: 50px auto; }
        .info-container { width: 300px; margin: 50px auto; padding: 20px; border: 1px solid black }
    </style>
</head>
<body>
    <?php if ($showForm): ?>
    <div class="form-container">
        <h2>Student Information Form</h2>
        <form method="POST">
            Name: <input type="text" name="name" required><br><br>
            Roll No: <input type="text" name="rollno" required><br><br>
            Department: 
            <select name="dept" required>
                <option value="cs">cs</option>
                <option value="entc">entc</option>
                <option value="mech">mech</option>
                <option value="civil">civil</option>
            </select><br><br>
            <input type="submit" value="Submit">
        </form>
    </div>
    <?php else: ?>
    <div class="info-container">
        <h2>Student Information</h2>
        <p><strong>Name:</strong> <?php echo $name; ?></p>
        <p><strong>Roll No:</strong> <?php echo $rollno; ?></p>
        <p><strong>Department:</strong> <?php echo $dept; ?></p>
    </div>
    <?php endif; ?>
</body>
</html>