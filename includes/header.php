<?php $currentPage = basename($_SERVER['SCRIPT_NAME'] ?? 'index.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>ESL Consulting Ltd</title>

    <link
        rel="stylesheet"
        href="/esl-consulting/static/css/style.css?v=<?php echo filemtime(__DIR__ . '/../static/css/style.css'); ?>"
    >
</head>

<body>

<header class="site-header">
    <div class="container">
        <nav class="navbar" aria-label="Main navigation">

            <a href="/esl-consulting/" class="logo">
                <img
                    src="/esl-consulting/static/images/logo/logohead.png"
                    alt="ESL Consulting Ltd"
                >
            </a>

            <div class="nav-links">
                <a href="/esl-consulting/" <?php echo $currentPage === 'index.php' ? 'aria-current="page"' : ''; ?>>Home</a>
                <a href="/esl-consulting/about.php" <?php echo $currentPage === 'about.php' ? 'aria-current="page"' : ''; ?>>About</a>
                <a href="/esl-consulting/services.php" <?php echo $currentPage === 'services.php' ? 'aria-current="page"' : ''; ?>>Services</a>
                <a href="/esl-consulting/sectors.php" <?php echo $currentPage === 'sectors.php' ? 'aria-current="page"' : ''; ?>>Sectors</a>
                <a href="/esl-consulting/projects.php" <?php echo $currentPage === 'projects.php' ? 'aria-current="page"' : ''; ?>>Projects</a>
                <a href="/esl-consulting/contact.php" <?php echo $currentPage === 'contact.php' ? 'aria-current="page"' : ''; ?>>Contact</a>
            </div>

        </nav>
    </div>
</header>