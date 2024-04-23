<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Employee</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Employee</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-sm-12">
                <div>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Employees</h3>
                            <span style="float: right">
                                <a class="btn btn-primary btn-sm" href="{{route('employee.create')}}">Add Employee</a>
                            </span>
                        </div>
                        <div class="card-body">
                            <table class="table dataTable" id="datatable">
                                <thead>
                                <tr>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Company</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(isset($data))
                                    @foreach($data as $employee)

                                        <tr>
                                            <td>{{$employee->first_name}}</td>
                                            <td>{{$employee->last_name}}</td>
                                            <td>{{$employee->email}}</td>
                                            <td>
                                                {{$employee->phone}}
                                            </td>
                                            <td>
                                                @if(isset($employee->companies->name))
                                                    {{$employee->companies->name}}
                                                @endif</td>
                                            <td>
                                                <a href="{{route('employee.show',[$employee->id])}}"
                                                   class="btn btn-icon
                                        btn-outline-primary btn-sm waves-effect edit">
                                                    Edit
                                                </a>
                                                <a href="" id="{{$employee->id}}"
                                                   class="btn btn-icon
                                        btn-outline-danger btn-sm waves-effect delete_employee">
                                                    Delete
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
