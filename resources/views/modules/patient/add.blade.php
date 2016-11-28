@extends('layouts.master')

@section('main')
   <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Patient
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
    @include('shared.alert')
       <div class="row">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add necessary Information</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{url('patient/add')}}" method="post">
            {!! csrf_field() !!}
              <div class="box-body">
                <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                  <label for="exampleInputEmail1">Full Name</label>
                  <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter name" value="{{old('name')}}">
                  @if ($errors->has('name'))<span class="help-block">{{ $errors->first('name') }} </span>@endif
                </div>


                <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                  <label for="exampleInputPassword1">Email</label>
                  <input type="email" name="email" class="form-control" id="exampleInputPassword1" placeholder="Email" value="{{old('email')}}">
                  @if ($errors->has('email'))<span class="help-block">{{ $errors->first('email') }} </span>@endif
                </div>

                <div class="form-group {{ $errors->has('address') ? ' has-error' : '' }}">
                  <label for="exampleInputPassword1">Address</label>
                  <input type="text" name="address" class="form-control" id="exampleInputPassword1" placeholder="Address" value="{{old('address')}}">
                  @if ($errors->has('address'))<span class="help-block">{{ $errors->first('address') }} </span>@endif
                </div>

                 <div class="form-group {{ $errors->has('phone') ? ' has-error' : '' }}">
                  <label for="exampleInputPassword1">Phone No.</label>
                  <input type="text" name="phone" class="form-control" id="exampleInputPassword1" placeholder="phone no." value="{{old('phone')}}">
                  @if ($errors->has('phone'))<span class="help-block">{{ $errors->first('phone') }} </span>@endif
                </div>
                
                <div class="form-group {{ $errors->has('gender') ? ' has-error' : '' }}">
                  <label for="exampleInputPassword1">Gender</label>
                  <select class="form-control" name="gender">
                    <option value="">Choose Gender</option>
                    <option value="male" {{(old('gender') == 'male') ? 'selected' : ''}}>Male</option>
                    <option value="female" {{(old('gender') == 'female') ? 'selected' : ''}}>Female</option>
                    <option value="other" {{(old('gender') == 'other') ? 'selected' : ''}}>Other</option>
                  </select>
                  @if ($errors->has('gender'))<span class="help-block">{{ $errors->first('gender') }} </span>@endif
                </div>

                 <div class="form-group {{ $errors->has('age') ? ' has-error' : '' }}">
                  <label for="exampleInputPassword1">Age.</label>
                  <input type="number" name="age" class="form-control" id="exampleInputPassword1" placeholder="Age" value="{{old('age')}}">
                  @if ($errors->has('age'))<span class="help-block">{{ $errors->first('age') }} </span>@endif
                </div>

                <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="password" value="{{old('password')}}">
                  @if ($errors->has('password'))<span class="help-block">{{ $errors->first('password') }} </span>@endif
                </div>

                 <div class="form-group {{ $errors->has('confirm_password') ? ' has-error' : '' }}">
                  <label for="exampleInputconfirm_password1">Confirm Password</label>
                  <input type="password" name="confirm_password" class="form-control" id="exampleInputconfirm_password1" placeholder="Retype Password" value="{{old('confirm_password')}}">
                  @if ($errors->has('confirm_password'))<span class="help-block">{{ $errors->first('confirm_password') }} </span>@endif
                </div>

               
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
       </div>
      </div>
    </section>
@endsection
