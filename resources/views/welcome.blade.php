<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post">
        @csrf

        <div>
            <label for="npp">NPP</label>
            <input type="text" name="npp" id="npp" value="123456">
        </div>

        <div>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" value="password">
        </div>

        <div>
            <button type="submit">Login</button>
        </div>
    </form>
</body>

</html>
