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
                        <h3 class="card-label text-uppercase">Danh mục đơn vị</h3>
                    </div>
                    <div class="card-toolbar">
                        {{-- <button onclick="add()" class="btn btn-xs btn-icon btn-success mr-2" title="Thêm mới"><i class="fa fa-plus"></i></button> --}}
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
                                <th rowspan="2">Tên địa bàn</th>
                                <th rowspan="2">Đơn vị quản lý địa bàn</th>
                                <th rowspan="2">Thao tác</th>

                            </tr>
                            <tr class="text-center">
                                <th>T</th>
                                <th>H</th>
                                <th>X</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @foreach ($model_diaban as $key => $diaban)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $diaban->name }}</td>
                                    <td>{{ $diaban->madvql }}</td>
                                    <td>
                                        <a href="" class="btn btn-sm btn-clean btn-icon"
                                            title="Thay đổi đơn vị quản lý địa bàn">
                                            <i class="icon-lg la fa-edit text-primary icon-2x"></i></a>
                                        <a href="{{ '/dmdonvi/danh_sach_don_vi/' . $diaban->id }}"
                                            class="btn btn-icon btn-clean btn-lg mb-1 position-relative"
                                            title="Danh sách đơn vị">
                                            <span class="svg-icon svg-icon-xl">
                                                <i class="icon-lg la la-clipboard-list text-success icon-2x"></i>
                                            </span>
                                            <span
                                                class="label label-sm label-light-danger text-dark label-rounded font-weight-bolder position-absolute top-0 right-0">4</span>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach --}}
                            <?php menudiaban($model_diaban)?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!--end::Card-->
            <!--end::Example-->
        </div>
    </div>
    <!--end::Row-->
    <?php
    function menudiaban($model,$parent=0, $char=''){
        $i=1;
        $j=1;
        foreach ($model as $key => $item) {
                        //Nếu là chuyên mục con thì hiển thị
            if ($item->parent == $parent) {
                            echo '<tr>';
                                if($item->level== 'Tỉnh'){
                                    echo '<td class="text-center">'.++$key.'</td>';
                                }else {
                                    echo '<td></td>';
                                }
                                if($item->level== 'Thành phố' || $item->level == 'Huyện' || $item->level == 'Thị xã'){

                                    echo '<td class="text-center">'.$i++.'</td>';
                                }else {
                                    echo '<td></td>';
                                }

                                if($item->level== 'Phường' || $item->level == 'Xã' || $item->level == 'Thị trấn'){
                                    // $key=0;
                                    echo '<td class="text-center">'.$j++.'</td>';
                                }else {
                                    echo '<td></td>';
                                }

                               echo '<td>'.$item->name.'</td>';
                               $tendvql=App\Models\Danhmuc\dmdonvi::where('madv',$item->madvql)->first();
                               if(isset($tendvql)){
                                echo '<td>'.$tendvql->tendv.'</td>';
                               }else {
                                echo '<td></td>';
                               }

                               echo '<td>';
                                   echo '<a href="/dmdonvi/dvql/'.$item->id.'" class="btn btn-sm btn-clean btn-icon" title="Thay đổi đơn vị quản lý địa bàn">
                                        <i class="icon-lg la fa-edit text-primary icon-2x"></i></a>';
                                    echo '<a href="'.'/dmdonvi/danh_sach_don_vi/'.$item->id.'" class="btn btn-icon btn-clean btn-lg mb-1 position-relative" title="Danh sách đơn vị">
                                            <span class="svg-icon svg-icon-xl">
                                                <i class="icon-lg la la-clipboard-list text-success icon-2x"></i>
                                             </span>
                                            <span class="label label-sm label-light-danger text-dark label-rounded font-weight-bolder position-absolute top-0 right-0">'.count(App\Models\Danhmuc\dmdonvi::where('madiaban',$item->id)->get()).'</span>
                                         </a>';
                               echo '</td>';
                           echo '</tr>';

                           //Xóa menu đã lặp
                        //    unset($model[$key]);

                           //đệ quy để lấy danh sách con
                           menudiaban($model,$item->maquocgia,$char.'---');
            };
        }            
    }
     ?>
@stop
