
<!-- jQuery -->
<script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('assets/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('assets/plugins/sparklines/sparkline.js')}}"></script>
<!-- Select2 -->
<script src="{{asset('assets/plugins/toastr/toastr.min.js')}}"></script>
<script src="{{asset('assets/plugins/select2/js/select2.full.min.js')}}"></script>
<script src="https://unpkg.com/jquery-input-mask-phone-number@1.0.14/dist/jquery-input-mask-phone-number.js"></script
<!-- DataTables  & Plugins -->
<script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>

<script src="{{asset('assets/plugins/inputmask/jquery.inputmask.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('assets/plugins/moment/moment.min.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('assets/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('assets/dist/js/adminlte.js')}}"></script>

<script>
    $(function () {
        $("#datatable").DataTable();
    });
</script>
<script>

    $(document).ready(function () {
        @if (Session::has('message'))
        // toast('success', 'Data Sent Successfully.', 'Data Sent');
        toastr['success']('Data Sent Successfully.', 'Data Sent!', {
            positionClass: 'toast-bottom-left',
            timeOut: 1000,
        });
        @elseif (Session::has('info'))
            toastr['info']('Data Updated Successfully.', 'Data Updated!', {
            positionClass: 'toast-bottom-left',
            timeOut: 1000,
        });
        @elseif(Session::has('error'))
            toastr['error']('Some Error Detected.', 'Error Occurred!', {
            positionClass: 'toast-bottom-left',
            timeOut: 1000,
        })
        @elseif(Session::has('delete'))
            toastr['error']('Data Deleted.', 'Data Deleted!', {
            positionClass: 'toast-bottom-left',
            timeOut: 1000,
        });
        @endif


    });

    // function select2() {
        let select = $('.select2');
        // select2
        select.each(function () {
            let $this = $(this);
            $this.wrap('<div class="position-relative"></div>');
            $this.select2({
                placeholder: 'Select value',
                dropdownParent: $this.parent()
            });
        });
    $(document).on('click', '.delete_company', function (e) {

        e.preventDefault();
        let id = $(this).attr('id');
        // alert(id);
        let assetPath = "company/" + id;
        let _token = "{{csrf_token()}}";
        $.ajax({
            url: assetPath,
            type: 'DELETE',
            data: {
                _token: _token,
            },
            success: function (response, status) {
                if (status == 'success') {

                    toastr['error']('Data Deleted.', 'Data Deleted!', {
                        positionClass: 'toast-bottom-left',
                        timeOut: 1000,});
                    $("#datatable").load(location.href+" #datatable>*","");
                }
                if(status == 500){
                    toastr['error']('Error Occurred!', 'Cannot Delete Data.', {
                        positionClass: 'toast-bottom-left',
                        timeOut: 1000,});
                }

            }

        });
    });

    $(document).on('click', '.delete_employee', function (e) {

        e.preventDefault();
        let id = $(this).attr('id');
        // alert(id);
        let assetPath = "employee/" + id;
        let _token = "{{csrf_token()}}";
        $.ajax({
            url: assetPath,
            type: 'DELETE',
            data: {
                _token: _token,
            },
            success: function (response, status) {
                if (status == 'success') {

                    toastr['error']('Data Deleted.', 'Data Deleted!', {
                        positionClass: 'toast-bottom-left',
                        timeOut: 1000,});
                    $("#datatable").load(location.href+" #datatable>*","");
                }

            }
        });
    });



</script>
<script>

    $(function () {
        var url = window.location;
        // for single sidebar menu
        $('ul.nav-sidebar a').filter(function () {
            return this.href == url;
        }).addClass('active');

        // for sidebar menu and treeview
        $('ul.nav-treeview a').filter(function () {
            return this.href == url;
        }).parentsUntil(".nav-sidebar > .nav-treeview")
            .css({'display': 'block'})
            .addClass('menu-open').prev('a')
            .addClass('active');
    });
</script>
<script>
    function handleImageSelection(event) {
        const file = event.target.files[0];
        const maxSizeInBytes = 2 * 1024 * 1024; // 2MB
        const allowedWidth = 100;
        const allowedHeight = 100;

        if (file && file.type.startsWith('image/')) {
            const img = new Image();

            img.onload = function() {
                const width = img.width;
                const height = img.height;

                if (file.size <= maxSizeInBytes && width <= allowedWidth && height <= allowedHeight) {
                    // console.log('Image meets the size requirements');
                } else {
                    toastr['error']('Image Error.', 'Max size should be 100 x 100!', {
                        positionClass: 'toast-bottom-left',
                        timeOut: 1000,});
                    $('#InputFile').reset();
                }
            };

            img.src = URL.createObjectURL(file);
        }
    }
</script>
