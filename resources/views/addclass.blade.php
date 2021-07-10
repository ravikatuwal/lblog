@extends('layouts.main')
@section('content')

    @if ($errors->any())
    @foreach ($errors->all() as $error)
    <div class="alert alert-danger" role="alert">
    {{ $error }}
    </div>
    @endforeach
    @endif

<div class="container">
    <div class="form-row mb-4">
            <div class="col">
                <h1> Add Class Page </h1>
            </div>
            <div class="col">
                @if (session('successMsg'))

                <div class="alert alert-success" role="alert">
                {{session('successMsg')}}
                </div>

                @endif

            </div>
    </div>
@guest
  
  <h1>Please Login to Proceed Further</h1>
  
@else

<!-- Default form register -->
<form class="text-center border border-light p-5" action="{{ route('addclass') }}" method="POST">

{{ csrf_field() }}

    <p class="h4 mb-4">Add Class</p>
  
    <div class="form-row mb-4">
    <div class="col">
            <!-- Class Id  -->
            <input type="text" id="classid" class="form-control" name="id" placeholder="Class Id">
        </div>
        <div class="col">
            <!-- Class name -->
            <input type="text" id="defaultRegisterFormLastName" class="form-control" name="classname" placeholder="Class name">
        </div>

    
    </div>
    
    <!--Submit button -->
    <button class="btn btn-info my-4 btn-block" type="submit">Add Class</button>
  
</form>



@endguest
</div>
@endsection