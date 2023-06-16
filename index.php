<?php
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: *');
header('Access-Control-Allow-Headers: X-Requested-With, Content-Type, Accept');

$servername = "127.0.0.1";
$username = "root";
$password = "1234";
$dbname = "test22";
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("连接数据库失败：" . mysqli_connect_error());
}

// $name = 'zoozoo';
$sql = "SELECT * FROM users WHERE name = 'zoozoo' ";
$result = mysqli_query($conn, $sql);


$members = [];
if (mysqli_num_rows($result) > 0) {
    foreach ($result as $row) {
        $members[] = $row['account'];
    }
}

mysqli_close($conn);

echo json_encode([
    'status' => 200,
    'message' => 'success',
    'members' => $members
]);
