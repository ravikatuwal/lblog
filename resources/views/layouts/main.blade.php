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

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <!-- Bootstrap core CSS -->
  <link href="{{asset('test/css/bootstrap.min.css') }}" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="{{asset('test/css/mdb.min.css') }}" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="{{asset('test/css/style.css') }}" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  
      
</head>

<body>

  <!-- Start your project here-->
  @include('layouts.navbar')

  @yield('content')

  @include('layouts.footer')


  <!-- Start your project here-->

  <!-- SCRIPTS -->
  <!-- JQuery -->


  <script type="text/javascript" src="{{asset('test/js/jquery.js')}}"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="{{asset('test/js/popper.min.js')}}"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="{{asset('test/js/bootstrap.min.js')}}"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="{{asset('test/js/mdb.min.js')}}"></script>

  <!-- Costumized JavaScript -->
  <script type="text/javascript" src="{{asset('test/js/script.js')}}"></script>
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
                    var editButton ='<td><a class="btn btn-raised btn-primary btn-sm" href="/edit/' + data[i].id+'"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>';
                    var deleteButton ='<a class="btn btn-raised btn-danger btn-sm" href="/delete/' + data[i].id+'"><i class="fa fa-trash-o" aria-hidden="true"></i></a>';

                    op +=
                    '<tr><th scope="row">' + data[i].id + '</th><td>' + data[i].first_name + '</td><td>' + data[i].last_name + '</td><td>' + data[i].class_id + '</td><td>' +data[i].section_id + '</td><td>' + data[i].email + '</td><td>' + data[i].phone +'</td>' + editButton + '||' + deleteButton +'</tr>';
                }

                $('#dynamic-row').html('');
                $('#dynamic-row').append(op);


        }

      });


    });
  </script>
  
</body>

</html>
