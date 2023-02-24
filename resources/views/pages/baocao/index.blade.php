@extends('main')
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
    <div class="row">
        <div class="col-xl-12">
            <div class="card card-custom">
                <div class="card box">
                    <div class="card-header">
                        DANH SÁCH BÁO CÁO
                    </div>
                    <div class="card-body" style="height:500px">
                        <div class="row">
                            <div class="col-lg-12">
                                <ol>
                                        <li><a href="{{'/doanhnghiep/mau01pli/'.session('admin')->company_id.'?user='.session('admin')->id}}" target="_blank">Mẫu 01/PLI</a>
                                        </li>

                                        {{-- <li><a href="#" data-target="#doanhnghiep-modal" data-toggle="modal">Mẫu số
                                        01/PLI.
                                        Báo cáo tình hình sử dụng lao động (do người sử dụng lao động lập)</a>
                                    </li> --}}
                                        {{-- <li><a href="#" data-target="#solaodongtbxh-modal" data-toggle="modal">Mẫu số
                                            02/PLI. Báo cáo tình hình sử dụng lao động (do Sở Lao động - Thương binh và Xã
                                            hội lập)</a>
                                    </li>
                                    <li>
                                        <a href="" data-target="#cungxahuyen-modal" data-toggle="modal" >Mẫu số 04a. Báo
                                            cáo tổng hợp về thông tin về cung lao động ( dành cho cấp xã và cấp huyện)</a>
                                    </li>
                                    <li>
                                        <a href="#" data-target="#thitruongld-modal" data-toggle="modal">Mẫu số
                                            04. Báo cáo về thông tin thị trường lao động</a>
                                    </li> --}}
                                        {{-- <hr>
                                    <li>
                                        <a href="{{ 'bao_cao_tong_hop/thong_tin_cung_lao_dong' }}" target="_blank">Mẫu số
                                            01a. Thông tin về cung lao động</a>
                                    </li> --}}
                                        {{-- <li>
                                        <a href="{{ 'bao_cao_tong_hop/ds_thong_tin_cung_ld' }}" target="_blank">Mẫu số
                                            01b. Tổng hợp danh sách thông tin về cung lao động (A3)</a>
                                    </li> --}}
                                        {{-- <li>
                                        <a href="{{ 'bao_cao_tong_hop/thong_tin_nhu_cau_tuyen_dung' }}" target="_blank">Mẫu
                                            số 02.
                                            Thông tin nhu cầu tuyển dụng lao động của người sử dụng lao động</a>
                                    </li>
                                    <li>
                                        <a href="{{ 'bao_cao_tong_hop/thong_tin_nguoi_lao_dong_nuoc_ngoai' }}"
                                            target="_blank">Mẫu số 03. Thông tin người lao động nước ngoài làm việc tại Việt
                                            Nam</a>
                                    </li>
                                    <li>
                                        <a href="{{ 'bao_cao_tong_hop/tinh_hinh_su_dung_lao_dong' }}" target="_blank">Mẫu
                                            số
                                            03a/PLI. Báo cáo tình hình sử dụng lao động (do người sử dụng lao động lập)</a>
                                    </li> --}}

                                </ol>

                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>






    {{-- @include('reports.baocaotonghop.modal') --}}
    <script>
        function intonghop() {
            var url = '/dieutra/intonghop'
            $('#frm_modify_xa').attr('action', url);
        }
    </script>

@endsection
