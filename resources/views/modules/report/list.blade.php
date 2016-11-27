@extends('layouts.master')

@section('main')
   <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Report List
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
       <div class="box">
            <div class="box-header">
              <h3 class="box-title">Reports</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Patient Name</th>
                  <th>MRN No.</th>
                  <th>Clinical History</th>
                  <th>Generated Date</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($report as $key => $val)
                  <tr>
                   <td>{{$key+1}}</td>
                   <td>{{$val->patient_id}}</td>
                   <td>{{$val->mrn}}</td>
                   <td>{{$val->clinical_history}}</td>
                   <td>{{$val->created_at}}</td>
                   <td>
                   <a href="{{url('report/'.$val->id .'/detail')}}" class="btn btn-success btn-sm">View</a>
                   <a href="{{url('report/'.$val->id .'/edit')}}" class="btn btn-primary btn-sm">Edit</a></td>
                  </tr>
                  @endforeach
                </tbody>
                <tfoot>
                <tr>
                   <th>#</th>
                  <th>Patient Name</th>
                  <th>MRN No.</th>
                  <th>Clinical History</th>
                  <th>Generated Date</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
    </section>
@endsection
