@extends('layouts.main')
@section('content')

<div class="container">

<div class="col">
                
            <div class="col">
                @if (session('successMsg'))

                <div class="alert alert-success" role="alert">
                {{session('successMsg')}}
                </div>

                @endif

            </div>
    <h1> Home Page </h1>

    @guest
      
      <h1>Please Login to Proceed Further</h1>
      
    @else


          <table class="table">
            <thead class="black white-text">
            <tr> 
          <th colspan="6">     
            <div class="panel panel-default">
                <div class="panel-body">
                <input type="text" name="search" id="search" class="form-control" placeholder="Search Student Record" >  
                </div>
              </div>
          </th>
          <th colspan="2">     
            <div class="panel panel-default">
                <div class="panel-body">
                  <h3 align="center">Total Record : <span id="total_records"></span></h3>  
                </div>
              </div>
          </th>
      </tr>
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
               @foreach ($students as $student)
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
          <!-- {{$students->appends(['students' => $students->currentPage()])->links()}}  -->
          {{ $students->links() }}
    @endguest
</div>
@endsection