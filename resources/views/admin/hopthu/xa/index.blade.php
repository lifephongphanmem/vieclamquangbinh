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
        .message{
            background-color: #92d2df;
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
                            <i class="fa fa-plus"></i> Tạo văn bản
                        </a>
                    </div>
                </div>
                <div class="card-body">

                    <div class="panel-body">
						<table id="sample_3" class="table table-striped table-bordered table-hover dataTable no-footer">
                            <thead>
                                <td width="5%">STT</td>
                                <td width="20%"> Tiêu đề</td>
                                <td width="30%"> Nội dung</td>
                                <td width="10%"> File đính kèm</td>
                                <td width="8%">Thời gian gửi</td>
                                <td width="6%">Loại thư</td>
                                <td width="10%">Đon vị gửi</td>
                                <td width="15%">Thao tác</td>

                            </thead>
                            <tbody>
                                @foreach ($model as $key=>$ct )
                                <?php
                                if (isset($ct->isRead)) {
                                    # Thư của ttdvvl
                                    $class=$ct->isRead == 0?'message':'' ;
                                } else {
                                    if ($ct->trangthai == 'TRALAI' && $ct->status == 0) {
                                        $class='message';
                                    }elseif ($ct->trangthai == 'DAGUI') {
                                        
                                    # Thư các xã
                                    $class=$ct->status == 0 && $ct->loaithu =='Thư đến'?'message':'';
                                    }else {
                                        $class='';
                                    }
                                }
                                 
                                ?>
                                    <tr id="{{$ct->id}}" value='{{$ct->isRead}}' class="{{$class}}">
                                        <td class="{{$class}}">{{++$key}}</td>
                                        <td class="{{$class}}">
                                            @if ($class == 'message')
                                            <button style="border: none; background-color:transparent"> {{$ct->tieude}} </button>
                                        @else
                                        {{$ct->tieude}}
                                        @endif
                                        </td>
                                        <td name='noidung' class="{{$class}}">{{$ct->noidung}}</td>
                                        <td class="{{$class}}"><a href="{{asset($ct->file)}}" >Tải file</a></td>
                                        <td class="{{$class}}">{{getDayVn($ct->thoigiangui)}}</td>
                                        <td class="{{$class}}">{{$ct->loaithu}}</td>
                                        <td class="{{$class}}">{{$a_madv[$ct->madv]}}</td>
                                        <td class="text-center {{$class}}">
                                            @if (in_array($ct->trangthai,['CHUAGUI','TRALAI']) && $ct->dvnhan == null)
                                            <button onclick="send('{{$ct->id}}')" class="btn btn-sm btn-clean btn-icon" title="Gửi văn bản" data-target="#send-modal-confirm"
                                                data-toggle="modal"><i class=" fa fa-share-square text-success"></i></button> 
                                            @endif
                                            @if ($ct->trangthai == 'TRALAI' && $ct->matinh == null)
                                            <button onclick="lydo('{{$ct->id}}')" class="btn btn-sm btn-clean btn-icon" title="Lý do trả lại" data-target="#lydo-modal-confirm"
                                            data-toggle="modal"><i class=" fa fa-question-circle text-primary"></i></button>
                                            @endif
                                            @if ($ct->trangthai != 'DAGUI' && $ct->dvnhan == null)
                                            <button title="Xóa thông tin" type="button"
                                            onclick="cfDel('{{'/hopthu/delete/'.$ct->id}}')"
                                            class="btn btn-sm btn-clean btn-icon" data-target="#delete-modal-confirm-"
                                            data-toggle="modal">
                                            <i class="icon-lg flaticon-delete text-danger"></i>
                                            </button>
                                            @endif

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
                                                <option value="bchuyen">Huyện</option>
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
        <div id="delete-modal-confirm-" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
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

                                    <!--Model send-->
                                    <div id="send-modal-confirm" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
                                        <form id="frmsend" method="POST" action="#" accept-charset="UTF-8" enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header modal-header-primary">
                                                        <h4 id="modal-header-primary-label" class="modal-title">Đồng ý gửi</h4>
                                                        <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <label> <b>Sau khi gửi thì sẽ không chỉnh sửa được</b></label>
                                                    </div>
                            
                                                    <div class="modal-footer">
                                                        <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                                                        <button type="submit"   class="btn btn-primary">Đồng
                                                            ý</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                                                        <!--Model lydo-->
                                                                        <div id="lydo-modal-confirm" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
                                                                            {{-- <form id="frmsend" method="POST" action="#" accept-charset="UTF-8" enctype="multipart/form-data"> --}}
                                                                                @csrf
                                                                                <div class="modal-dialog">
                                                                                    <div class="modal-content">
                                                                                        <div class="modal-header modal-header-primary">
                                                                                            <h4 id="modal-header-primary-label" class="modal-title">Thông tin</h4>
                                                                                            <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                                                                        </div>
                                                                                        <div class="modal-body">
                                                                                            <label>Lý do trả lại</label>
                                                                                            <textarea name="lydo" id='lydo' rows="5" class="form-control" readonly></textarea>
                                                                                        </div>
                                                                
                                                                                        <div class="modal-footer">
                                                                                            <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                                                                                            {{-- <button type="submit"   class="btn btn-primary">Đồng
                                                                                                ý</button> --}}
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            {{-- </form> --}}
                                                                        </div>

    <script>
        function guivanban(){

        }
        function send(id){
            var url='/hopthu/xa/send/'+id;
            $('#frmsend').attr('action', url);
        }

        function cfDel(url) {
                $('#frmDelete').attr('action', url);
            }

            function subDel() {
                $('#frmDelete').submit();
            }

            function lydo(id){
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                url: '/hopthu/xa/lydo/'+id,
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    // id: id
                },
                dataType: 'JSON',
              
                success: function(data) {
                    // $('#vt').remove();
                    $('#lydo').val(data.lydo);

                },
                error: function(message) {
                    toastr.error(message, "Lỗi")
                }
            });
            }
            // function checktn(id,isRead =null){
            //     var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            //     console.log(isRead);
            //     $.ajax({
            //     url: '/hopthu/check/'+id,
            //     type: 'GET',
            //     data: {
            //         _token: CSRF_TOKEN,
            //         isRead: isRead
            //     },
            //     dataType: 'JSON',
              
            //     success: function(data) {
            //         console.log(data);
            //         location.reload()

            //     },
            //     error: function(message) {
            //         toastr.error(message, "Lỗi")
            //     }
            // });
            // }

            $('#sample_3 tr').click(function () {
               var tr = $(this).closest('tr');
               var noidung=$(tr).find('td[name=noidung]').text();
               var id = $(this).closest('tr').attr('id')
               var isRead = $(this).closest('tr').attr('value')
               var hasclass=$(this).closest('tr').hasClass("message");
               if(hasclass == true){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                // console.log(isRead);
                $.ajax({
                url: '/hopthu/check/'+id,
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    isRead: isRead
                },
                dataType: 'JSON',
              
                success: function(data) {
                    console.log(data);
                    location.reload()

                },
                error: function(message) {
                    toastr.error(message, "Lỗi")
                }
            });
               };
            });
    </script>
 @stop
