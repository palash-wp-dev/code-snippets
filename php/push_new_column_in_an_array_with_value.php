<?php 
// push a new column with value in php
$results = [
    ['id' => 1, 'user_id' => 101, 'points' => 50],
    ['id' => 2, 'user_id' => 102, 'points' => 60],
    ['id' => 3, 'user_id' => 103, 'points' => 70],
];

foreach ($results as &$log) {
    // This will modify the original $results array
    $log['email'] = 'test@example.com';
}

// Now the $results array is updated with the new 'email' column
print_r($results);
unset($log); // Break the reference with the last element