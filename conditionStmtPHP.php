<?php
echo '<style>
    body {
        font-family: Arial, sans-serif;
        line-height: 1.6;
        max-width: 600px;
        margin: 0 auto;
        padding: 20px;
        background-color: #f9f9f9;
    }
    .calculator {
        background-color: white;
        padding: 25px;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }
    h2 {
        color: #2c3e50;
        text-align: center;
        margin-bottom: 25px;
    }
    .form-group {
        margin-bottom: 15px;
    }
    label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
        color: #34495e;
    }
    select, input[type="number"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 4px;
        font-size: 16px;
    }
    button {
        background-color: #3498db;
        color: white;
        border: none;
        padding: 12px 20px;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
        width: 100%;
        margin-top: 10px;
    }
    .result {
        margin-top: 20px;
        padding: 15px;
        background-color: #e8f4fc;
        border-radius: 4px;
        border-left: 4px solid #3498db;
    }
    .result h3 {
        margin-top: 0;
        color: #2c3e50;
    }
</style>';

$num1 = $num2 = $num3 = $operation = '';
$result = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];
    $num3 = $_POST['num3'];
    $operation = $_POST['operation'];
    
    switch ($operation) {
        case 'add':
            $result = "$num1 + $num2 + $num3 = " . ($num1 + $num2 + $num3);
            break;
        case 'sub':
            $result = "$num1 - $num2 - $num3 = " . ($num1 - $num2 - $num3);
            break;
        case 'mul':
            $result = "$num1 × $num2 × $num3 = " . ($num1 * $num2 * $num3);
            break;
        case 'div':
            if ($num2 == 0 || $num3 == 0) {
                $result = "Cannot divide by zero!";
            } else {
                $result = "$num1 ÷ $num2 ÷ $num3 = " . ($num1 / $num2 / $num3);
            }
            break;
        case 'factorial':
            function factorial($n) {
                if ($n <= 1) return 1;
                return $n * factorial($n - 1);
            }
            $result = "Factorial of $num1: " . factorial($num1) . "<br>";
            $result .= "Factorial of $num2: " . factorial($num2) . "<br>";
            $result .= "Factorial of $num3: " . factorial($num3);
            break;
        case 'greatest':
            $greatest = $num1;
            if ($num2 > $greatest) $greatest = $num2;
            if ($num3 > $greatest) $greatest = $num3;
            $result = "The greatest number is: $greatest";
            break;
        default:
            $result = "Please select an operation.";
    }
}
?>

<div class="calculator">
    <h2>Number Operations Calculator</h2>
    <form method="post" action="">
        <div class="form-group">
            <label for="num1">Number 1:</label>
            <input type="number" id="num1" name="num1" value="<?php echo $num1; ?>" required>
        </div>
        
        <div class="form-group">
            <label for="num2">Number 2:</label>
            <input type="number" id="num2" name="num2" value="<?php echo $num2; ?>" required>
        </div>
        
        <div class="form-group">
            <label for="num3">Number 3:</label>
            <input type="number" id="num3" name="num3" value="<?php echo $num3; ?>" required>
        </div>
        
        <div class="form-group">
            <label for="operation">Select Operation:</label>
            <select id="operation" name="operation" required>
                <option value="">select</option>
                <option value="add" <?php if($operation=='add') echo 'selected'; ?>>Addition</option>
                <option value="sub" <?php if($operation=='sub') echo 'selected'; ?>>Subtraction</option>
                <option value="mul" <?php if($operation=='mul') echo 'selected'; ?>>Multiplication</option>
                <option value="div" <?php if($operation=='div') echo 'selected'; ?>>Division</option>
                <option value="factorial" <?php if($operation=='factorial') echo 'selected'; ?>>Factorial</option>
                <option value="greatest" <?php if($operation=='greatest') echo 'selected'; ?>>Find Greatest Number</option>
            </select>
        </div>
        
        <button type="submit">Calculate</button>
    </form>
    
    <?php if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($result)): ?>
    <div class="result">
        <h3>Result:</h3>
        <p><?php echo $result; ?></p>
    </div>
    <?php endif; ?>
</div>