<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Add Company</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Add Company v1</li>
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
                            <h3 class="card-title">Add Employee</h3>
                        </div>


                        <form action="{{route('employee.store')}}" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="EmployeeName">First Name</label>
                                    <input value="" type="text" class="form-control"
                                           id="EmployeeName" required
                                           placeholder="Hamza" name="first_name">
                                </div>
                                <div class="form-group">
                                    <label for="EmployeelastName">Last Name</label>
                                    <input value="" type="text" class="form-control"
                                           id="EmployeelastName" required
                                           placeholder="Enter Ali" name="last_name">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input value="" type="email" class="form-control" id="email" required
                                           placeholder="email@123.com" name="email">
                                </div>

                                <div class="form-group">
                                    <label for="website">phone</label>
                                    <input value="" type="text" class="form-control" id="phone" pattern="[0-9]{4}-[0-9]{7}" required
                                            name="phone" placeholder="9999-9999999">
                                </div>
                                <div class="form-group">
                                    <label for="company">Select Company</label>
                                    <select class="select2 form-control" required id="company" name="company_id" style="width: 100%">
                                        @if($companies)
                                            @foreach($companies as $company)
                                                <option value="{{$company->id}}" >{{$company->name}}</option>
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
