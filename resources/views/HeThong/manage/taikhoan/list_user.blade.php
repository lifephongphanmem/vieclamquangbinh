<!DOCTYPE html>
    <html lang="en" class="no-js">
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8"/>
        <title>{{$pageTitle}}</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport"/>
        <meta content="" name="Phần mềm quản lý biên chế"/>
        <meta content="" name="HuongVu-LifeSoft"/>
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
        <link href="{{url('assets/global/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{url('assets/global/plugins/simple-line-icons/simple-line-icons.min.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{url('assets/global/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{url('assets/global/plugins/uniform/css/uniform.default.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{url('assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css')}}" rel="stylesheet" type="text/css"/>
        <!-- END GLOBAL MANDATORY STYLES -->
        <script src="{{url('assets/global/plugins/jquery.min.js')}}" type="text/javascript"></script>
        <script src="{{url('assets/global/plugins/jquery-migrate.min.js')}}" type="text/javascript"></script>
        <!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
        <link href="{{url('assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{url('assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet')}}" type="text/css"/>
        <link href="{{url('assets/global/plugins/morris/morris.css')}}" rel="stylesheet" type="text/css">
        <!-- END PAGE LEVEL PLUGIN STYLES -->
        <!-- BEGIN PAGE STYLES -->
        <link href="{{url('assets/admin/pages/css/tasks.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{url('assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css')}}" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css')}}"/>
        <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/select2/select2.css')}}"/>
        <!-- END PAGE STYLES -->
        <!-- BEGIN THEME STYLES -->
        <!-- DOC: To use 'rounded corners' style just load 'components-rounded.css' stylesheet instead of 'components.css' in the below style tag -->
        <link href="{{url('assets/global/css/components-rounded.css')}}" id="style_components" rel="stylesheet" type="text/css"/>
        <link href="{{url('assets/global/css/plugins.css')}}"rel="stylesheet" type="text/css"/>
        <link href="{{url('assets/admin/layout4/css/layout.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{url('assets/admin/layout4/css/themes/light.css')}}" rel="stylesheet" type="text/css" id="style_color"/>
        <link href="{{url('assets/global/plugins/bootstrap-toastr/toastr.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- END THEME STYLES -->

        <!--link rel="shortcut icon" href="{{ url('images/logovang.png')}}" type="image/x-icon"-->
        <link rel="shortcut icon" href="{{ url('images/LIFESOFT.png')}}" type="image/x-icon">
    </head>
    <!-- END HEAD -->

    <!-- BEGIN BODY -->
    <body class="page page-header-fixed page-footer-fixed page-sidebar-fixed page-sidebar-closed-hide-logo page-sidebar-closed-hide-logo">
    <!-- BEGIN HEADER -->
    <div class="page-header navbar navbar-fixed-top">
        <!-- BEGIN HEADER INNER -->
        <div class="page-header-inner">
            <!-- BEGIN LOGO -->
            <div class="page-logo">
                <a href="{{url('')}}">
                    <!--img src="{{url('images/logo_dai.png')}}" alt="logo" class="logo-default" style="margin-top: 5px;"-->
                    {{-- <img src="{{url('images/LOGO_LIFE.png')}}" alt="logo" class="logo-default" style="margin-top: 5px;"> --}}
                </a>
                <div class="menu-toggler sidebar-toggler">
                    <!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
                </div>
            </div>
            <!-- END LOGO -->
            <!-- BEGIN RESPONSIVE MENU TOGGLER -->
            <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
            </a>
            <!-- END RESPONSIVE MENU TOGGLER -->

            <!-- BEGIN PAGE TOP -->
            <div class="page-top">
                <!-- BEGIN HEADER SEARCH BOX -->
                <!-- DOC: Apply "search-form-expanded" right after the "search-form" class to have half expanded search box -->
                <form class="search-form" action="extra_search.html" method="GET">
                    <div class="input-group">
                        <!--input type="text" class="form-control input-sm" placeholder="Search..." name="query">
                        <span class="input-group-btn">
                        <a href="javascript:;" class="btn submit"><i class="icon-magnifier"></i></a>
                        </span-->
                    </div>
                </form>
                <!-- END HEADER SEARCH BOX -->
                <!-- BEGIN TOP NAVIGATION MENU -->

                <!-- END TOP NAVIGATION MENU -->
            </div>
            <!-- END PAGE TOP -->
        </div>
        <!-- END HEADER INNER -->
    </div>
    <!-- END HEADER -->
    <div class="clearfix">
    </div>
    <!-- BEGIN CONTAINER -->
    <div class="page-container">

        <div class="row">
            <div class="col-md-12">
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption">DANH SÁCH TÀI KHOẢN SỬ DỤNG PHẦN MỀM</div>
                        <div class="actions">
                            <div class="actions">

                            </div>
                        </div>
                    </div>
                    <div class="portlet-body form-horizontal">
                        <div class="row">
                            <div class="form-group">
                                <label class="control-label col-md-3">Địa bàn, khu vực </label>
                                <div class="col-md-5">
                                    {!! Form::select('mahuyen',$a_diaban,$inputs['mahuyen'], array('id' => 'mahuyen', 'class' => 'form-control'))!!}
                                </div>
                            </div>
                        </div>
                        <table id="sample_3" class="table table-hover table-striped table-bordered" style="min-height: 100%">
                            <thead>
                            <tr>
                                <th class="text-center" style="width: 4%">STT</th>
                                <th class="text-center">Tên đơn vị</th>
                                <th class="text-center">Tên tài khoản</th>
                                <th class="text-center">Tên đăng nhập</th>
                                <th class="text-center">Phân loại</th>
                                <th class="text-center">Trạng thái</th>
                                <th class="text-center">Thao tác</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($model))
                                @foreach($model as $key=>$value)
                                    <tr data-id="{{$value->madv}}">
                                        <td class="text-center">{{$key+1}}</td>
                                        <td>{{$value->name}}</td>
                                        <td>{{$value->tendv}}</td>
                                        <td>{{$value->username}}</td>
                                        <td>{{$value->phanloaitaikhoan}}</td>
                                        <td class="text-center">{{$value->status}}</td>
                                        <td>
                                            <a href="{{url('/?user='.$value->username)}}" class="btn btn-info btn-xs mbs">
                                                <i class="fa fa-edit"></i>&nbsp; Đăng nhập</a>
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

        <script>

            $(function(){
                $('#mahuyen').change(function() {
                    window.location.href = 'danh_sach_tai_khoan?mahuyen='+$('#mahuyen').val();
                });
            })
        </script>

    </div>
    <!-- END CONTAINER -->
    <!-- BEGIN FOOTER -->
    <div class="page-footer">
        <div class="page-footer-tools">
            2016 &copy; LifeSoft <a href="" >Tiện ích hơn - Hiệu quả hơn</a>
            <!--Số đăng ký bản quyền: 282/2015/QTG, Khai Thác và Phần Phối bởi H2SOFT-->
        </div>
        <div class="scroll-to-top">
            <i class="icon-arrow-up"></i>
        </div>
    </div>
    <!-- END FOOTER -->
    <!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
    <!-- BEGIN CORE PLUGINS -->
    <!--[if lt IE 9]>
    <script src="{{url('assets/global/plugins/respond.min.js')}}"></script>
    <script src="{{url('assets/global/plugins/excanvas.min.js')}}"></script>
    <![endif]-->

    <!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
    <script src="{{ url('js/main.js') }}" type="text/javascript"></script>
    <script src="{{url('assets/global/plugins/jquery-ui/jquery-ui.min.js')}}" type="text/javascript"></script>
    <script src="{{url('assets/global/plugins/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
    <script src="{{url('assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js')}}" type="text/javascript"></script>
    <script src="{{url('assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
    <script src="{{url('assets/global/plugins/jquery.blockui.min.js')}}" type="text/javascript"></script>
    <script src="{{url('assets/global/plugins/jquery.cokie.min.js')}}" type="text/javascript"></script>
    <script src="{{url('assets/global/plugins/uniform/jquery.uniform.min.js')}}" type="text/javascript"></script>
    <script src="{{url('assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}" type="text/javascript"></script>
    <!-- END CORE PLUGINS -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="{{url('assets/global/plugins/jquery-validation/js/jquery.validate.min.js')}}" type="text/javascript"></script>
    <script src="{{url('assets/global/plugins/jquery-validation/js/additional-methods.min.js')}}" type="text/javascript"></script>
    <script src="{{url('assets/global/plugins/jquery.pulsate.min.js')}}" type="text/javascript"></script>
    <script src="{{url('assets/global/plugins/bootstrap-daterangepicker/moment.min.js')}}" type="text/javascript"></script>
    <script src="{{url('assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js')}}" type="text/javascript"></script>
    <!-- IMPORTANT! fullcalendar depends on jquery-ui.min.js for drag & drop support -->
    <script src="{{url('assets/global/plugins/fullcalendar/fullcalendar.min.js')}}" type="text/javascript"></script>
    <script src="{{url('assets/global/plugins/bootstrap-toastr/toastr.min.js')}}"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="{{url('assets/global/scripts/metronic.js')}}" type="text/javascript"></script>
    <script src="{{url('assets/admin/layout4/scripts/layout.js')}}" type="text/javascript"></script>
    <script src="{{url('assets/admin/layout4/scripts/demo.js')}}" type="text/javascript"></script>
    <script src="{{url('assets/admin/pages/scripts/tasks.js')}}" type="text/javascript"></script>

    <script type="text/javascript" src="{{url('assets/global/plugins/select2/select2.min.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/global/plugins/datatables/media/js/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js')}}"></script>

    <script src="{{url('assets/admin/pages/scripts/table-managed.js')}}"></script>
    <script>
        jQuery(document).ready(function() {
            TableManaged.init();
        });
    </script>

    <!-- END PAGE LEVEL SCRIPTS -->
    <script>
        jQuery(document).ready(function() {
            Metronic.init(); // init metronic core componets
            Layout.init(); // init layout
            Demo.init(); // init demo features
        });
    </script>
    <!-- END JAVASCRIPTS -->
    </body>
    <!-- END BODY -->
    </html>