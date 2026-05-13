<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Upload File</title>
    <style>
        body {
            background-color: #f7f9fc;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .upload-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            width: 400px;
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
            color: #333;
        }

        input[type="file"] {
            margin-bottom: 15px;
        }

        input[type="submit"] {
            background-color: #007bff;
            border: none;
            color: white;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .message {
            margin-top: 15px;
            font-weight: bold;
        }

        .success {
            color: green;
        }

        .error {
            color: red;
        }
    </style>
</head>
<body>

<div class="upload-container">
    <h2>Tải tập tin</h2>
    <form action="#" method="post" enctype="multipart/form-data">
        <input type="file" name="myfile"><br>
        <input type="submit" name="upload" value="Tải Lên">
    </form>

    <?php
    if (isset($_POST['upload'])) {
        $file = $_FILES['myfile'];
        $targetFile = __DIR__ . DIRECTORY_SEPARATOR . basename($file['name']);

        if (move_uploaded_file($file['tmp_name'], $targetFile)) {
            echo "<div class='message success'>Tải file thành công: <strong>" . htmlspecialchars($file['name']) . "</strong></div>";
        } else {
            echo "<div class='message error'>Tải file thất bại.</div>";
        }
    }
    ?>
</div>
</body>
</html>
