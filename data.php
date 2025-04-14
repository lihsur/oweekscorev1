<?php
header('Content-Type: application/json');
$dataFile = 'data.json';

// For POST requests, update the data file with the incoming JSON.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $json = file_get_contents('php://input');
    // (Optional: Validate or sanitize $json here.)
    file_put_contents($dataFile, $json);
    echo json_encode(["status" => "success"]);
    exit;
}

// For GET requests, simply output the content of data.json.
if (file_exists($dataFile)) {
    echo file_get_contents($dataFile);
} else {
    echo json_encode(["error" => "Data file not found."]);
}
?>
