<html>
    <head>
        <title>ciBlog</title>
        <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css'); ?>">
        <!-- ?v='.time() zorgd ervoor dat je de laatste versie krijgt van de file die je wilt ontvangen -->
        <link rel="stylesheet" href="<?= base_url('assets/css/style.css?v='.time()); ?>">
        <link rel="stylesheet" href="<?= base_url('assets/js/bootstrap.bundle.min.js'); ?>">
        <link rel="stylesheet" href="<?= base_url('assets/js/jquery.min.js'); ?>">
        <link rel="stylesheet" href="<?= base_url('assets/js/custom.js'); ?>">
        <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url(); ?>">ciBlog</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse show" id="navbarColor01" style="">
                <ul class="navbar-nav mr-auto">
                    <li><a class="nav-link" href="<?= base_url(); ?>">Home</a></li>
                    <li><a class="nav-link" href="<?= base_url(); ?>about">About</a></li>
                    <li><a class="nav-link" href="<?= base_url(); ?>posts">Blog</a></li>
                    <li><a class="nav-link" href="<?= base_url(); ?>categories">Categories</a></li>       
                </ul>
                <ul class="nav navbar-nav navbar-right">
                <li><a class="nav-link" href="<?= base_url(); ?>posts/create">Create Post</a></li>
                <li><a class="nav-link" href="<?= base_url(); ?>categories/create">Create Category</a></li>
                </ul>
            </div>
        </div>
    </nav> 
    
    <div class="container">