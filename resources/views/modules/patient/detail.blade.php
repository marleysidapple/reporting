@extends('layouts.master')


@section('main')

    <!-- Main content -->
    <section class="content">
       <div class="row">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Patient Profile</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <table class="table table-bordered table-hover">
                    <tr>
                        <th>Name</th>
                        <td>{{$patient->name}}</td>
                    </tr>

                    <tr>
                        <th>Email</th>
                        <td>{{$patient->email}}</td>
                    </tr>

                    <tr>
                        <th>Address</th>
                        <td>{{$patient->address}}</td>
                    </tr>

                    <tr>
                        <th>Phone No.</th>
                        <td>{{$patient->phone}}</td>
                    </tr>

                     <tr>
                        <th>Age</th>
                        <td>{{$patient->age}}</td>
                    </tr>

                    <tr>
                        <th>Created Date</th>
                        <td>{{$patient->created_at}}</td>
                    </tr>

                   <tr>
                       <th> <a href="{{url('patient/'.$patient->id.'/edit')}}" class="btn btn-primary btn-sm">Edit Patient Detail</a></th>
                       <td>&nbsp;</td>
                   </tr>
                </table>

       </div>
      </div>
    </section>

@endsection