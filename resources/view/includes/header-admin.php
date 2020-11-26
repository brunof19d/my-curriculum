<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title><?= $title; ?></title>
</head>

<body>

<?php if (isset($_SESSION['logged']) == TRUE): ?>
    <div class="border bg-light header-admin">
        <h1>Admin Page</h1>
        <div class="buttons-header">
            <a href="/admin" class="btn btn-dark m-2">Home</a>
            <a href="/register" class="btn btn-success m-2">Register Admin</a>
            <a href="/logout" class="btn btn-danger m-2">Logout</a>
        </div>
    </div>
<?php endif; ?>

<div class="container-fluid">



