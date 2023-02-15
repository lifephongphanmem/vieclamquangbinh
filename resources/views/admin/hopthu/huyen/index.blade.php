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
                        <h3 class="card-label text-uppercase">Hộp thư</h3>
                    </div>
                    <div class="card-toolbar">
                        <a title="Gửi văn bản" data-target="#modify-modal-confirm" data-toggle="modal"
                            class="btn btn-sm btn-success" onclick="guivanban()">
                            <i class="fa fa-plus"></i> Gửi văn bản
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    {{-- <div  style="margin-bottom: 0.5% ">
                        <div  style="text-align: center">
                            <form class="form-inline" method="GET">
                                <label>Tình trạng</label>
                                <select class="form-control w-sm inline v-middle" name="state_filter"
                                    onchange="this.form.submit()">
                                    <option value="0">Tất cả</option>
                                    <option value="1" <?php if ($state_filter == 1) {
                                        echo 'selected';
                                    } ?>>Đã gửi</option>
                                    <option value="2"<?php if ($state_filter == 2) {
                                        echo 'selected';
                                    } ?>>Đã nhận</option>
                                </select>
                            </form>
                        </div>

                    </div> --}}



                    <div class="panel-body">
						<table id="sample_3" class="table table-striped table-bordered table-hover dataTable no-footer">
                            <thead>
                                <td width="5%">STT</td>
                                <td width="20%"> Tiêu đề</td>
                                <td width="40%"> Nội dung</td>
                                <td width="10%"> File đính kèm</td>
                                <td width="10%">Thời gian gửi</td>
                                <td width="10%">Loại thư</td>
                                <td width="15%">Thao tác</td>

                            </thead>
                            <tbody>
                                @foreach ($model as $key=>$ct )
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td>{{$ct->tieude}}</td>
                                        <td>{{$ct->noidung}}</td>
                                        <td><a href="{{asset($ct->file)}}" >Tải file</a></td>
                                        <td>{{getDayVn($ct->thoigiangui)}}</td>
                                        <td>{{$ct->loaithu}}</td>
                                        <td>

                                            <button title="Xóa thông tin" type="button"
                                            onclick="cfDel('{{'/hopthu/delete/'.$ct->id}}')"
                                            class="btn btn-sm btn-clean btn-icon" data-target="#delete-modal-confirm"
                                            data-toggle="modal">
                                            <i class="icon-lg flaticon-delete text-danger"></i>
                                        </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
		</div>
	</div>

                    <!--Model gửi văn bản-->
                    <div id="modify-modal-confirm" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
                        <form id="frmDanhsach" method="POST" action="{{'/hopthu/store'}}" accept-charset="UTF-8" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header modal-header-primary">
                                        <h4 id="modal-header-primary-label" class="modal-title">Thông tin văn bản</h4>
                                        <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label class="control-label">Đối tượng gửi</label>
                                            <select name="doituong" id="" class="form-control select2basic"
                                                style="width:100%">
                                                {{-- <option value="all">Tất cả</option>
                                                <option value="xa">Xã</option> --}}
                                                <option value="ttdvvl">TTDVVL</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label">Tiêu đề</label>
                                            <input type="text" name="tieude" class="form-control">
                                        </div>
                                            <div class="form-group">
                                                <label class="control-label">Nội dung</label>
                                                <textarea name="noidung"  rows="5" class="form-control"></textarea>
                                            </div>

                                        <div class="form-group">
                                            <label class="control-label">File đính kèm</label>
                                            <input type="file" name="file" class="form-control">
                                        </div>
                                        {{-- <input type="hidden" name='madv' id='madonvi'>
                                        <input type="hidden" name='kydieutra' id='ky_dieu_tra'> --}}
                                    </div>
            
                                    <div class="modal-footer">
                                        <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                                        <button type="submit" id="submit" name="submit" value="submit"
                                        class="btn btn-primary">Đồng
                                            ý</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                            <!--Model delete-->
        <div id="delete-modal-confirm" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
            <form id="frmDelete" method="GET" action="#" accept-charset="UTF-8" enctype="multipart/form-data">
                @csrf
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header modal-header-primary">
                            <h4 id="modal-header-primary-label" class="modal-title">Đồng ý xóa</h4>
                            <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                        </div>
                        <div class="modal-body">
                            <label> <b>Nếu xóa thì sẽ xóa tất cả dữ liệu liên quan</b></label>
                        </div>

                        <div class="modal-footer">
                            <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                            <button type="submit" onclick="subDel()" data-dismiss="modal" class="btn btn-primary">Đồng
                                ý</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    <script>
        function guivanban(){

        }

        function cfDel(url) {
                $('#frmDelete').attr('action', url);
            }

            function subDel() {
                $('#frmDelete').submit();
            }
    </script>
 @stop
