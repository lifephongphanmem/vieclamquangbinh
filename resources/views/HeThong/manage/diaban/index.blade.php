@extends('main')
@section('custom-style')
    <link rel="stylesheet" type="text/css"
        href="{{ url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css') }}" />
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

          <!--begin::Row-->
    <div class="row">
        <div class="col-xl-12">
            <!--begin::Example-->
            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-header card-header-tabs-line">
                    <div class="card-title">
                        <h3 class="card-label text-uppercase">Danh sách địa bàn</h3>
                    </div>
                    <div class="card-toolbar">
                        @if (chkPhanQuyen('diaban', 'thaydoi'))
                        <button type="button" onclick="add()" class="btn btn-success btn-sm" data-target="#modify-modal"
                            data-toggle="modal" title="Thêm mới">
                            <i class="fa fa-plus"></i>Thêm mới</button>
                            @endif
                        {{-- <button class="btn btn-xs btn-icon btn-success mr-2" title="Nhận dữ liệu từ file Excel"
                            data-target="#modal-nhanexcel" data-toggle="modal">
                            <i class="fas fa-file-import"></i>
                        </button> --}}
                    </div>
                </div>
                <div class="card-body">
                    <table id="sample_3" class="table table-striped table-bordered table-hover dataTable no-footer">
                        <thead>
                            <tr class="text-center">
                                <th colspan="3">STT</th>
                                <th rowspan="2">Mã địa bàn</th>
                                <th rowspan="2">Tên địa bàn</th>
                                {{-- <th rowspan="2">Đơn vị quản lý địa bàn</th> --}}
                                <th rowspan="2">Thao tác</th>

                            </tr>
                            <tr class="text-center">
                                <th width=3%>T</th>
                                <th width=3%>H</th>
                                <th width=3%>X</th>
                                {{-- <th width=3%>Th</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            <?php menudiaban($model)?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!--end::Card-->
            <!--end::Example-->
        </div>
    </div>
    <!--end::Row-->

    @include('includes.delete')

    <form method="POST" action="" accept-charset="UTF-8" id="frm_modify">
        @csrf
        <div id="modify-modal" tabindex="-1" class="modal fade kt_select2_modal" style="display: none;"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header modal-header-primary">
                        <h4 id="modal-header-primary-label" class="modal-title">Thông tin địa bàn quản lý</h4>
                        <button type="button" data-dismiss="modal" aria-hidden="true" class="close">×</button>
                    </div>
                    <div class="modal-body" data-select2-id="148">
                        <div class="form-horizontal" data-select2-id="147">
                            <div class="row form-group">
                                <div class="col-lg-4">
                                    <label class="control-label">Mã địa bàn</label>
                                    <input class="form-control" name="maquocgia" type="text" id="madb">
                                </div>

                                <div class="col-lg-8">
                                    <label class="control-label">Tên địa bàn<span class="require">*</span></label>
                                    <input class="form-control" required="required" name="name" type="text"
                                        id="name">
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-lg-6">
                                    <label class="control-label">Phân loại</label>
                                    <select class="form-control select2me" name="level" id="level">
                                        <option value="Tỉnh">Tỉnh</option>
                                        <option value="Thành phố">Thành phố</option>
                                        <option value="Huyện">Huyện</option>
                                        <option value="Thị xã">Thị xã</option>
                                        <option value="Phường">Phường</option>
                                        <option value="Xã">Xã</option>
                                        <option value="Thị trấn">Thị trấn</option>
                                        <option value="Thôn">Thôn/Xóm</option>
                                    </select>
                                </div>
                                <div class="col-lg-6">
                                    <label class="control-label">Trực thuộc địa bàn</label>
                                    <select class="form-control select2me " name='parent' id='parent'>
                                        <option value="">Không chọn</option>
                                        @foreach ($model as $value )
                                        <option value="{{$value->maquocgia}}">{{ $value->name }}</option>
                                        @endforeach
                                            
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="edit" id='edit'>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                        <button type="submit" id="submit" name="submit" value="submit"
                            class="btn btn-primary">Đồng
                            ý</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!--thêm địa bàn trực thuộc-->
    <form method="POST" action="" accept-charset="UTF-8" id="frm_modify_th">
        @csrf
        <div id="modify-modal-th" tabindex="-1" class="modal fade kt_select2_modal" style="display: none;"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header modal-header-primary">
                        <h4 id="modal-header-primary-label" class="modal-title">Thông tin địa bàn quản lý</h4>
                        <button type="button" data-dismiss="modal" aria-hidden="true" class="close">×</button>
                    </div>
                    <div class="modal-body" data-select2-id="148">
                        <div class="form-horizontal" data-select2-id="147">
                            <div class="row form-group">
                                <div class="col-lg-4">
                                    <label class="control-label">Mã địa bàn</label>
                                    <input class="form-control" name="maquocgia" type="text" id="madb_th">
                                </div>

                                <div class="col-lg-8">
                                    <label class="control-label">Tên địa bàn<span class="require">*</span></label>
                                    <input class="form-control" required="required" name="name" type="text"
                                        id="name_th">
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-lg-6">
                                    <label class="control-label">Phân loại</label>
                                    <select class="form-control select2me" name="level" id="level_th">
                                        <option value="Tỉnh">Tỉnh</option>
                                        <option value="Thành phố">Thành phố</option>
                                        <option value="Huyện">Huyện</option>
                                        <option value="Thị xã">Thị xã</option>
                                        <option value="Phường">Phường</option>
                                        <option value="Xã">Xã</option>
                                        <option value="Thị trấn">Thị trấn</option>
                                        <option value="Thôn">Thôn/Xóm</option>
                                    </select>
                                </div>
                                <div class="col-lg-6">
                                    <label class="control-label">Trực thuộc địa bàn</label>
                                    <select class="form-control select2me " name='parent' id='parent_th'>
                                        <option value="">Không chọn</option>
                                        @foreach ($model as $value )
                                        <option value="{{$value->maquocgia}}">{{ $value->name }}</option>
                                        @endforeach
                                            
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="edit" id='edit'>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                        <button type="submit" id="submit" name="submit" value="submit"
                            class="btn btn-primary">Đồng
                            ý</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <?php
    function menudiaban($model,$parent=0, $char=''){
        $i=1;
        $j=1;
        $y=1;
        foreach ($model as $key => $item) {
                        //Nếu là chuyên mục con thì hiển thị
            if ($item->parent == $parent) {
                            echo '<tr>';
                                if($item->level== 'Tỉnh'){
                                    echo '<td class="text-center  text-uppercase">'.toAlpha(++$key).'</td>';
                                }else {
                                    echo '<td></td>';
                                }
                                if($item->level== 'Thành phố' || $item->level == 'Huyện' || $item->level == 'Thị xã'){

                                    echo '<td class="text-center">'.convert2Roman($i++).'</td>';
                                }else {
                                    echo '<td></td>';
                                }

                                if($item->level== 'Phường' || $item->level == 'Xã' || $item->level == 'Thị trấn'){
                                    // $key=0;
                                    echo '<td class="text-center">'.$j++.'</td>';
                                }else {
                                    echo '<td></td>';
                                }

                                // if($item->level== 'Thôn'){
                                //     echo '<td class="text-center">'.$y++.'</td>';
                                // }else {
                                //     echo '<td></td>';
                                // }
                                echo '<td>'.$item->maquocgia.'</td>';
                               echo '<td>'.$item->name.'</td>';
                            //    $tendvql=App\Models\dmdonvi::where('madv',$item->madvql)->first();
                            //    if(isset($tendvql)){
                            //     echo '<td>'.$tendvql->tendv.'</td>';
                            //    }else {
                            //     echo '<td></td>';
                            //    }

                               echo '<td>';
                                if (chkPhanQuyen('diaban', 'danhsach')){
                                    echo '<a href="'.'/dmdonvi/danh_sach_don_vi/'.$item->id.'" class="btn btn-icon btn-clean btn-lg mb-1 position-relative" title="Danh sách đơn vị">
                                            <span class="svg-icon svg-icon-xl">
                                                <i class="icon-lg la la-clipboard-list text-success icon-2x"></i>
                                             </span>
                                            <span class="label label-sm label-light-danger text-dark label-rounded font-weight-bolder position-absolute top-0 right-0">'.count(App\Models\Danhmuc\dmdonvi::where('madiaban',$item->id)->get()).'</span>
                                         </a>';
                                }

                                if (chkPhanQuyen('diaban', 'thaydoi')){
                                echo '<button onclick="edit(`'.$item->id.'`,`'.$item->maquocgia.'`,`'.$item->parent.'`,`'.$item->name.'`,`'.$item->level.'`)" class="btn btn-sm btn-clean btn-icon" data-target="#modify-modal" title="Chỉnh sửa" data-toggle="modal">
                                                <i class="icon-lg la fa-edit text-primary icon-2x"></i>
                                            </button>';
                                    echo '<button onclick="setDiaBan(`'.$item->maquocgia.'`,`'.$item->level.'`)" class="btn btn-sm btn-clean btn-icon" data-target="#modify-modal-th" title="Thêm địa bàn trực thuộc" data-toggle="modal">
                                                <i class="icon-lg flaticon-add text-info"></i>
                                            </button>';

                                         echo '<button title="Xóa thông tin" type="button" onclick="cfDel(`/dia_ban/delete/'.$item->id.'`)" class="btn btn-sm btn-clean btn-icon" data-target="#delete-modal-confirm" data-toggle="modal">
                                                <i class="icon-lg flaticon-delete text-danger"></i>
                                            </button>';
                               echo '</td>';
                                        }
                           echo '</tr>';

                           //Xóa menu đã lặp
                        //    unset($model[$key]);

                           //đệ quy để lấy danh sách con
                           menudiaban($model,$item->maquocgia,$char.'---');
            }
        }            
    }
     ?> 
     <script>
        function add()
        {
            var url = '/dia_ban/store';
            $("#frm_modify").attr("action", url);
        }
        function edit(id,maquocgia,parent,name,level){
            var url='/dia_ban/update/'+id;
            $('#level option[value=' + level + ' ]').attr('selected', 'selected');
            $('#parent option[value=' + parent + ' ]').attr('selected', 'selected');
            $('#name').val(name);
            $('#madb').val(maquocgia)
            $('#edit').val(id);
            $("#frm_modify").attr("action", url);
        }

        function setDiaBan(parent,level)
        {
            var url = '/dia_ban/store';
            switch(level){
                case 'Tỉnh':{
                    var lv='Huyện'
                    break;
                }
                case 'Huyện':{
                    var lv= 'Phường';
                    break;
                }
                case 'Thành phố':{
                    var lv= 'Phường';
                    break;
                }
                case 'Thị xã':{
                    var lv= 'Phường';
                    break;
                }
                case 'Phường':{
                    var lv='Thôn'
                    break;
                }
                case 'Xã':{
                    var lv='Thôn'
                    break;
                }
                case 'Thị trấn':{
                    var lv='Thôn'
                    break;
                }
            }

            $('#level_th option[value=' + lv + ' ]').attr('selected', 'selected');
            $('#parent_th option[value=' + parent + ' ]').attr('selected', 'selected');
            $("#frm_modify_th").attr("action", url);
        }
     </script>
@stop
