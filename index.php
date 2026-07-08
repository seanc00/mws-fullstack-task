<?php
require_once "functions.php";
include __DIR__ . "/src/views/partials/header.php";

if (!$session->is_signed_in()) {
    redirect("/login.php");
}
?>

<h1>Dashboard</h1>
<h3>Dashboard</h3>
<a href="/src/php/logout.php">Log Out</a>

<?php include __DIR__ . "/src/views/partials/footer.php"; ?>