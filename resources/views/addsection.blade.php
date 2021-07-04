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
                <h1> Add Section Page </h1>
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
<form class="text-center border border-light p-5" action="{{ route('addsection') }}" method="POST">

{{ csrf_field() }}

    <p class="h4 mb-4">Add Section</p>
  
    <div class="form-row mb-4">
        
    <div class="col">
        <select class="browser-default custom-select" name="sectionid">
            <option value="" selected>Choose Class</option>
            @foreach ($classes as $class)
            <option value="{{ $class->class_id }}">{{ $class->class_name }}</option>
            @endforeach
           
        </select>
        </div>

        <div class="col">
            <!-- Class name -->
            <input type="text" id="defaultRegisterFormLastName" class="form-control" name="sectionname" placeholder="Section Name">
        </div>
    </div>
    
    <!--Submit button -->
    <button class="btn btn-info my-4 btn-block" type="submit">Add Class</button>
  
</form>



@endguest
</div>
@endsection