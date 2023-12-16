<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Car</title>
</head>
<body>
    <h5>{{$car->title}}</h5>
    <h3>{{$car->description}}</h3>
    <h2>{{$car->updated_at}}</h2>
    <h4>{{$car->created_at}}</h4>
    <h5>{{$car->published}}</h5>
</body>
</html>