@extends ('main')
@section('custom-style')
    <link rel="stylesheet" type="text/css"
        href="{{ url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css') }}" />
    <style>
        .col-md-3 {
            float: left;
        }

        .wrapper {
            margin-top: 0px;
            padding: 0px 15px;
        }

		table.table-bordered th:last-child, table.table-bordered td:last-child {
    border-right: none !important;
}
    </style>
@stop

@section('custom-script')
    <script type="text/javascript" src="{{ url('assets/global/plugins/datatables/media/js/jquery.dataTables.min.js') }}">
    </script>
    <script type="text/javascript"
        src="{{ url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js') }}"></script>

    <script src="{{ url('assets/admin/pages/scripts/table-lifesc.js') }}"></script>
    <script>
        jQuery(document).ready(function() {
            TableManaged3.init();
        });
    </script>
@stop

@section('content')
    {{-- <section class="panel">
        <header class="panel-heading">
            {{ $info->name }}
        </header> --}}
    <div class="row">
        <div class="col-xl-12">
            <div class="card card-custom">
                <div class="card-header card-header-tabs-line">
                    <div class="card-title mt-5">
                        <h3 class="card-label text-uppercase">{{ $info->name }}</h3>
                    </div>
                    {{-- <div class="panel-body"> --}}
                    {{-- <div class="row ">
                <div class="col-sm-10 col-sm-offset-1">
                    <div class="top-menu">
                        @include('admin.dnmenu')
                        @yield('top-menu')
                    </div>
                </div>
            </div> --}}
                    <div class="card-body">
                        <div class="row ">
                            <div class="text-center" style="margin: 0 auto">
                                <h3 class="text-center">B??O C??O </h3><br>
                                <h3>T??NH H??NH S??? D???NG LAO ?????NG </h3>
                                <br>
                            </div>
                        </div>

                        <table class="table table-bordered centered">
                            <thead>
                                <tr>
                                    <th colspan=4>T???ng s??? lao ?????ng ???????c s??? d???ng</th>
                                    <th colspan=4>V??? tr?? vi???c l??m </th>
                                    <th colspan=3>Lo???i v?? hi???u l???c h???p ?????ng lao ?????ng</th>
                                </tr>
                                <tr>
                                    <th>T???ng</th>
                                    <th>N??? </th>
                                    <th>Tr??n 35 tu???i</th>
                                    <th>Tham gia BHXH b???t bu???c</th>
                                    <th>Nh?? qu???n l?? </th>
                                    <th>Chuy??n m??n k??? thu???t b???c cao</th>
                                    <th>Chuy??n m??n k??? thu???t b???c trung</th>
                                    <th>Kh??c</th>
                                    <th>S??? lao ?????ng tham gia H??L?? kh??ng x??c ?????nh th???i h???n</th>
                                    <th>S??? lao ?????ng tham gia H??L?? x??c ?????nh th???i h???n</th>
                                    <th>S??? lao ?????ng tham gia H??L?? kh??c (d?????i 1 th??ng, th??? vi???c)</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>

                                    <td>{{ $einfo['tong'] }}</td>
                                    <td>{{ $einfo['nu'] }}</td>
                                    <td>{{ $einfo['age'] }}</td>
                                    <td>{{ $einfo['bhxh'] }}</td>
                                    <td>{{ $einfo['quanly'] }}</td>
                                    <td>{{ $einfo['cmktcao'] }}</td>
                                    <td>{{ $einfo['cmkttrung'] }}</td>
                                    <td>{{ $einfo['tong'] - $einfo['quanly'] - $einfo['cmktcao'] - $einfo['cmkttrung'] }}
                                    </td>
                                    <td>{{ $einfo['hdkhongthoihan'] }}</td>
                                    <td>{{ $einfo['hdcothoihan'] }}</td>
                                    <td>{{ $einfo['tong'] - $einfo['hdkhongthoihan'] - $einfo['hdcothoihan'] }}</td>
                                </tr>

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- </section> --}}
@endsection
