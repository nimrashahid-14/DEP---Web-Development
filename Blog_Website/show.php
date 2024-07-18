
<?php
@include '../includes/db.php';
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM posts WHERE id=$id");
$post = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $post['title']; ?></title>
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-image: url("background.jpg");
            background-color: #f8f9fa;
            margin: 0;
            padding: 20px;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            max-width: 800px;
            width: 100%;
        }
        h1 {
            font-size: 2.5em;
            margin-bottom: 20px;
            text-align: center;
            color: #007bff;
        }
        p {
            color: #6c757d;
            line-height: 1.6;
            font-size: 1.2em;
        }
        .back-link {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .back-link:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1><?php echo $post['title']; ?></h1>
        <p><?php echo nl2br($post['content']); ?></p>
        <a href="index.php" class="back-link">Back to Posts</a>
    </div>
</body>
</html>
