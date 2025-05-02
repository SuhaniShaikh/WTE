<?php
echo '<style>
    body {
        font-family: Arial, sans-serif;
        line-height: 1.6;
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
        background-color: #f5f5f5;
    }
    h2 {
        color: #2c3e50;
        background-color: #ecf0f1;
        padding: 10px;
        border-radius: 5px;
        margin-top: 30px;
        border-left: 5px solid #3498db;
    }
    h3 {
        color: #34495e;
    }
    .array-result {
        background-color: white;
        padding: 15px;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        margin-bottom: 20px;
    }
    .array-values {
        font-weight: bold;
        color: #e74c3c;
    }
</style>';

$array1 = [1, 2, 3, 4, 5];
$array2 = [6, 34, 21, 34, 3, 4];

// Display original arrays
echo "<h2>Original Arrays</h2>";
echo "<div class='array-result'>";
echo "<h3>Array 1: <span class='array-values'>" . implode(', ', $array1) . "</span></h3>";
echo "<h3>Array 2: <span class='array-values'>" . implode(', ', $array2) . "</span></h3>";
echo "</div>";

// 1. Merging arrays
$merged = array_merge($array1, $array2);
echo "<h2>1. Merged Array</h2>";
echo "<div class='array-result'>";
echo "<span class='array-values'>" . implode(', ', $merged) . "</span>";
echo "</div>";

// 2. Array union 
$union = array_unique(array_merge($array1, $array2));
echo "<h2>2. Array Union (unique values from both)</h2>";
echo "<div class='array-result'>";
echo "<span class='array-values'>" . implode(', ', $union) . "</span>";
echo "</div>";

// 3. Array intersection 
$intersect = array_intersect($array1, $array2);
echo "<h2>3. Array Intersection (common values)</h2>";
echo "<div class='array-result'>";
echo "<span class='array-values'>" . implode(', ', $intersect) . "</span>";
echo "</div>";

// 4. Array difference (values in array1 not in array2)
$difference = array_diff($array1, $array2);
echo "<h2>4. Array Difference (values in array1 not in array2)</h2>";
echo "<div class='array-result'>";
echo "<span class='array-values'>" . implode(', ', $difference) . "</span>";
echo "</div>";

// 5. Slicing the array (portion of array)
$slice = array_slice($array1, 1, 3);
echo "<h2>5. Sliced Array (elements 1-3 from array1)</h2>";
echo "<div class='array-result'>";
echo "<span class='array-values'>" . implode(', ', $slice) . "</span>";
echo "</div>";

// 6. Splicing the array (modify original array)
$arraySplice = $array1;
array_splice($arraySplice, 2, 2, [10, 11]);
echo "<h2>6. Spliced Array (replace 2 elements from index 2)</h2>";
echo "<div class='array-result'>";
echo "<span class='array-values'>" . implode(', ', $arraySplice) . "</span>";
echo "</div>";

// 7. Sum of array elements
$sum = array_sum($array1);
echo "<h2>7. Sum of Array1 Elements</h2>";
echo "<div class='array-result'>";
echo "<span class='array-values'>" . $sum . "</span>";
echo "</div>";

// 8. Product of array elements
$product = array_product($array1);
echo "<h2>8. Product of Array1 Elements</h2>";
echo "<div class='array-result'>";
echo "<span class='array-values'>" . $product . "</span>";
echo "</div>";

// 9. Reversed array
$reversed = array_reverse($array1);
echo "<h2>9. Reversed Array1</h2>";
echo "<div class='array-result'>";
echo "<span class='array-values'>" . implode(', ', $reversed) . "</span>";
echo "</div>";

// 10. Array intersection 
$intersect = array_intersect($array1, $array2);
echo "<h2>10. Array Intersection</h2>";
echo "<div class='array-result'>";
echo "<span class='array-values'>" . implode(', ', $intersect) . "</span>";
echo "</div>";

// 11. Array difference (is in array1 that aren't in array2)
$difference = array_diff($array1, $array2);
echo "<h2>11. Array Difference</h2>";
echo "<div class='array-result'>";
echo "<span class='array-values'>" . implode(',' , $difference) . "</span>";
echo "</div>";

//12. sorting 
sort($array2); 
echo "<h2>12. Sorting Array</h2>";
echo "<div class='array-result'>";
foreach ($array2 as $value) {
    echo "<span class='array-values'>" . $value . " </span>";
}
echo "</div>";

//associative array 
$assoc1 = ['a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5];
$assoc2 = ['f' => 6, 'g' => 34, 'h' => 21, 'i' => 34, 'c' => 3, 'k' => 4];

$assocIntersect = array_intersect_assoc($assoc1, $assoc2);
echo "<h2>13. Associative Array Intersection (array_intersect_assoc)</h2>";
echo "<div class='array-result'>";
echo "<span class='array-values'>" . implode(', ', $assocIntersect) . "</span>";
echo "</div>";

$assocDifference = array_diff_assoc($assoc1, $assoc2);
echo "<h2>14. Associative Array Difference (array_diff_assoc)</h2>";
echo "<div class='array-result'>";
echo "<span class='array-values'>" . implode(',' , $assocDifference) . "</span>";
echo "</div>";