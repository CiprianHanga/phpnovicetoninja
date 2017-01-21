<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <p>You cand <a href='?addjoke'>add your own jokes</a>, too!</p>
    <p>Here are all the jokes in the database:</p>
    <?php foreach ($jokes as $joke): ?>
        <form action='?deletejoke' method='post'>
            <blockquote>
            <p>
            <?php echo htmlspecialchars($joke['text'], ENT_QUOTES, "UTF-8"); ?>
            <input type='hidden' name='id' value='<?php echo $joke['id']; ?>'>
            <input type='submit' value='Delete'>
            </p>
            </blockquote>
        </form>
    <?php endforeach; ?>
</body>
</html>