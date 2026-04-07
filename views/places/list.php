<!DOCTYPE html>
<html>
<head>
    <title>Tourist Places</title>

    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<h2>Tourist Places</h2>

<?php while($row = $places->fetch_assoc()): ?>

    <div>
        <h3><?php echo $row['place_name']; ?></h3>
        <p><?php echo $row['description']; ?></p>
    </div>

<?php endwhile; ?>

</body>
</html>