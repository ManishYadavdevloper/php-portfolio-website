<?php
require_once __DIR__ . '/../config.php';
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if ($mysqli->connect_errno) {
  http_response_code(500);
  die('DB connection failed: ' . $mysqli->connect_error);
}
$mysqli->set_charset('utf8mb4');

function get_projects($limit = 12) {
  global $mysqli;
  $stmt = $mysqli->prepare("SELECT id, title, summary, tech_stack, image, project_url, github_url, featured FROM projects ORDER BY featured DESC, id DESC LIMIT ?");
  $stmt->bind_param("i", $limit);
  $stmt->execute();
  $res = $stmt->get_result();
  return $res->fetch_all(MYSQLI_ASSOC);
}

function add_message($name, $email, $message) {
  global $mysqli;
  $stmt = $mysqli->prepare("INSERT INTO messages(name, email, message) VALUES(?,?,?)");
  $stmt->bind_param("sss", $name, $email, $message);
  return $stmt->execute();
}
?>
