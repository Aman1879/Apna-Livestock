<?php
session_start();
require_once '../config/database.php';

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    http_response_code(401);
    echo json_encode(['error' => 'Unauthorized']);
    exit;
}

$user_id = $_SESSION["user_id"];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    try {
        $pdo = getDBConnection();
        $stmt = $pdo->prepare("UPDATE users SET full_name = ?, role = ?, email = ?, phone = ?, profile_image = ? WHERE id = ?");
        $stmt->execute([
            $data['full_name'],
            $data['role'],
            $data['email'],
            $data['phone'],
            $data['profile_image'],
            $user_id
        ]);

        $_SESSION['full_name'] = $data['full_name'];
        $_SESSION['role'] = $data['role'];
        $_SESSION['email'] = $data['email'];
        $_SESSION['phone'] = $data['phone'];
        $_SESSION['profile_image'] = $data['profile_image'];

        echo json_encode(['success' => true]);
    } catch (PDOException $e) {
        http_response_code(500);
        echo json_encode(['error' => $e->getMessage()]);
    }
}
?>
