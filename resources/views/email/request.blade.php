<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Request</title>
</head>
<body>
<h1>New Request</h1>

<p>Hello,</p>

<p>You have a new request with the following details:</p>

<ul>
    <li><strong>На ваш запрос получен ответ:</strong> {{ $newRequest->comment }}</li>
</ul>

<p>Thank you.</p>
</body>
</html>
