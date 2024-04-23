<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Edit Employee</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Add Employee</li>
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
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Employee</h3>
                        </div>


                        <form action="{{route('employee.update', $data->id)}}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <input name="id" type="hidden" value="{{$data->id}}">
                                <div class="form-group">
                                    <label for="EmployeeName">First Name</label>
                                    <input value="{{$data->first_name}}" type="text" class="form-control"
                                           id="EmployeeName"
                                           placeholder="Hamza" name="first_name" required>
                                </div>
                                <div class="form-group">
                                    <label for="EmployeelastName">Last Name</label>
                                    <input value="{{$data->last_name}}" type="text" class="form-control"
                                           id="EmployeelastName" required
                                           placeholder="Enter Ali" name="last_name">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input value="{{$data->email}}" type="email" class="form-control" id="email" required
                                           placeholder="email@123.com" name="email">
                                </div>
                                <div class="form-group">
                                    <label for="website">phone</label>
                                    <input value="{{$data->phone}}" type="text" class="form-control" id="phone"
                                           placeholder="www.AboveMax.com" name="phone">
                                </div>
                                <div class="form-group">
                                    <label for="company">Select Company</label>
                                    <select class="select2" name="company_id"  style="width: 100%" id="company" required>
                                        @if($companies)
                                            @foreach($companies as $company)
                                                <option value="{{$company->id}}" {{isset($data->companies->company_id) && $company->id == $data->companies->company_id ?'selected':''}}>{{$company->name}}</option>
                                            @endforeach
                                        @endif

                                    </select>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
