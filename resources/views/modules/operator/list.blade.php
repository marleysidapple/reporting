@extends('layouts.master')

@section('main')
   <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         Operator List
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
       <div class="box">
            <div class="box-header">
              <h3 class="box-title">Operators</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Full Name</th>
                  <th>Email</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($operator as $key => $val)
                  <tr>
                   <td>{{$key+1}}</td>
                   <td>{{$val->name}}</td>
                   <td>{{$val->email}}</td>
                   <td><a href="{{url('operator/'.$val->id .'/edit')}}" class="btn btn-primary btn-sm">Edit</a></td>
                  </tr>
                  @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>#</th>
                  <th>Full Name</th>
                  <th>Email</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
    </section>
@endsection
