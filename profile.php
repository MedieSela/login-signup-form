<?php
session_start();
if(!isset($_SESSION['user'])){
    header("Location: login.html");
    exit;
}
$user= $_SESSION['user'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Profili i Përdoruesit</title>
    <style>
        body { font-family: Arial; background-color: #f4f4f4; padding: 20px; }
        .profile { background: #fff; padding: 20px; border-radius: 5px; width: 300px; margin: auto; }
    </style>
</head>
<body>
    <div class="profile">
        <h2>Mirë se erdhe, <?php echo htmlspecialchars($user['emer']); ?>!</h2>
        <p><strong>Emri:</strong> <?php echo htmlspecialchars($user['emer']); ?></p>
        <p><strong>Mbiemri:</strong> <?php echo htmlspecialchars($user['mbiemer']); ?></p>
        <p><strong>Mosha:</strong> <?php echo $user['mosha']; ?></p>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
        <a href="logout.php">Dil</a>
    </div>
</body>
</html>