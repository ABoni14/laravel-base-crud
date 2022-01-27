<header class="container py-5">
  <ul class="nav nav-pills">
     <li class="nav-item">
       <a class="nav-link {{ (Route::currentRouteName() === 'home') ? 'active' : '' }}" href="">Home</a>
     </li>
     <li class="nav-item">
       <a class="nav-link {{ (Route::currentRouteName() === 'travels') ? 'active' : '' }}" href="{{route("comics.index")}}">Comics</a>
     </li>
  </ul>
</header>