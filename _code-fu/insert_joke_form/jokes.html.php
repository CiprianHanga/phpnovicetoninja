<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Internet Jokes Database</title>
    </head>
    <body>
        <p>You can <a href="?addjoke">add your own joke</a>!</p>
        <p>Here are all the jokes in the database:</p>
        <?php foreach ($jokes as $joke): ?>
        <blockquote>
        <p><?php echo htmlspecialchars($joke, ENT_QUOTES, 'UTF-8'); ?></p>
        </blockquote>
        <?php endforeach; ?>
    </body>
</html>