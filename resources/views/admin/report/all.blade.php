{{-- @extends ('admin.layout') --}}
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

            $('#type_filter').change(function() {
                window.location.href = "{{ $inputs['url'] }}" + '?type_filter=' + $('#type_filter').val() +
                    '&tungay=' + $('#tungay').val() + '&denngay=' + $('#denngay').val();
            });

            $('#tungay').change(function() {
                window.location.href = "{{ $inputs['url'] }}" + '?type_filter=' + $('#type_filter').val() +
                    '&tungay=' + $('#tungay').val() + '&denngay=' + $('#denngay').val();
            });
            $('#denngay').change(function() {
                window.location.href = "{{ $inputs['url'] }}" + '?type_filter=' + $('#type_filter').val() +
                    '&tungay=' + $('#tungay').val() + '&denngay=' + $('#denngay').val();
            });
            $('#detail').onclick(function() {
                window.location.href = "{{ '/report-detail' }}" + '?user=' + $('#user').val() +
                    '&tungay=' + $('#tungay').val() + '&denngay=' + $('#denngay').val();
            });
        });
    </script>
@stop
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card card-custom">
                <div class="card-header card-header-tabs-line">
                    <div class="card-title">
                        <h3 class="card-label text-uppercase">Danh sách khai báo</h3>
                    </div>
                    <div class="card-toolbar">
                        <a onclick="indoanhnghiep()" data-target="#Report_in_doanhnghiep" data-toggle="modal"
                            class="btn btn-xs btn-success"><i class="icon-lg la flaticon2-print text-primary"></i>
                            &ensp;In danh sách</a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="form-group row">

                        <div class="col-md-4">
                            <label>Từ ngày</label>
                            <input type="date" class="form-control" name='tungay' id="tungay"
                                value="{{ $tungay }}">
                        </div>
                        <div class="col-md-4">
                            <label for="">Đến ngày</label>
                            <input type="date" class="form-control" name='denngay' id="denngay"
                                value="{{ $denngay }}">
                        </div>
                        <div class="col-md-4">

                            {{-- <div class="col-sm-2 m-b-xs"> --}}
                            <label for="">Loại khai báo</label>
                            <select class=" form-control select2basic" name="type_filter" id="type_filter"
                                onchange="this.form.submit()">
                                <option value="0">Tất cả khai báo</option>
                                <option value="baotang" <?php if ($type_filter == 'baotang') {
                                    echo 'selected';
                                } ?>>Báo tăng</option>
                                <option value="baogiam"<?php if ($type_filter == 'baogiam') {
                                    echo 'selected';
                                } ?>>Báo giảm</option>
                                <option value="tamdung"<?php if ($type_filter == 'tamdung') {
                                    echo 'selected';
                                } ?>>Tạm dừng</option>
                                <option value="kethuctamdung"<?php if ($type_filter == 'kethuctamdung') {
                                    echo 'selected';
                                } ?>>Kết thúc tạm dừng</option>
                                <option value="updateinfo"<?php if ($type_filter == 'updateinfo') {
                                    echo 'selected';
                                } ?>>Thay đổi thông tin</option>
                                <option value="chuakhaibao"<?php if ($type_filter == 'chuakhaibao') {
                                    echo 'selected';
                                } ?>>Chưa khai báo</option>
                            </select>
                            {{-- </div> --}}
                        </div>
                        {{-- </form> --}}
                    </div>

                    <table id="sample_3" class="table table-striped table-bordered table-hover dataTable no-footer">
                        <thead>
                            <tr class="text-center">
                                <th rowspan="2" width="5%"> STT </th>
                                <th rowspan="2">Công ty</th>
                                <th colspan="5" style="text-align: center">Khai báo</th>
                                <th rowspan="3" width="8%" class="text-center">Thao tác</th>

                            </tr>
                            <tr class="text-center">
                                <th width="10%">Báo tăng</th>
                                <th width="10%">Báo giảm</th>
                                <th width="10%">Tạm dừng</th>
                                <th width="11%">Kết thúc tạm dừng</th>
                                <th width="10%">Không biến động</th>
                            </tr>
                            <tr class="text-center" style="font-weight: bold">
                                <th>Tổng</th>
                                <th> {{ dinhdangso( $model_congty->count()) }} </th>
                                <th> {{ dinhdangso($type_filter == 'chuakhaibao' ? 0 : $reports->where('type','baotang')->count()) }}  </th>
                                <th> {{dinhdangso($type_filter == 'chuakhaibao' ? 0 : $reports->where('type','baogiam')->count()) }} </th>
                                <th> {{ dinhdangso($type_filter == 'chuakhaibao' ? 0 :$reports->where('type','tamdung')->count()) }} </th>
                                <th> {{ dinhdangso($type_filter == 'chuakhaibao' ? 0 :$reports->where('type','kethuctamdung')->count()) }} </th>
                                <th> {{ dinhdangso($type_filter == 'chuakhaibao' ? 0 :$reports->where('type','nothing')->count()) }} </th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php 
		                    foreach ($model_congty as $key=>$rp ){ ?>
                            <tr>
                                <?php $report = $reports->where('user',$rp->user); ?>
                                <td>{{ ++$key }}</td>
                                <td id="detail"><a
                                        href="{{ URL::to('/report-detail?user=' . $rp->user . '&tungay=' . $tungay . '&denngay=' . $denngay . '&type_filter=' . $type_filter) }}">{{ $rp->name }}</a>
                                </td>
                                <td class="text-center">{{ dinhdangso($report->where('type','baotang')->Count()) }}</td>
                                <td class="text-center">{{ dinhdangso($report->where('type','baogiam')->Count()) }}</td>
                                <td class="text-center">{{ dinhdangso($report->where('type','tamdung')->Count()) }}</td>
                                <td class="text-center">{{ dinhdangso($report->where('type','kethuctamdung')->Count()) }}</td>
                                <td class="text-center">{{ dinhdangso($report->where('type','nothing')->Count()) }}</td>
                                <td class="text-center"><a onclick="intonghop('{{ $rp->user }}')" title="In báo cáo chi tiết"
                                        class="btn btn-sm btn-clean btn-icon" data-target="#Report_in_tonghop"
                                        data-toggle="modal">
                                        <i class="icon-lg la flaticon2-print text-primary"></i>
                                    </a>

                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>


    {{-- modal tổng hợp --}}
    <div class="modal fade" id="Report_in_tonghop" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{ '/report-in-tonghop' }}" id="in_tonghop" target="_blank" id="frm_report">
                <input id="id" name="id" hidden >
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="card-label">
                            Tổng hợp biến động trong doanh nghiệp
                        </h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-xl-12">
                                <label><b>Chọn thời điểm</b></label>
                                <div class="radio-inline">
                                    <label class="radio">
                                        <input type="radio" id="radio1" name="time" value="thang" checked />
                                        <span></span>
                                        Theo tháng
                                    </label>
                                    <label class="radio">
                                        <input type="radio" id="radio2" name="time" value="quy" />
                                        <span></span>
                                        Theo quý
                                    </label>
                                    <label class="radio">
                                        <input type="radio" id="radio3" name="time" value="nam" />
                                        <span></span>
                                        Theo năm
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div id="option1">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <label><b>Chọn tháng</b></label>
                                          <?php $thang = date('m') ?>
                                        <select class="form-control" name="thang" id="thang">
                                            @for ($month = 1; $month <= 12; $month++)
                                                <option value="{{ $month }}" {{$month == date('m') ? 'selected' : ''}}>Tháng {{ $month }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="option2" style="display: none">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <label><b>Chọn quý</b></label>
                                        <select class="form-control" name="quy" id="quy">
                                            <option value="1" {{$thang==1 || $thang ==2 || $thang == 3 ? 'selected' : ''}}>Quý 1 ( Tháng 1,2,3 ) </option>
                                            <option value="2" {{$thang==4 || $thang ==5 || $thang == 6 ? 'selected' : ''}}>Quý 2 ( Tháng 4,5,6 ) </option>
                                            <option value="3" {{$thang==7 || $thang ==8 || $thang == 9 ? 'selected' : ''}}>Quý 3 ( Tháng 7,8,9 ) </option>
                                            <option value="4" {{$thang==10 || $thang ==11 || $thang == 12 ? 'selected' : ''}}>Quý 4 ( Tháng 10,11,12 ) </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="option3">
                             <div class="row">
                            <div class="col-xl-12">
                                <div class="form-group">
                                    <label><b>Chọn năm</b></label>
                                    <select class="form-control" name="nam" id="nam">
                                        <?php
                                            $nam_start = Date('Y');
                                            $nam_stop = Date('Y') -5;
                                            for ($year = $nam_start; $year >= $nam_stop; $year--)
                                            { ?>

                                        <option value="{{ $year }}">Năm {{ $year }}</option>

                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-danger font-weight-bold" data-dismiss="modal">Hủy
                            thao tác</button>
                        <button type="submit" class="btn btn-primary font-weight-bold">Đồng ý</button>

                    </div>
                </div>
            </form>
        </div>
    </div>
    {{-- modal doanh nghiệp --}}

    <div class="modal fade" id="Report_in_doanhnghiep" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{ '/report-in-doanhnghiep' }}" id="in_doanhnghiep" target="_blank" id="frm_report">

                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="card-label">
                            Danh sách doanh nghiệp
                        </h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input id="tungay_dn" name="tungay_dn" hidden>
                        <input id="denngay_dn" name="denngay_dn" hidden>
                        <div class="row">
                            <div class="col-xl-12">
                                <label><b>Chọn phân loại</b></label>
                                <select id="loai" name="loai" class="form-control">
                                    <option value="kb">Đã thực hiện khai báo</option>
                                    <option value="kkb">Không thực hiện khai báo</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-danger font-weight-bold" data-dismiss="modal">Hủy
                            thao tác</button>
                        <button type="submit" class="btn btn-primary font-weight-bold">Đồng ý</button>

                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        function indoanhnghiep() {
            var form = $('#in_doanhnghiep').find("[name='tungay_dn']").val($('#tungay').val());
            var form = $('#in_doanhnghiep').find("[name='denngay_dn']").val($('#denngay').val());
        }

        function intonghop(id) {
            var form = $('#in_tonghop').find("[name='id']").val(id);
        }

        $(document).ready(function() {

            $("#radio1").click(function() {
                if (this.checked) {

                    $("#option2").css("display", "none");
                    $("#option1").css("display", "block");
                }
            });

            $("#radio2").click(function() {
                if (this.checked) {
                    $("#option1").css("display", "none");

                    $("#option2").css("display", "block");
                }
            });

            $("#radio3").click(function() {
                if (this.checked) {
                    $("#option1").css("display", "none");
                    $("#option2").css("display", "none");
                    $("#option3").css("display", "block");
                }
            });
        });
    </script>
@endsection
