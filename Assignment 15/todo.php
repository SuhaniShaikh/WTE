<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "task_manager";

$conn = new mysqli($host, $username, $password);

if ($conn->connect_error) {
    die("Initial connection failed: " . $conn->connect_error);
}

if (!$conn->query("CREATE DATABASE IF NOT EXISTS $database")) {
    die("Error creating database: " . $conn->error);
}

$conn->select_db($database);

$conn->query("CREATE TABLE IF NOT EXISTS tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    task_name VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)");

// Handle CRUD operations
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add'])) {
        $task = $_POST['task_name'];
        $stmt = $conn->prepare("INSERT INTO tasks (task_name) VALUES (?)");
        $stmt->bind_param("s", $task);
        $stmt->execute();
    } 
    elseif (isset($_POST['update'])) {
        $id = $_POST['id'];
        $task = $_POST['task_name'];
        $stmt = $conn->prepare("UPDATE tasks SET task_name=? WHERE id=?");
        $stmt->bind_param("si", $task, $id);
        $stmt->execute();
    }
} 
elseif (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $stmt = $conn->prepare("DELETE FROM tasks WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Simple Task Manager</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto; padding: 20px; }
        .form-container { background: #f5f5f5; padding: 15px; margin-bottom: 20px; border-radius: 5px; }
        .task-list { list-style: none; padding: 0; }
        .task-item { background: #fff; padding: 10px; margin-bottom: 5px; border-radius: 3px; box-shadow: 0 1px 3px rgba(0,0,0,0.1); }
        .buttons { margin-top: 10px; }
        button { padding: 5px 10px; margin-right: 5px; cursor: pointer; }
        .hidden { display: none; }
    </style>
</head>
<body>
    <h1>Simple Task Manager</h1>
    
    <div class="buttons">
        <button onclick="showForm('addForm')">Add Task</button>
    </div>

    <!-- Add Task Form -->
    <div id="addForm" class="form-container hidden">
        <h3>Add New Task</h3>
        <form method="POST">
            <input type="text" name="task_name" placeholder="Enter task" required>
            <button type="submit" name="add">Save</button>
            <button type="button" onclick="hideForm('addForm')">Cancel</button>
        </form>
    </div>

    <!-- Update Task Form -->
    <div id="updateForm" class="form-container hidden">
        <h3>Update Task</h3>
        <form method="POST">
            <input type="hidden" name="id" id="updateId">
            <input type="text" name="task_name" id="updateTask" placeholder="Enter task" required>
            <button type="submit" name="update">Update</button>
            <button type="button" onclick="hideForm('updateForm')">Cancel</button>
        </form>
    </div>

    <!-- Task List -->
    <h2>Your Tasks</h2>
    <ul class="task-list">
        <?php
        $result = $conn->query("SELECT * FROM tasks ORDER BY created_at DESC");
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<li class='task-item'>
                    <span>{$row['task_name']}</span>
                    <div style='float:right;'>
                        <button onclick='showUpdateForm({$row['id']}, \"".htmlspecialchars($row['task_name'])."\")'>Edit</button>
                        <a href='?delete={$row['id']}' onclick='return confirm(\"Delete this task?\")'><button>Delete</button></a>
                    </div>
                </li>";
            }
        } else {
            echo "<li>No tasks found. Add one!</li>";
        }
        ?>
    </ul>

    <script>
        function showForm(formId) {
            document.querySelectorAll('.form-container').forEach(form => {
                form.classList.add('hidden');
            });
            document.getElementById(formId).classList.remove('hidden');
        }

        function hideForm(formId) {
            document.getElementById(formId).classList.add('hidden');
        }

        function showUpdateForm(id, taskName) {
            document.getElementById('updateId').value = id;
            document.getElementById('updateTask').value = taskName;
            showForm('updateForm');
        }
    </script>
</body>
</html>

<?php $conn->close(); ?>