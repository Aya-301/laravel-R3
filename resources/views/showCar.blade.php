<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Car</title>
</head>
<body>
    <h1>Title is: {{$car->title}}</h1>
    <h2>Description is: {{$car->description}}</h2>
    <h3>Updated at: {{$car->updated_at}}</h3>
    <h3>Created at: {{$car->created_at}}</h3>
    <h4>{{$car->category->cat_name}}</h4>
    <h5>{{$car->published}}</h5>
</body>
</html>