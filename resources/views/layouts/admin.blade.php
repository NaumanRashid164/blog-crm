<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>CRM | @yield("title")</title>
    <link rel="apple-touch-icon" href="{{asset('app-assets/images/ico/apple-icon-120.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('app-assets/images/ico/favicon.ico')}}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/vendors.min.css')}}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/bootstrap-extended.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/colors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/components.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/themes/dark-layout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/themes/bordered-layout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/themes/semi-dark-layout.css')}}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css')}}">

    <!-- END: Custom CSS-->

    @yield("css")


</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="">

    <!-- BEGIN: Header-->

    @include("component.header")

    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->

    @include("component.sidebar")

    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>

        <div class="content-wrapper container-xxl p-0">

            @yield('content-header')


            <div class="content-body">

                @yield('content')

            </div>
        </div>
    </div>

    <!-- END: Content-->

    <!--  Modal -->
    <div class="modal fade" id="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
            <div class="modal-content">
                <div class="modal-header bg-transparent">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="text-center mb-2">
                    <h1 class="mb-1" id="modal-heading"></h1>
                </div>
                <div class="modal-body modal-data pb-5 px-sm-5 pt-50">

                </div>
            </div>
        </div>
    </div>
    <!--/ Modal -->

    <!-- Delete modal start -->
    <div class="modal fade" id="del-confirm-ajax" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered modal-edit-user">
            <div class="modal-content">
                <div class="modal-header bg-transparent">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="text-center mb-2">
                    <h1 class="mb-1">Are you sure?</h1>
                </div>
                <div class="modal-body pb-5 px-sm-5 pt-50">
                    <p>Deleted data may not be recoverable, click "Continue" if you want to proceed.</p>
                    <strong>You can lost other data too witch is linked to this one. !</strong><br>
                    <button type="button" class="btn btn-danger me-1" id="del-final-ajax">Continue</button>
                    <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close">
                        Discard
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- Delete modal end -->



    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>



    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light">
        <p class="clearfix mb-0"><span class="float-md-start d-block d-md-inline-block mt-25">COPYRIGHT &copy; {{now()->year}}<a class="ms-25" href="https://intersoft.ai/" target="_blank">Intersoft</a><span class="d-none d-sm-inline-block">, All rights Reserved</span></span><span class="float-md-end d-none d-md-block">Hand-crafted & Made with<i data-feather="heart"></i></span></p>
    </footer>
    <button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
    <!-- END: Footer-->


    <!-- BEGIN: Vendor JS-->
    <script src="{{asset('app-assets/vendors/js/vendors.min.js')}}"></script>
    <script src="{{ asset('app-assets/vendors/js/ui/jquery.sticky.js')}}"></script>

    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js')}}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{asset('app-assets/js/core/app-menu.js')}}"></script>
    <script src="{{asset('app-assets/js/core/app.js')}}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    @yield("script")
    <!-- END: Page JS-->

    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        });

        @if(session('message'))
        toastr.success("{{ session('message') }}");
        @elseif(session('error'))
        toastr.error("{{ session('error') }}");
        @elseif(session('warning'))
        toastr.warning("{{ session('warning') }}");
        @endif


        function tableInit() {
            let dt_row_grouping_table = $('.dt-row-grouping');
            var groupColumn = 0;
            if (dt_row_grouping_table.length) {
                var groupingTable = dt_row_grouping_table.DataTable({

                    order: [],
                    dom: '<"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
                    displayLength: 10,
                    lengthMenu: [10, 20, 30, 40, 50, 60],

                    language: {
                        paginate: {
                            // remove previous & next text from pagination
                            previous: '&nbsp;',
                            next: '&nbsp;'
                        }
                    }
                });

                // Order by the grouping
                $('.dt-row-grouping tbody').on('click', 'tr.group', function() {
                    var currentOrder = table.order()[0];
                    if (currentOrder[0] === groupColumn && currentOrder[1] === 'asc') {
                        groupingTable.order([groupColumn, 'desc']).draw();
                    } else {
                        groupingTable.order([groupColumn, 'asc']).draw();
                    }
                });
            }

        }

        function validate() {
            var valid = true;
            $(".alert-danger").remove();

            $(".required:visible").each(function() {
                if ($(this).val() == "" || $(this).val() === null || ($(this).attr('type') == "radio" && $('[name="' + $(this).attr('name') + '"]:checked').val() == undefined)) {
                    $(this)
                        .closest("div")
                        .append('<div class="alert-danger">This field is required</div>');

                    valid = false;
                }
            });
            if (!valid) {
                $("html, body").animate({
                        scrollTop: $(".alert-danger:first").offset().top - 80,
                    },
                    100
                );
            }
            return valid;
        }

        var update_url, target_table;

        function updatePage(url, target) {

            $.ajax({
                url: url,
                type: 'GET',
                success: function(response) {
                    $('.table').DataTable().destroy();
                    console.log(target)
                    $('.' + target).html(response);
                    tableInit();
                    feather.replace();
                }
            });
        }

        $(document).on('click', '.open-modal,.edit-btn,.del-btn', function() {
            update_url = $(this).data('update_url');
            target = $(this).data('target');
        });

        //on click add faq
        $(document).on('click', '.open-modal', function() {
            var url = $(this).attr("data-url");
            var heading = $(this).data('heading');
            $.ajax({
                type: "GET",
                url: url,
                success: function(response) {
                    $('.modal-data').html(response);
                    $('#modal-heading').text(heading);
                    var basicPickr = $('.modal-data').find('.flatpickr-basic');
                    if (basicPickr.length) {
                        basicPickr.flatpickr({
                            dateFormat: 'd/m/Y',
                        });
                    }
                    var dropzone = $('.modal-data').find('.dropzone');
                    if (dropzone.length) {
                        configDropZone();
                    }
                    $('#modal').modal('show');
                }
            });
        });

        // //on click save faq
        $(document).on('submit', '.modal form', function(e) {
            e.preventDefault();
            if (!validate())
                return false;
            var form = $(this);
            var data = new FormData(this);
            $(form).find('button[type="submit"]').prop('disabled', true);

            $.ajax({
                type: 'POST',
                data: data,
                cache: !1,
                contentType: !1,
                processData: !1,
                url: $(form).attr('action'),
                async: true,
                headers: {
                    "cache-control": "no-cache"
                },
                success: function(response) {
                    updatePage(update_url, target);
                    $(form).closest('#modal').modal('hide');
                    $(form).find('button[type="button"]').prop('disabled', true);
                    toastr.success(response.success);
                },
                error: function(xhr, status, error) {
                    if (xhr.status == 422) {
                        $(form).find('div.alert').remove();
                        var errorObj = xhr.responseJSON.errors;
                        $.map(errorObj, function(value, index) {
                            var appendIn = $(form).find('[name="' + index + '"]').closest('div');
                            if (!appendIn.length) {
                                toastr.error(value[0]);
                            } else {
                                $(appendIn).append('<div class="alert alert-danger" style="padding: 1px 5px;font-size: 12px"> ' + value[0] + '</div>')
                            }
                        });

                        $(form).find('button[type="submit"]').prop('disabled', false);

                    } else {
                        toastr.error('Unknown Error!');
                        $(form).find('button[type="submit"]').prop('disabled', false);
                    }

                }
            });
        });


        $(document).on('click', '.del-btn', function(e) {
            e.preventDefault();
            var btn = $(this);
            var url = $(btn).attr('data-href');
            console.log(url);
            $('#del-final-ajax').attr('data', url);
            $('#del-confirm-ajax').modal('show');
        });

        $(document).on('click', '#del-final-ajax', function(e) {
            e.preventDefault();
            var btn = $(this);

            $(btn).prop('disabled', true);
            url = $(this).attr('data');
            $.ajax({
                url: url,
                type: 'GET',
                success: function(response) {
                    toastr.success(response);
                    $('#del-confirm-ajax').modal('hide');
                    updatePage(update_url, target);
                    $(btn).prop('disabled', false);
                },
                error: function() {
                    toastr.error('Unknown error!');
                    $(btn).prop('disabled', false);
                }
            });
        });


        $('.nav-link').on('click', function() {
            var page_name = $(this).find('span').text();
            var src = $(this).find('img').attr('src');
            update_url = $(this).data('update_url');
            target = $(this).data('target');
            updatePage(update_url, target);
            $('.module_tab').removeClass('active');
            $('.module_title').text(page_name);
            $('.module_img').attr("src", src);
            $('.module_tab').addClass('active');
        });

        $(document).on('change', '.update-status', function() {
            var url = $(this).data('url');
            var status = $(this).val();
            var id = $(this).data('id');
            update_url = $(this).data('update_url');
            target = $(this).data('target');
            $.ajax({
                url: url,
                type: 'get',
                data: {
                    status: status,
                    id: id
                },
                success: function(response) {
                    toastr.success(response);
                    updatePage(update_url, target);
                },
                error: function() {

                }
            });
        });



        // config Zrop zone
        function configDropZone() {

            Dropzone.discover();
            Dropzone.options.myDropzone = {
                maxFilesize: 5,
                // renameFile: function(file) {
                //     var dt = new Date();
                //     var time = dt.getTime();
                //     return time + file.name;
                // },
                acceptedFiles: ".jpeg,.jpg,.png,.gif",
                addRemoveLinks: true,
                timeout: 5000,
                success: function(file, response) {
                    console.log(response);
                },
                error: function(file, response) {
                    console.log(file, response);
                    return false;
                }
            };
        }
    </script>

    @yield("js")
</body>
<!-- END: Body-->

</html>