<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield("hr-system")</title>
    <!-- Font Awesome -->
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    rel="stylesheet"
    />
    <!-- Google Fonts -->
    <link
    href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
    rel="stylesheet"
    />
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0-beta1/css/bootstrap.min.css" rel="stylesheet"> --}}
    <!-- MDB -->
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.css"
    rel="stylesheet"
    />
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css"> 
     {{-- custom css --}}
     <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">

     {{-- Datatable material --}}
     <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">

     {{-- daterange picker --}}
     <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

     {{-- datatable responsive css --}}

     <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap.min.css">

</head>
<body>
    <div id="app">
        {{-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
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
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav> --}}    
        <div class="page-wrapper chiller-theme toggled">
            <nav id="sidebar" class="sidebar-wrapper">
              <div class="sidebar-content">
                <div class="sidebar-brand">
                  <a href="#">HR SYSTEM</a>
                  <div id="close-sidebar">
                    <i class="fas fa-times"></i>
                  </div>
                </div>
                <div class="sidebar-header">
                  <div class="user-pic">
                    <img class="img-responsive img-rounded" src="{{auth()->user()->user_image_path()}}" alt="user-profile"/>
                  </div>
                  <div class="user-info">
                    <span class="user-name">
                      {{auth()->user()->name}}
                    </span>
                    <span class="user-role">{{auth()->user()->department ? auth()->user()->department->title: 'No Department'}}</span>
                    <span class="user-status">
                      <i class="fa fa-circle"></i>
                      <span>Online</span>
                    </span>
                  </div>
                </div>
                <!-- sidebar-header  -->
                {{-- <div class="sidebar-search">
                  <div>
                    <div class="input-group">
                      <input type="text" class="form-control search-menu" placeholder="Search...">
                      <div class="input-group-append">
                        <span class="input-group-text">
                          <i class="fa fa-search" aria-hidden="true"></i>
                        </span>
                      </div>
                    </div>
                  </div>
                </div> --}}
                <!-- sidebar-search  -->
                <div class="sidebar-menu">
                  <ul>
                    {{-- <li class="header-menu">
                      <span>General</span>
                    </li> --}}
                    <li class="sidebar-dropdown">
                      <a href="{{url('employee')}}">
                        <i class="fa fa-tachometer-alt"></i>
                        <span>Employee</span>
                      </a>
                      {{-- <div class="sidebar-submenu">
                        <ul>
                          <li>
                            <a href="#">Dashboard 1
                              <span class="badge badge-pill badge-success">Pro</span>
                            </a>
                          </li>
                          <li>
                            <a href="#">Dashboard 2</a>
                          </li>
                          <li>
                            <a href="#">Dashboard 3</a>
                          </li>
                        </ul>
                      </div> --}}
                    </li>
                    <li class="sidebar-dropdown">
                      <a href="{{url('department')}}">
                        <i class="fa fa-shopping-cart"></i>
                        <span>Department</span>
                        {{-- <span class="badge badge-pill badge-danger">3</span> --}}
                      </a>
                      {{-- <div class="sidebar-submenu">
                        <ul>
                          <li>
                            <a href="#">Products
          
                            </a>
                          </li>
                          <li>
                            <a href="#">Orders</a>
                          </li>
                          <li>
                            <a href="#">Credit cart</a>
                          </li>
                        </ul>
                      </div> --}}
                    </li>
                    <li class="sidebar-dropdown">
                      <a href="{{url('role')}}">
                        <i class="far fa-gem"></i>
                        <span>Role</span>
                      </a>
                      <div class="sidebar-submenu">
                        <ul>
                          <li>
                            <a href="#">General</a>
                          </li>
                          <li>
                            <a href="#">Panels</a>
                          </li>
                          <li>
                            <a href="#">Tables</a>
                          </li>
                          <li>
                            <a href="#">Icons</a>
                          </li>
                          <li>
                            <a href="#">Forms</a>
                          </li>
                        </ul>
                      </div>
                    </li>
                    <li class="sidebar-dropdown">
                      <a href="{{url('permission')}}">
                        <i class="fa fa-chart-line"></i>
                        <span>Permission</span>
                      </a>
                      <div class="sidebar-submenu">
                        <ul>
                          <li>
                            <a href="#">Pie chart</a>
                          </li>
                          <li>
                            <a href="#">Line chart</a>
                          </li>
                          <li>
                            <a href="#">Bar chart</a>
                          </li>
                          <li>
                            <a href="#">Histogram</a>
                          </li>
                        </ul>
                      </div>
                    </li>
                    <li class="sidebar-dropdown">
                      <a href="#">
                        <i class="fa fa-globe"></i>
                        <span>Maps</span>
                      </a>
                      <div class="sidebar-submenu">
                        <ul>
                          <li>
                            <a href="#">Google maps</a>
                          </li>
                          <li>
                            <a href="#">Open street map</a>
                          </li>
                        </ul>
                      </div>
                    </li>
                    <li class="header-menu">
                      <span>Extra</span>
                    </li>
                    <li>
                      <a href="#">
                        <i class="fa fa-book"></i>
                        <span>Documentation</span>
                        <span class="badge badge-pill badge-primary">Beta</span>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="fa fa-calendar"></i>
                        <span>Calendar</span>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="fa fa-folder"></i>
                        <span>Examples</span>
                      </a>
                    </li>
                  </ul>
                </div>
                <!-- sidebar-menu  -->
              </div>
              <!-- sidebar-content  -->
              <div class="sidebar-footer">
                <a href="#">
                  <i class="fa fa-bell"></i>
                  <span class="badge badge-pill badge-warning notification">3</span>
                </a>
                <a href="#">
                  <i class="fa fa-envelope"></i>
                  <span class="badge badge-pill badge-success notification">7</span>
                </a>
                <a href="#">
                  <i class="fa fa-cog"></i>
                  <span class="badge-sonar"></span>
                </a>
                <a href="#">
                  <i class="fa fa-power-off"></i>
                </a>
              </div>
            </nav>
        {{-- header menu --}}
        <div class="header-menu">
            <div class="d-flex">
                <div class="col-md-12 d-flex">
                    <div class="col-md-6">
                     <a href="" id="show-sidebar"><i class="fas fa-bars"></i></a>
                     </div>
                        <div class="d-flex justify-content-center">
                        <h5>@yield('title')</h5>
                        <a href=""></a>
                    </div>
                </div>
            </div>
        </div>
        {{-- content --}}
        <div class="py-4">
            <div class="d-flex justify-content-center">
                <div class="col-md-11 margin-bott page-content">
            @yield('content')
                </div>
            </div>
        </div>
        {{-- bottom menu --}}
        <div class="bottom-menu">
            <div class="d-flex justify-content-center">
                <div class="col-md-8">
                    <div class="d-flex justify-content-between">
                        <a>
                            <i class="fa fa-home"></i>
                            <p class="mb-0">Home</p>
                        </a>
                        <a>
                            <i class="fa fa-home"></i>
                            <p class="mb-0">Home</p>
                        </a>
                        <a>
                            <i class="fa fa-home"></i>
                            <p class="mb-0">Home</p>
                        </a>
                        <a href="{{route('profile.profile')}}">
                            <i class="fa-solid fa-user"></i>
                            <p class="mb-0" >Profile</p>
                        </a>
                   </div>
                </div>
            </div>
        </div>
          </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script> 
    <script
    type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.js"
    ></script>
    <script type="text/javascript" src="{{asset('assets/js/app.js')}}"></script>

    {{-- Datatables js --}}

    <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>

    {{-- dateRangePicker js --}}
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    {{-- js validation laravel --}}
    <script type="text/javascript" src="{{ url('vendor/jsvalidation/js/jsvalidation.js')}}"></script>

    {{-- datatable responsive --}}
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
    {{-- custom script emplyoee/index.blade.php--}}

    {{-- sweet alert2--}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- sweet alert1 --}}
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    {{-- jquery markjs datalightlight --}}
     <script src="https://cdn.jsdelivr.net/g/mark.js(jquery.mark.min.js)"></script>
     <script src="https://cdn.datatables.net/plug-ins/1.10.13/features/mark.js/datatables.mark.js"></script>
     <script src="https://cdn.jsdelivr.net/g/mark.js(jquery.mark.min.js),datatables.mark.js"></script>
    <script>
        $(function(){
        @if(session('create'))
        Swal.fire({
        title: 'Success',
        text: "{{session('create')}}",
        icon: 'success ',
        });
        @endif
        @if(session('update'))
        Swal.fire({
        title: 'Success',
        text: "{{session('update')}}",
        icon: 'success ',
        });
        @endif
        });
    </script>
    @yield('script')

    {{-- sidebar js --}}
    <script>
            jQuery(function ($) {
             //insert csrf token for ajax call
                $.ajaxSetup({
              beforeSend: function(xhr, type) {
                  if (!type.crossDomain) {
                      xhr.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
                  }
              },
              });
            $(".sidebar-dropdown > a").click(function() {
            $(".sidebar-submenu").slideUp(200);
            if (
            $(this)
            .parent()
            .hasClass("active")
            ) {
            $(".sidebar-dropdown").removeClass("active");
            $(this)
            .parent()
            .removeClass("active");
            } else {
            $(".sidebar-dropdown").removeClass("active");
            $(this)
            .next(".sidebar-submenu")
            .slideDown(200);
            $(this)
            .parent()
            .addClass("active");
            }
            });
            //add and remove open clode toogle
            document.addEventListener('click',function(){
              if(document.getElementById('show-sidebar').contains(event.target)){
                $(".page-wrapper").addClass("toggled");
              }
              else if(!document.getElementById('show-sidebar').contains(event.target)){
                $(".page-wrapper").removeClass("toggled");
              }
            })
            $("#close-sidebar").click(function() {
            $(".page-wrapper").removeClass("toggled");
            });
            $("#show-sidebar").click(function() {
            $(".page-wrapper").addClass("toggled");
            });
            //mark js query
            $.extend(true, $.fn.dataTable.defaults, {
              mark: true
           });
            });
    </script>
    {{-- <script>
       $("#back-btn").on('click',function(e){
               e.preventDefault();
              //for previous 
              window.history.go(-1);
               });
    </script> --}}
</body>
</html>