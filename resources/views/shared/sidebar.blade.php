 <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{Auth::user()->name}}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li><a href=""><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        
        @if(Auth::user()->can(['list-operator', 'add-operator', 'edit-operator', 'delete-operator']))
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Operators</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('operator/list')}}"><i class="fa fa-circle-o"></i>List All</a></li>
            <li><a href="{{url('operator/add')}}"><i class="fa fa-circle-o"></i>Add Operator</a></li>
          </ul>
        </li>
        @endif


         @if(Auth::user()->can(['list-patient', 'add-patient', 'edit-patient', 'delete-patient']))
        <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Patients</span>
            <span class="pull-right-container">
               <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('patient/list')}}"><i class="fa fa-circle-o"></i>List All</a></li>
            <li><a href="{{url('patient/add')}}"><i class="fa fa-circle-o"></i> Add Patient</a></li>
          </ul>
        </li>
        @endif
       

        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Reports</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('report/list')}}"><i class="fa fa-circle-o"></i>List All</a></li>
            @if(Auth::user()->can(['add-report']))
            <li><a href="{{url('report/add')}}"><i class="fa fa-circle-o"></i>Add Report</a></li>
            @endif
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->