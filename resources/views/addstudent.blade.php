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
                <h1> Add Student Page </h1>
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
<form class="text-center border border-light p-5" action="{{ route('store.new') }}" method="POST">

{{ csrf_field() }}

    <p class="h4 mb-4">Add Student</p>


    <div class="form-row mb-4">
        <div class="col">
            <!-- First name -->
            <input type="text" id="defaultRegisterForm" class="form-control" name="studentid" placeholder="Student Id">
        </div>
    </div>
    <div class="form-row mb-4">
        <div class="col">
            <!-- First name -->
            <input type="text" id="defaultRegisterFormFirstName" class="form-control" name="firstname" placeholder="First name">
        </div>
        <div class="col">
            <!-- Last name -->
            <input type="text" id="defaultRegisterFormLastName" class="form-control" name="lastname" placeholder="Last name">
        </div>
    </div>

    <div class="form-row mb-4">
        <div class="col">
        <select id="class" class="browser-default custom-select" name="class">
            <option value="0" disabled="true" selected >Choose Class</option>

            @foreach ($classes as $class)
            <option value="{{ $class->id }}">{{ $class->class_name }}</option>
            @endforeach
        </select>
        </div>

        <div class="col">
            <!-- Section -->
            <select id="section" class="section browser-default custom-select" name="section">
            <option value="0" disabled="true" selected>Choose Section</option>

            </select>
        </div>
    </div>


    <div class="form-row mb-4">
        <div class="col">
            <!-- E-mail -->
            <input type="email" id="defaultRegisterFormEmail" class="form-control mb-4" name="email" placeholder="E-mail">
        </div>

        <div class="col">

            <!-- Phone number -->
            <input type="text" id="defaultRegisterPhonePassword" class="form-control" name="phone" placeholder="Phone number" aria-describedby="defaultRegisterFormPhoneHelpBlock">
        </div>
    </div>
    
    <!-- Sign up button -->
    <button class="btn btn-info my-4 btn-block" type="submit">Add Student</button>

    <!-- Social register -->
    

</form>
<!-- Default form register -->


@endguest
</div>
@endsection