<?php require_once(APP_ROOT . '/views/includes/header.php'); ?>
<?php require_once(APP_ROOT . '/views/includes/footer.php'); ?>

<div class="container">
    <h1><?php echo($data['title']); ?></h1>
    <p><?php echo($data['description']); ?></p>
    <p><?php echo('Version ' . APP_VERSION); ?></p>
</div>
