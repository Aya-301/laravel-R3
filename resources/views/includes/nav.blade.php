<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Home</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="{{ request()->routeIs('cars') ? 'active' : '' }}"><a href="{{Route('cars')}}">Cars</a></li>
      <li class="{{ request()->routeIs('createCar') ? 'active' : '' }}"><a href="{{Route ('createCar')}}">Insert Car</a></li>
      <li class="{{ request()->routeIs('trashed') ? 'active' : '' }}"><a href="{{Route ('trashed')}}"> Trash</a></li>
      <li><a href="#">Page 3</a></li>
      <li><a href="{{ LaravelLocalization::getLocalizedURL('en') }}">English</a></li>
      <li><a href="{{ LaravelLocalization::getLocalizedURL('ar') }}">عربي</a></li>
    </ul>
  </div>
</nav>