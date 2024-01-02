<!DOCTYPE html>
<html lang="en">
<head>
  <title>Update Car</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
@include('includes.nav')
<div class="container">
  <h2>update car data</h2>
  <form action="{{route('update_car', $car->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="form-group">
      <label for="title">Title:</label>
      <input type="text" class="form-control" id="title" placeholder="Enter title" name="title" value="{{$car->title}}">
      @error('title')
      <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
    <div class="form-group">
      <label for="description">description:</label>
      <textarea class="form-control" name="description" id="" cols="60" rows="3">{{$car->description}}</textarea>
      @error('description')
      <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
    <div class="form-group">
      <label for="image">Image:</label>
      <input type="file" class="form-control" id="image" name="image">
      <img src="{{ asset('assets/images/'.$car->image) }}" alt="{{$car->title}}" style="width:100px;">
      @error('image')
      <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
    <input type="hidden" value="{{$car->image}}" name="oldImage">
    <div class="form-group">
      <label for="category">Category:</label>
      <select name="category_id" id="">
      @foreach($categories as $category)
        <option value="{{ $category->id }}" @selected(old('id') == $category->category_id)>{{ $category->cat_name }}</option>
      @endforeach
      </select>
      @error('category_id')
        {{ $message }}
      @enderror
    </div>
    <div class="checkbox">
      <label><input type="checkbox" name="published" @checked($car->published)> Published me</label>
    </div>
    <button type="submit" class="btn btn-default">Update</button>
  </form>
</div>

</body>
</html>