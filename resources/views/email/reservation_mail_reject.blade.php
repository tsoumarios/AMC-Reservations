<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Grettings from AMC</h1>
    <p>Dear {{$client_name}},</p><br>
    <p>{{$company_name}} rejected your reservation on {{$date}} {{$time}}.</p>
    <img src="http://127.0.0.1:8000/storage/{{$company_image}}" style="width:80px; height:80px; object-fit: cover;" alt="{{ $company_name }}">
</body>
</html>