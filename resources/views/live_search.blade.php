<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Material Design Bootstrap</title>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

  <link rel="stylesheet" href="{{asset('test/font-awesome/css/font-awesome.css') }}" crossorigin="anonymous">



  <!-- Bootstrap core CSS -->
  <link href="{{asset('test/css/bootstrap.min.css') }}" rel="stylesheet">

  <!-- Material Design Bootstrap -->
  <link href="{{asset('test/css/mdb.min.css') }}" rel="stylesheet">

  <!-- Your custom styles (optional) -->
  <link href="{{asset('test/css/style.css') }}" rel="stylesheet">
  

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  
      
</head>

<body>

  <!-- Start your navbar here-->
  <!--Navbar-->
<nav class="navbar navbar-expand-lg navbar-dark primary-color fixed-top"  style="margin-bottom: 50px;">

<!-- Navbar brand -->
<a class="navbar-brand" href="#">Noob Tech SMS</a>

<!-- Collapse button -->
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
  aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>

<!-- Collapsible content -->
<div class="collapse navbar-collapse" id="basicExampleNav">

  <!-- Links -->
  @guest
  <ul class="navbar-nav mr-auto">
       
  </ul>
  @else
  <ul class="navbar-nav mr-auto">
    <li class="nav-item active">
      <a class="nav-link" href="{{ url('/')}}">Home
        <span class="sr-only">(current)</span>
      </a>
    </li>
    <li class="nav-item" onclick=Activestatus();>
      <a class="nav-link" href="{{ url('/create')}}">Add User</a>
    </li>


<!-- Dropdown -->
<li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">Student</a>
      <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
        <a class="dropdown-item" href="{{ url('/addclass')}}">Add Class</a>
        <a class="dropdown-item" href="{{ url('/addsection')}}">Add Section</a>
        <a class="dropdown-item" href="{{ url('/addstudent')}}">Add Student</a>
      </div>
    </li>


  </ul>
  @endguest
  <!-- Links -->

  
</div>
<!-- Collapsible content -->

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
                                  {{ Auth::user()->name }} <span class="caret"></span>
                              </a>

                              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">


                              <a class="dropdown-item" href="{{ route('password.change') }}">Change Password</a>
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
                      @endguest
                  </ul>
              </div>
</nav>


<!--/. End Of the Navbar-->

 <!-- Page Content Starts Here-->

<div class="container box">

<div class="col">  
            
    <h1> Live Search Student Record Page </h1>

    @guest
      
      <h1>Please Login to Proceed Further</h1>
      
    @else

            <div class="panel panel-hdefault">
                    <div class="panel-heading">
                        Search Student Records 
                    </div>
                    <div class="panel-body">
                    <input type="text" name="search" id="search" class="form-control" placeholder="Search Student Record" > 
                    </div>
            </div>
            <div class="table-responsive">
                <h3 align="center">Total Records: <span id="total_records"></span></h3>
            </div>

          <table class="table">
            <thead class="black white-text">

              <tr>
                <th scope="col">#</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Class</th>
                <th scope="col">Section</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Action</th>
                
              </tr>
            </thead>

              <tbody id="dynamic-row">
                @foreach($students as $student)
                <tr>
                  <th scope="row">{{ $student->id }}</th>
                  <td>{{ $student->first_name }}</td>
                  <td>{{ $student->last_name }}</td>
                  <td>{{ $student->classes->class_name }}</td>
                  <td>{{ $student->sections->section_name }}</td>
                  <td>{{ $student->email }}</td>
                  <td>{{ $student->phone }}</td>
                  <td><a class="btn btn-raised btn-primary btn-sm" href="{{ route('edit', $student->id) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> || 
                  
                  <form method="POST" id="delete-form-{{ $student->id }}" action="{{ route('delete', $student->id) }}" style="display: none;">
                  
                  {{ csrf_field() }}
                  {{ method_field('delete') }}
                  </form>
                  <button onclick="if(confirm('Are you sure to delete this data?')){
                    event.preventDefault();
                    document.getElementById('delete-form-{{ $student->id }}').submit();
                  }else{
                    event.preventDefault();


                  }" class="btn btn-raised btn-danger btn-sm" href="{{ route('update', $student->id) }}"><i class="fa fa-trash-o" aria-hidden="true"></i></td>
                </tr>


                @endforeach

              </tbody>
          </table>
          
    @endguest
</div>

 <!-- Page Content Starts Here-->


  <!-- Footer -->
<footer class="page-footer font-small blue pt-4 fixed-bottom">

<!-- Footer Links -->


  <!-- Grid row -->
  <!-- Social buttons -->
  
  
<!-- Footer Links -->

<!-- Copyright -->

  <div class="footer-copyright py-3">

    <div class="row">
          <div class="col-7 text-right">
          <a class="btn-floating mx-1" href="https://www.facebook.com/ravi.katuwal" target="blank">
        <i class="fab fa-facebook-square fa-2x"> </i>

          <a class="btn-floating mx-1" href="https://twitter.com/swati_ravi" target="blank">
        <i class="fab fa-twitter-square fa-2x"> </i>
      </a>

          <a class="btn-floating mx-1" href="https://github.com/ravikatuwal" target="blank">
        <i class="fab fa-github-square fa-2x"> </i>

              <a class="btn-floating mx-1" href="https://www.linkedin.com/in/ravi-katuwal/" target="blank">
                  <i class="fab fa-linkedin-square fa-2x"> </i>
              </a>


              <a class="btn-floating mx-1" href="https://twitter.com/swati_ravi" target="blank">
                  <i class="fab fa-dribbble-square fa-2x"> </i>
              </a>
          </div>
          <div class="col-3 text-right">
          © 2021 Copyright:
            <a href="https://ravikatuwal.com.np/"> RaviKatuwal.com.np</a>
          </div>
        </div>
  </div>
<!-- Copyright -->

</footer>
<!-- Footer -->




  <!-- Start your project here-->

  <!-- SCRIPTS -->
  <!-- JQuery -->


  <script type="text/javascript" src="{{ asset('test/js/jquery-3.4.1.min.js')}}"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="{{ asset('test/js/popper.min.js')}}"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="{{ asset('test/js/bootstrap.min.js')}}"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="{{ asset('test/js/mdb.min.js')}}"></script>

  <!-- Costumized JavaScript -->
  <script type="text/javascript" src="{{ asset('test/js/script.js')}}"></script>
  <script type="text/javascript">
    $(document).on('keyup', '#search', function(){
      var query = $(this).val();
      // console.log(query);

      $.ajax({
        method: 'POST',
        url: '{{ route("live_search.action")}}',
        dataType: 'json',
        data: {
          '_token': '{{ csrf_token() }}',
          query: query,
        },
        success: function(data){
          // console.log(data);
          var tableRow = '';

          
          op = "";
                for (var i = 0; i < data.length; i++) {
                    op +=
                    '<tr><th scope="row">' + data[i].id + '</th><td>' + data[i].first_name + '</td><td>' + data[i].last_name + '</td><td>' + data[i].class_id + '</td><td>' +data[i].section_id + '</td><td>' + data[i].email + '</td><td>' + data[i].phone +'</td></tr>';
                }

                $('#dynamic-row').html('');
                $('#dynamic-row').append(op);


        }

      });


    });
    
  </script>





  <!-- <script>
    $(document).ready(function() {
    fetch_student_data();
    function fetch_student_data(query = '') {
        $.ajax({
          type: "get",
            url: "{{ route('live_search.action') }}",
            
            data:{ query:query },
            dataType:'json',
            success: function(data){
                $('tbody').html(data.table_data);
                $('#total_records').text(data.total_data);
            }
        });
    }

    $(document).on('keyup', '#search', fuction(){
            var query = $(this).val();
            fetch_student_data(query);
    });
});

  </script> -->
  
</body>

</html>


