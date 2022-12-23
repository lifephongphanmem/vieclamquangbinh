@extends('main')
@section('custom-style')
    <link rel="stylesheet" type="text/css"
        href="{{ url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css') }}" />
    {{-- <link rel="stylesheet" type="text/css" href="{{ url('assets/global/plugins/select2/select2.css') }}" /> --}}
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
                        DANH SÁCH CÁC VĂN BẢN
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <ol>
                                    <li>
                                        <a href="{{ '/vanban/thong_tin_cung_lao_dong' }}" target="_blank">Mẫu số
                                            01a. Thông tin về cung lao động</a>
                                    </li>
                                    <li>
                                        <a href="{{ '/vanban/thong_tin_nhu_cau_tuyen_dung' }}" target="_blank">Mẫu
                                            số 02.
                                            Thông tin nhu cầu tuyển dụng lao động của người sử dụng lao động</a>
                                    </li>
                                    <li>
                                        <a href="{{ '/vanban/thong_tin_nguoi_lao_dong_nuoc_ngoai' }}"
                                            target="_blank">Mẫu số 03. Thông tin người lao động nước ngoài làm việc tại Việt
                                            Nam</a>
                                    </li>
                                    <li>
                                        <a href="{{ '/vanban/tinh_hinh_su_dung_lao_dong' }}" target="_blank">Mẫu
                                            số
                                            03a/PLI. Báo cáo tình hình sử dụng lao động (do người sử dụng lao động lập)</a>
                                    </li>

                                </ol>

                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>


    {{-- @include('reports.baocaotonghop.modal') --}}


@endsection
