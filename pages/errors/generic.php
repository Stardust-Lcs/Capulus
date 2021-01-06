<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 Not Found</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
        }

        html,
        body {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
            width: 100%;
            height: 100vh;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .container h1 {
            font-weight: 900;
            font-size: 10rem;
        }

        .container p {
            font-size: 2.5rem;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1><?php echo $status_code; ?></h1>
        <p><?php echo $message; ?></p>
    </div>
</body>

</html>