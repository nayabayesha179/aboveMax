<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Company</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Company</li>
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
                            <h3 class="card-title">Companies</h3>
                            <span style="float: right">
                                <a class="btn btn-primary btn-sm" href="{{route('company.create')}}">Add Company</a>
                            </span>
                        </div>
                        <div class="card-body">
                            <table class="table dataTable" id="datatable">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Website</th>
                                    <th>Logo</th>
                                    <th>Employees</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(isset($data))
                                    @foreach($data as $company)

                                        <tr>
                                            <td>{{$company->name}}</td>
                                            <td>{{$company->email}}</td>
                                            <td>{{$company->website}}</td>
                                            <td>
                                                <img style="width: 40%; aspect-ratio: 3/2; object-fit: contain" src="{{asset('storage/logo/'
.$company->logo)}}"  alt="no image">
                                            </td>

                                            <td>
                                                @if(!empty($company->employees_count))
                                                    {{$company->employees_count}}
                                                @endif</td>
                                            <td>
                                                <a href="{{route('company.show',[$company->id])}}"
                                                   class="btn btn-icon
                                        btn-outline-primary btn-sm waves-effect edit">
                                                    Edit
                                                </a>
                                                    <a href="" id="{{$company->id}}"
                                                       class="btn btn-icon
                                        btn-outline-danger btn-sm waves-effect delete_company">
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
