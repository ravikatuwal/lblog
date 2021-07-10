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
<h1> Edit Page </h1>


@guest
  
  <h1>Please Login to Proceed Further</h1>
  
@else


<!-- Default form register -->
<form class="text-center border border-light p-5" action="{{ route('update', $student->id) }}" method="POST">

{{ csrf_field() }}

    <p class="h4 mb-4">Edit Student</p>

    <div class="form-row mb-4">
        <div class="col">
            <!-- First name -->
            <input type="text" id="defaultRegisterFormFirstName" class="form-control" value="{{ $student->first_name }}"name="firstname" placeholder="First name">
        </div>
        <div class="col">
            <!-- Last name -->
            <input type="text" id="defaultRegisterFormLastName" class="form-control" value="{{ $student->last_name }}" name="lastname" placeholder="Last name">
        </div>
    </div>

    <div class="form-row mb-4">
        <div class="col">
            <select id="class" class="browser-default custom-select" name="class">
                <option value="{{ $student->class_id }}" selected >{{ $student->classes->class_name }}</option>

                @foreach ($classes as $class)
                <option value="{{ $class->id }}">{{ $class->class_name }}</option>
                @endforeach
            </select>
        </div>


        <div class="col">
            <!--Section name -->
            <input type="text" id="section" class="form-control" value="{{ $student->section_id }}" name="section" placeholder="Student Section">
        </div>
    </div>
    <div class="form-row mb-4">
        <div class="col">
            <!-- E-mail -->
            <input type="email" id="defaultRegisterFormEmail" class="form-control mb-4" value="{{ $student->email }}" name="email" placeholder="E-mail">
        </div>   

    <!-- Phone number -->

        <div class="col">
            <input type="text" id="defaultRegisterPhonePassword" class="form-control" value="{{ $student->phone}}" name="phone" placeholder="Phone number" aria-describedby="defaultRegisterFormPhoneHelpBlock">
        </div>
    </div>

    
    <!-- Sign up button -->
    <button class="btn btn-info my-4 btn-block" type="submit">Update Data</button>

    <!-- Social register -->
    

</form>
<!-- Default form register -->

@endguest
</div>
@endsection