<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <?php /** @var RenderHtml $title */ ?>
    <title><?= $title; ?></title>
</head>

<body>

<div class="container mt-3">

    <?php if (isset($_SESSION['logged']) == TRUE): ?>
        <div class="container border bg-light mb-2 text-center">
            <h1>Admin Page</h1>
            <div class="responsive nowrap">
                <a href="/home" class="btn btn-dark m-2">Home</a>
                <a href="/register" class="btn btn-dark m-2">Register Admin</a>
                <button class="btn btn-dark m-2">Excluir Admin</button>
                <a href="/logout" class="btn btn-danger m-2">Logout</a>
            </div>
        </div>
    <?php endif; ?>