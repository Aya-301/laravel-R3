<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
@include('includes.nav2')
<div class="container">
  <h2> Posts List</h2>            
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Title</th>
        <th>Create Date</th>
        <th>Update</th>
        <th>Show</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post)
      <tr>
        <td>{{$post->title}}</td>
        <td>{{$post->created_at}}</td>
        <td><a href="updatePost/{{ $post->id }}">Edit</a></td>
        <td><a href="showPost/{{ $post->id }}">Show</a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

</body>
</html>
