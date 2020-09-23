<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>
        <?php
        /** @var RenderHtml $title */
        echo $title;
        ?>
    </title>
</head>
<body>
<div class="container mt-3">
    <div class="row">
        <?php if (isset($_SESSION['logged']) == TRUE): ?>
            <div class="container border bg-light mb-2 text-center">
                <h1>Admin Page</h1>
                <div class="responsive nowrap">
                    <a href="/home" class="btn btn-dark m-2">Home</a>
                    <button class="btn btn-dark m-2">Registrar Admin</button>
                    <button class="btn btn-dark m-2">Excluir Admin</button>
                    <a href="/logout" class="btn btn-danger m-2">Logout</a>
                </div>
            </div>
        <?php endif; ?>
