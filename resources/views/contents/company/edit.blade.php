<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Edit Company</h1>
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
                            <h3 class="card-title">Edit Company</h3>
                        </div>


                        <form action="{{route('company.update', $data->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <input name="id" type="hidden" value="{{$data->id}}">
                                <div class="form-group">
                                    <label for="CompanyName">Company Name</label>
                                    <input value="{{$data->name}}" type="text" class="form-control" id="CompanyName"
                                           placeholder="Enter email" name="name">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input value="{{$data->email}}" type="email" class="form-control" id="email"
                                           placeholder="email@123.com" name="email">
                                </div>
                                <div class="form-group">
                                    <label for="website">Website</label>
                                    <input value="{{$data->website}}" type="text" class="form-control" id="website"
                                           placeholder="www.AboveMax.com" name="website">
                                </div>
                                <div class="form-group">
                                    <label for="InputFile">Logo</label>
                                    <div>
                                        <img style="width: 10%; aspect-ratio: 3/2; object-fit: contain" src="{{asset('storage/logo/'
.$data->logo)}}" alt="no image">
                                    </div>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="InputFile"  accept="image/*" onchange="handleImageSelection(event)" name="logo">
                                            <label class="custom-file-label" for="InputFile">Choose file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>
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
