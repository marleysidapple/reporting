@extends('layouts.master')

@section('main')
   <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         Patient List
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
    @include('shared.alert')
       <div class="box">
            <div class="box-header">
              <h3 class="box-title">Patients</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Full Name</th>
                  <th>Email</th>
                  <th>Phone No.(s)</th>
                  <th>Age</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($patient as $key => $val)
                  <tr>
                   <td>{{$key+1}}</td>
                   <td>{{$val->name}}</td>
                   <td>{{$val->email}}</td>
                   <td>{{$val->phone}}</td>
                   <td>{{$val->age}}</td>
                   <td>
                    <a href="{{url('patient/'.$val->id .'/detail')}}" class="btn btn-primary btn-sm">View</a>
                    <a href="{{url('patient/'.$val->id .'/edit')}}" class="btn btn-primary btn-sm">Edit</a>
                    <a href="{{url('patient/'.$val->id .'/delete')}}" onclick="return confirm('Are you sure?');" class="btn btn-primary btn-sm">Delete</a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>#</th>
                  <th>Full Name</th>
                  <th>Email</th>
                  <th>Phone No.(s)</th>
                  <th>Age</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
    </section>
@endsection
