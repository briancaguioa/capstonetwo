
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="{{ url('/home') }}">
        {{ config('app.name', 'Laravel') }}
    </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
          <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Left Side Of Navbar -->
        <ul class="navbar-nav mr-auto">
          @if(!Auth::guest())  
            <li class="nav-item">
              <a class="nav-link" href="/home">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/movies">Movies</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/">Request</a>
            </li>
              @if (Auth::user()->roles_id == "2" )
                <li class="nav-item">
                  <a class="nav-link" href="/">Users</a>
                </li>
              @endif
            @endif
        </ul>

          <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
          @guest
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
            @endif
          @endguest
            @if(!Auth::guest())  
              @if (Auth::user()->roles_id == "2" )
                <li class="nav-item">
                   <a class="nav-link btn btn-default" href="/movies/create"> Add Movies </a>
                </li>

                <li class="nav-item">
                  {{-- modal --}}
                  <!-- Button trigger modal -->
                  <button type="button" class="nav-link btn bg-dark" data-toggle="modal" data-target="#exampleModal">
                    Add Category
                  </button>
                </li>


                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Category </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                        <form action="/addCategory" enctype="multipart/form-data" method="POST">
                          <div class="modal-body">

                              {{ csrf_field() }}

                              <div class="form-group">
                                <label for="name">Name</label>
                                <input id="name" type="text" name="name" class="form-control">
                              </div>
                                @if(Session::has("success_message"))
                                  <div class="alert alert-success">{{ Session::get("success_message") }}</div>
                                @endif
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                           <button type="submit" class="btn bg-primary text-white" ><i class="fas fa-plus"></i> Add Category</button>
                          </div>
                        </form>
                    </div>
                  </div>
                </div>
                {{-- endmodal --}}

              @else
                <form class="form-inline my-2 my-lg-0">
                  <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
                  <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
                </form>
                
              @endif
                <li class="nav-item dropdown">
                  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                      {{ Auth::user()->name }} <span class="caret"></span>
                  </a>

                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="{{ route('logout') }}"
                         onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                          {{ __('Logout') }}
                      </a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                      </form>
                  </div>
                </li>
            @endif
        </ul>
      </div>
  </div>
</nav>