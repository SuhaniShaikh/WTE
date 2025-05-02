<?php
// Define allowed file types
$allowedTypes = array(
    'image' => array('jpg', 'jpeg', 'png', 'gif'),
    'document' => array('pdf', 'doc', 'docx', 'txt'),
);

$message = '';
$messageType = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['file'])) {
    $file = $_FILES['file'];
    
    // Check if file was uploaded without errors
    if ($file['error'] == UPLOAD_ERR_OK) {
        $fileExt = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        $fileType = $_POST['file_type'];
        
        // Validate file extension
        if (isset($allowedTypes[$fileType])) {
            if (in_array($fileExt, $allowedTypes[$fileType])) {
                $message = "File uploaded successfully! (Not saved)";
                $messageType = 'success';
            } else {
                $message = "Error: .$fileExt files not allowed for $fileType. Allowed: " . 
                          implode(', ', $allowedTypes[$fileType]);
                $messageType = 'error';
            }
        } else {
            $message = "Error: Invalid file type selected";
            $messageType = 'error';
        }
    } else {
        $message = "Error uploading file: " . $file['error'];
        $messageType = 'error';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple File Upload</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        select, input[type="file"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        button {
            background: #4CAF50;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background: #45a049;
        }
        .message {
            padding: 10px;
            margin: 15px 0;
            border-radius: 4px;
        }
        .success {
            background: #dff0d8;
            color: #3c763d;
            border: 1px solid #d6e9c6;
        }
        .error {
            background: #f2dede;
            color: #a94442;
            border: 1px solid #ebccd1;
        }
    </style>
</head>
<body>
    <h1>File Upload Validation</h1>
    
    <?php if (!empty($message)): ?>
        <div class="message <?php echo $messageType; ?>">
            <?php echo $message; ?>
        </div>
    <?php endif; ?>
    
    <form method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="file_type">File Type:</label>
            <select id="file_type" name="file_type" required>
                <option value="">-- Select file type --</option>
                <option value="image">Image (JPG, PNG, GIF)</option>
                <option value="document">Document (PDF, DOC, TXT)</option>
                <option value="archive">Archive (ZIP, RAR)</option>
            </select>
        </div>
        
        <div class="form-group">
            <label for="file">Select File:</label>
            <input type="file" id="file" name="file" required>
        </div>
        
        <button type="submit">Validate File</button>
    </form>
</body>
</html>