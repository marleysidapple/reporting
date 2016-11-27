@extends('layouts.master')

@section('main')
   <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Report
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
            <form role="form" action="{{url('report/add')}}" method="post">
            {!! csrf_field() !!}
              <div class="box-body">
                <div class="form-group {{ $errors->has('patient') ? ' has-error' : '' }}">
                  <label for="exampleInputEmail1">Choose Patient</label>
                  <select class="form-control select2" name="patient">
                    <option value="">Choose Patient</option>
                    @foreach($patient as $key => $val)
                      <option value="{{$val->id}}">{{$val->name}}</option>
                    @endforeach
                  </select>
                  @if ($errors->has('patient'))<span class="help-block">{{ $errors->first('patient') }} </span>@endif
                </div>


                 <div class="form-group {{ $errors->has('clinical_history') ? ' has-error' : '' }}">
                  <label for="exampleInputPassword1">Clinical History</label>
                  <input type="text" name="clinical_history" class="form-control" id="exampleInputPassword1" placeholder="E.g. Large Gastric Mass" value="{{old('clinical_history')}}">
                  @if ($errors->has('clinical_history'))<span class="help-block">{{ $errors->first('clinical_history') }} </span>@endif
                </div>

                 <div class="form-group {{ $errors->has('specimen') ? ' has-error' : '' }}">
                  <label for="exampleInputPassword1">Specimen</label>
                  <input type="text" name="specimen" class="form-control" id="exampleInputPassword1" placeholder="E.g. Gastric Mucosa" value="{{old('specimen')}}">
                  @if ($errors->has('specimen'))<span class="help-block">{{ $errors->first('specimen') }} </span>@endif
                </div>

                <div class="form-group {{ $errors->has('diagnosis') ? ' has-error' : '' }}">
                  <label for="exampleInputPassword1">Diagnosis</label>
                  <textarea name="diagnosis"></textarea>
                  @if ($errors->has('diagnosis'))<span class="help-block">{{ $errors->first('diagnosis') }} </span>@endif
                </div>

                 <div class="form-group {{ $errors->has('gross_description') ? ' has-error' : '' }}">
                  <label for="exampleInputPassword1">Gross Description</label>
                  <textarea name="gross_description"></textarea>
                  @if ($errors->has('gross_description'))<span class="help-block">{{ $errors->first('gross_description') }} </span>@endif
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


@section('script')
<script>
  $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();
  });
  </script>
@endsection
