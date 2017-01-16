<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <p>You can <a href="?addjoke">add your own jokes</a> to the database!</p>
    <p>Here are all the jokes in the database:</p>
    <?php foreach ($jokes as $joke): ?>
    <form action='?deletejoke' method='post'>
        <blockquote>
        <p><?php echo htmlspecialchars($joke, ENT_QUOTES, 'UTF-8'); ?></p>
        <input type='submit' value='Delete'>
        </blockquote>
    </form>
    <?php endforeach; ?>
</body>
</html>