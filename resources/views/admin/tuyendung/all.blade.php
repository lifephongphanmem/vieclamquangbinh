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
        });
    </script>
@stop
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card card-custom">
                <div class="card-header card-header-tabs-line">
                    <div class="card-title">
                        <h3 class="card-label text-uppercase">Danh sách tuyển dụng</h3>
                    </div>
                </div>
                <div class="card-body">
                    <form class="form-inline" method="GET">
                        <div class="row col-xl-4" style="margin-bottom: 1%">
                            {{-- <div class="col-xl-2 ">
                                <select class="form-control select2basic" name="dm_filter" onchange="this.form.submit()">
                                    <option value="0">Chọn huyện</option>
                                    <?php foreach ($dmhc_list as $dm) {?>
                                    <option value="{{ $dm->maquocgia }}" <?php if ($dm_filter == $dm->maquocgia) {
                                        echo 'selected';
                                    } ?>>{{ $dm->name }}</option>
                                    <?php } ?>

                                </select>
                            </div> --}}

                            {{-- <div class="col-xl-2 " style="margin-left: 30%"> --}}
                                <div class="col-xl-2 " >
                                <select class=" form-control select2basic" name="public_filter"
                                    onchange="this.form.submit()">
                                    <option value="0">Tình trạng </option>
                                    <option value="1" <?php if ($public_filter == 1) {
                                        echo 'selected';
                                    } ?>>Đã duyệt</option>
                                    <option value="2"<?php if ($public_filter == 2) {
                                        echo 'selected';
                                    } ?>>Đã báo cáo</option>

                                </select>
                            </div>

                        </div>
                    </form>
                    <table id="sample_3" class="table table-striped table-bordered table-hover dataTable no-footer">
                        <thead>
                            <tr>
                                <th style="width:20px;">
                                    STT
                                </th>
                                <th>Doanh nghiệp</th>
                                <th>Tên công việc</th>
                                <th>Vị trí</th>
                                <th>Số lượng</th>
                                <th>Ngày đăng</th>
                                <th>Hạn cuối</th>
                                <th>Duyệt</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 

		foreach ($tds as $key=>$td ){
			
	?>
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $td->name }}</td>
                                <td><a href="{{ URL::to('tuyendung-be') . '/' . $td->id }}">{{ $td->noidung }} </a></td>
                                <td>{{ $td->desc }}</td>
                                <td><span
                                        class="text-ellipsis">{{ ($td->datuyentutt != null?$td->datuyentutt:0)  . '/' . ($td->datuyen!= null?$td->datuyen:0) . '/' . $td->sltuyen }}</span>
                                </td>
                                <td><span class="text-ellipsis">{{ date('d-m-Y', strtotime($td->created_at)) }}</span></td>
                                <td><span class="text-ellipsis">{{ date('d-m-Y', strtotime($td->thoihan)) }} </span></td>
                                <td><span class="text-ellipsis">
                                        <?php if ($td->state==0){ 
				?>
                                        <a href="{{ URL::to('tuyendung-bu') . '/' . $td->id }}" ui-toggle-class="">
                                            <i class="fa fa-check text-success text-active"></i>
                                            Duyệt
                                        </a>
                                        <?php }elseif($td->state==1){ echo "Đã duyệt"; }
					else { echo "Đã báo cáo";}
					?>
                                    </span>
                                </td>
                                <td>
                                    <button onclick="inmau('{{$td->id}}')" title="In mẫu" data-target="#inmau" data-toggle="modal"
                                        class="btn btn-sm btn-clean btn-icon"><i class="icon-lg la flaticon2-print text-primary"></i></button>
                                    {{-- <button title="In thông tin giới thiệu cung ứng, mẫu 03a/pl1" type="button" data-target="#modal-inbaocao"
                                        data-toggle="modal" onclick="get_vitri('{{ $td->id }}')"
                                        class="btn btn-sm btn-clean btn-icon">
                                        <i class="icon-lg flaticon-list text-success"></i>
                                    </button>
                                    <a  href="{{ '/vanban/thong_tin_nhu_cau_tuyen_dung?id='.$td->id }}" title="In thông tin nhu cầu tuyển dụng, mẫu 02"
                                         class="btn btn-sm btn-clean btn-icon" target="_bank"> <i class="icon-lg la flaticon2-print text-primary"></i>
                                    </a> --}}
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

            <!-- Modal In báo cáo -->
            <div id="inmau" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
                    <div class="modal-dialog modal-content">
                        <div class="modal-header modal-header-primary">
                            <h4 id="modal-header-primary-label" class="modal-title">In mẫu
                            </h4>
                            <button type="button" data-dismiss="modal" aria-hidden="true"
                                class="close">&times;</button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" id='idtuyendung' name='idtuyendung'>
                            <a href="" id='mau02' target="_blank">1. Mẫu 02 - Thông tin nhu cầu tuyển dụng</a></br>
                            <a href="" onclick="get_vitri()" data-target="#modal-inbaocao" data-toggle="modal">2. Mẫu 03a/PLI</a>
                        </div>
                        <div class="modal-footer">
                            <button type="button" data-dismiss="modal"
                                class="btn btn-default">Đóng</button>
    
                        </div>
                    </div>

            </div>

        <!-- Modal In báo cáo -->
        <div id="modal-inbaocao" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
            <form action="{{ '/vanban/mauso_03a_pl1' }}" method="post" enctype="multipart/form-data"
                accept-charset="UTF-8" id="get-vitri">
                @csrf
                <div class="modal-dialog modal-content">
                    <div class="modal-header modal-header-primary">
                        <h4 id="modal-header-primary-label" class="modal-title">Phiếu đăng ký giới thiệu/cung ứng lao động
                            03a/PLI.
                        </h4>
                        <button type="button" data-dismiss="modal" aria-hidden="true"
                            class="close">&times;</button>
                    </div>
                    <div class="modal-body" id='vitri'>

                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal"
                            class="btn btn-default">Đóng</button>

                    </div>
                </div>
            </form>
        </div>
    <script>
        function get_vitri() {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            var id=$('#idtuyendung').val();
            $.ajax({
                url: '/tuyendung-get_vitri',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    id: id
                },
                dataType: 'JSON',
              
                success: function(data) {
                    $('#vt').remove();
                    $('#vitri').append(data);

                },
                error: function(message) {
                    toastr.error(message, "Lỗi")
                }
            });
        }
        function inmau(id){
            $('#idtuyendung').val(id);
            var url='/vanban/thong_tin_nhu_cau_tuyen_dung?id='+id;
            $('#mau02').attr('href', url);
            
        }

    </script>
@endsection
