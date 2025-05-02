<!-- to store and retrival of data  -->
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['display_data'])) {
        $showData = true;
    } else {
        $name = $_POST['name'];
        $rollno = $_POST['rollno'];
        $dept = $_POST['dept'];

        $studentData = "Name: $name, Roll No: $rollno, Department: $dept" . PHP_EOL;
        $file = 'student_data.txt';
        $handle = fopen($file, 'a');
        fwrite($handle, $studentData);
        fclose($handle);

        $successMessage = "Student information saved successfully!";
        $showForm = false;
    }
}

// Retrieve all student data
function getStudentData() {
    $file = 'student_data.txt';
    if (file_exists($file)) {
        return file_get_contents($file);
    }
    return "No student data available yet.";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Form</title>
    <style>
        .form-container { width: 300px; margin: 50px auto; }
        .success { color: green; margin: 20px 0; }
        .student-data { 
            margin-top: 20px;
            width: 350px;
            padding: 20px;
            border: 1px solid #ddd;
            background-color: #f9f9f9;
            white-space: pre-line;
        }
        .btn-container { margin-top: 20px; }
        button { padding: 8px 15px; cursor: pointer; }
    </style>
</head>
<body>
    <div class="form-container">
        <?php if (isset($successMessage)): ?>
            <div class="success"><?php echo $successMessage; ?></div>
        <?php endif; ?>

        <h2>Student Information Form</h2>
        <form method="POST">
            Name: <input type="text" name="name" required><br><br>
            Roll No: <input type="text" name="rollno" required><br><br>
            Department: 
            <select name="dept" required>
                <option value="cs">CS</option>
                <option value="entc">ENTC</option>
                <option value="mech">MECH</option>
                <option value="civil">CIVIL</option>
            </select><br><br>
            <button type="submit" name="submit">Submit</button>
        </form>

        <div class="btn-container">
            <form method="POST">
                <button type="submit" name="display_data">Display All Students</button>
            </form>
        </div>

        <?php if (isset($_POST['display_data'])): ?>
            <div class="student-data">
                <h3>Student Records:</h3>
                <?php echo getStudentData(); ?>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>