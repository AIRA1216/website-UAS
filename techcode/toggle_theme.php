if (isset($_SESSION['theme']) && $_SESSION['theme'] === 'dark') {
    $_SESSION['theme'] = 'light';
} else {
    $_SESSION['theme'] = 'dark';
}

header('Content-Type: application/json');
echo json_encode(['theme' => $_SESSION['theme']]);
exit;
?>