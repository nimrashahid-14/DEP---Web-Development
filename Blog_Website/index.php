<?php
// Suppress any potential errors/warnings during inclusion
@include '../includes/db.php';

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$result = $conn->query("SELECT * FROM posts ORDER BY created_at DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Posts</title>
    <link rel="stylesheet" href="../css/styles.css">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-image: url("background.jpg");
            background-size: cover;
            margin: 0;
            padding: 20px;
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .container {
            background-color: rgba(255, 255, 255, 0.2); /* Transparent background */
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            max-width: 800px;
            width: 100%;
            color: #fff; /* Text color */
        }
        h1 {
            font-size: 2.5em;
            margin-bottom: 20px;
            text-align: center;
            color: #007bff;
        }
        .btn-primary {
            display: inline-block;
            margin-bottom: 20px;
            padding: 10px 20px;
            background-color: #343a40; /* Dark grey background */
            color: #fff; /* White text */
            text-decoration: none;
            border-radius: 5px;
            text-align: center;
            transition: background-color 0.3s ease, color 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #1d2124;
            color: #fff;
        }
        .post {
            background-color: rgba(255, 255, 255, 0.2); /* Transparent background */
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            color: #fff; /* Text color */
        }
        .post:hover {
            transform: translateY(-5px);
            box-shadow: 0 0 25px rgba(0,0,0,0.2);
        }
        .post h2 {
            margin-top: 0;
            font-size: 1.8em;
        }
        .post h2 a {
            text-decoration: none;
            color: #fff; /* Text color */
            transition: color 0.3s ease;
        }
        .post h2 a:hover {
            color: #007bff;
        }
        .post p {
            color: #f0f0f0;
            line-height: 1.6;
        }
        .post-actions {
            margin-top: 15px;
        }
        .post-actions a,
        .post-actions button {
            margin-right: 10px;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease, color 0.3s ease;
            color: #ffffff;
            font-size: 0.9em;
            background-color: #343a40; /* Dark grey background */
        }
        .post-actions a.edit {
            background-color: #343a40;
        }
        .post-actions button.delete {
            background-color: #343a40;
        }
        .post-actions a.edit:hover,
        .post-actions button.delete:hover {
            background-color: #1d2124;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>All Posts</h1>
        <a href="create.php" class="btn btn-primary">Create New Post</a>
        <?php while ($row = $result->fetch_assoc()): ?>
            <div class="post">
                <h2><a href="show.php?id=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a></h2>
                <p><?php echo substr($row['content'], 0, 200); ?>...</p>
                <div class="post-actions">
                    <a href="edit.php?id=<?php echo $row['id']; ?>" class="edit">Edit</a>
                    <form action="delete.php" method="post" style="display: inline;">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <button type="submit" class="delete">Delete</button>
                    </form>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</body>
</html>
