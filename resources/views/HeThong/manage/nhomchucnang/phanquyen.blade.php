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

        // function setNhomTK(manhomchucnang, tennhomchucnang, stt) {
        //     var form = $('#frm_modify');
        //     form.find("[name='manhomchucnang']").val(manhomchucnang);
        //     form.find("[name='tennhomchucnang']").val(tennhomchucnang);
        //     form.find("[name='stt']").val(stt);
        // }
        function getChucNang(machucnang, tenchucnang, phanquyen, danhsach, thaydoi, hoanthanh, nhomchucnang) {
            var form = $('#frm_modify');
            form.find("[name='machucnang']").val(machucnang);
            form.find("[name='tenchucnang']").val(tenchucnang);
            form.find("[name='phanquyen']").prop('checked', phanquyen);
            form.find("[name='nhomchucnang']").prop('checked', 0);
            //Mở khóa chức năng
            form.find("[name='danhsach']").prop('disabled', false);
            form.find("[name='thaydoi']").prop('disabled', false);
            form.find("[name='hoanthanh']").prop('disabled', false);
            //checked="checked"
            if (!nhomchucnang) {
                form.find("[name='nhomchucnang']").attr('disabled', true).parent().addClass('checkbox-disabled').addClass(
                    'text-danger');
                form.find("[name='danhsach']").prop('checked', danhsach);
                form.find("[name='thaydoi']").prop('checked', thaydoi);
                form.find("[name='hoanthanh']").prop('checked', hoanthanh);
            } else {
                form.find("[name='nhomchucnang']").attr('disabled', false).parent().removeClass('checkbox-disabled')
                    .removeClass('text-danger');
                form.find("[name='danhsach']").prop('checked', 0);
                form.find("[name='thaydoi']").prop('checked', 0);
                form.find("[name='hoanthanh']").prop('checked', 0);
            }
        }
        function setNhomChucNang() {
            var form = $('#frm_modify');
            var giatri = form.find("[name='nhomchucnang']").prop('checked');
            form.find("[name='danhsach']").prop('disabled', !giatri);
            form.find("[name='danhsach']").prop('checked', giatri);
            form.find("[name='thaydoi']").prop('disabled', !giatri);
            form.find("[name='thaydoi']").prop('checked', giatri);
            form.find("[name='hoanthanh']").prop('disabled', !giatri);
            form.find("[name='hoanthanh']").prop('checked', giatri);
        }
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
                        <h3 class="card-label text-uppercase">Phân quyền nhóm tài khoản: {{ $m_nhomtaikhoan->tennhomchucnang }}</h3>
                    </div>

                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-md-12">
                            <table class="table table-bordered table-hover" id="sample_3">
                                <thead>
                                    <tr class="text-center">
                                        <th rowspan="2" width="10%">STT</th>
                                        <th rowspan="2">Mã số</th>
                                        <th rowspan="2">Tên chức năng</th>
                                        <th colspan="3">Phân quyền</th>
                                        <th rowspan="2" width="10%">Thao tác</th>
                                    </tr>
                                    <tr class="text-center">
                                        <th width="10%">Xem hồ sơ</th>
                                        <th width="10%">Thay đổi</th>
                                        <th width="10%">Gửi/Duyệt</br>hồ sơ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;?>
                                    @foreach ($model as $c1)
                                    <?php
                                    $model_c2 = $m_chucnang->where('machucnang_goc', $c1->maso)->sortby('id');
                                    ?>
                                    <tr>
                                        <td
                                            class="text-uppercase font-weight-bold text-info"  style="{{ $c1->phanquyen == 0 ? 'text-decoration: line-through;' : '' }}">
                                            {{ romanNumerals($i++) }}</td>
                                        <td class="font-weight-bold" style="{{ $c1->phanquyen == 0 ? 'text-decoration: line-through;' : '' }}">
                                            {{ $c1->maso }}</td>
                                        <td class="font-weight-bold" style="{{ $c1->phanquyen == 0 ? 'text-decoration: line-through;' : '' }}">
                                            {{ $c1->tencn }}</td>
                                        @if ($c1->nhomchucnang)
                                            <td class="text-center"></td>
                                            <td class="text-center"></td>
                                            <td class="text-center"></td>
                                        @else
                                            <td class="text-center">
                                                <button class="btn btn-sm btn-clean btn-icon">
                                                    <i
                                                        class="icon-lg la {{ $c1->danhsach ? 'fa-check text-primary' : 'fa-times-circle text-danger' }} text-primary icon-2x"></i>
                                                </button>
                                            </td>
                                            <td class="text-center">
                                                <button class="btn btn-sm btn-clean btn-icon">
                                                    <i
                                                        class="icon-lg la {{ $c1->thaydoi ? 'fa-check text-primary' : 'fa-times-circle text-danger' }} text-primary icon-2x"></i>
                                                </button>
                                            </td>
                                            <td class="text-center">
                                                <button class="btn btn-sm btn-clean btn-icon">
                                                    <i
                                                        class="icon-lg la {{ $c1->hoanthanh ? 'fa-check text-primary' : 'fa-times-circle text-danger' }} text-primary icon-2x"></i>
                                                </button>
                                            </td>
                                        @endif
        
                                        <td class="text-center">
                                            @if (chkPhanQuyen('taikhoan', 'thaydoi'))
                                                <button
                                                    onclick="getChucNang('{{ $c1->maso }}','{{ $c1->tencn }}',{{ $c1->phanquyen }},
                                                    {{ $c1->danhsach }}, {{ $c1->thaydoi }}, {{ $c1->hoanthanh }}, {{ $c1->nhomchucnang }})"
                                                    class="btn btn-sm btn-clean btn-icon" data-target="#modify-modal"
                                                    title="Thay đổi thông tin" data-toggle="modal">
                                                    <i class="icon-lg la flaticon-edit-1 text-primary"></i>
                                                </button>
                                            @endif
        
                                        </td>
                                    </tr>
                                    <?php $j = 1;?>
                                    @foreach ($model_c2 as $c2)
                                        <?php
                                        $phanquyen_c2 = $c2->phanquyen == 0 || $c1->phanquyen == 0 ? 0 : 1;
                                        $model_c3 = $m_chucnang->where('machucnang_goc', $c2->maso)->sortby('id');
                                        ?>
                                        <tr>
                                            <td
                                                class="text-uppercase text-warning " style="{{ $phanquyen_c2 == 0 ? 'text-decoration: line-through;' : '' }}">
                                                {{ romanNumerals($i - 1) }}--{{ $j++ }}</td>
                                            <td style="{{ $phanquyen_c2 == 0 ? 'text-decoration: line-through;' : '' }}">
                                                {{ $c2->maso }}
                                            </td>
                                            <td style="{{ $phanquyen_c2 == 0 ? 'text-decoration: line-through;' : '' }}">
                                                {{ $c2->tencn }}</td>
                                            @if ($c2->nhomchucnang)
                                                <td class="text-center"></td>
                                                <td class="text-center"></td>
                                                <td class="text-center"></td>
                                            @else
                                                <td class="text-center">
                                                    <button class="btn btn-sm btn-clean btn-icon">
                                                        <i
                                                            class="icon-lg la {{ $c2->danhsach ? 'fa-check text-primary' : 'fa-times-circle text-danger' }}  icon-2x"></i>
                                                    </button>
                                                </td>
                                                <td class="text-center">
                                                    <button class="btn btn-sm btn-clean btn-icon">
                                                        <i
                                                            class="icon-lg la {{ $c2->thaydoi ? 'fa-check text-primary' : 'fa-times-circle text-danger' }}  icon-2x"></i>
                                                    </button>
                                                </td>
                                                <td class="text-center">
                                                    <button class="btn btn-sm btn-clean btn-icon">
                                                        <i
                                                            class="icon-lg la {{ $c2->hoanthanh ? 'fa-check text-primary' : 'fa-times-circle text-danger' }}  icon-2x"></i>
                                                    </button>
                                                </td>
                                            @endif
                                            <td class="text-center">
                                                @if (chkPhanQuyen('taikhoan', 'thaydoi') && $c1->phanquyen)
                                                    <button
                                                        onclick="getChucNang('{{ $c2->maso }}','{{ $c2->tencn }}',{{ $c2->phanquyen }},
                                                        {{ $c2->danhsach }}, {{ $c2->thaydoi }}, {{ $c2->hoanthanh }}, {{ $c2->nhomchucnang }})"
                                                        class="btn btn-sm btn-clean btn-icon" data-target="#modify-modal"
                                                        title="Thay đổi thông tin" data-toggle="modal">
                                                        <i class="icon-lg la flaticon-edit-1 text-warning"></i>
                                                    </button>
                                                @endif
        
                                            </td>
                                        </tr>
                                        <?php $y = 1;?>
                                        @foreach ($model_c3 as $c3)
                                            <?php
                                            $phanquyen_c3 = $c3->phanquyen == 0 || $phanquyen_c2 == 0 ? 0 : 1;
                                            $model_c4 = $m_chucnang->where('machucnang_goc', $c3->maso)->sortby('id');
                                            ?>
                                            <tr>
                                                <td style="{{ $phanquyen_c3 == 0 ? 'text-decoration: line-through;' : '' }}">
                                                    {{ romanNumerals($i-1) }}--{{ $j-1 }}--{{ $y++ }}
                                                </td>
                                                <td style="{{ $phanquyen_c3 == 0 ? 'text-decoration: line-through;' : '' }}">
                                                    {{ $c3->maso }}</td>
                                                <td style="{{ $phanquyen_c3 == 0 ? 'text-decoration: line-through;' : '' }}">
                                                    {{ $c3->tencn }}</td>
                                                @if ($c3->nhomchucnang)
                                                    <td class="text-center"></td>
                                                    <td class="text-center"></td>
                                                    <td class="text-center"></td>
                                                @else
                                                    <td class="text-center">
                                                        <button class="btn btn-sm btn-clean btn-icon">
                                                            <i
                                                                class="icon-lg la {{ $c3->danhsach ? 'fa-check text-primary' : 'fa-times-circle text-danger' }}  icon-2x"></i>
                                                        </button>
                                                    </td>
                                                    <td class="text-center">
                                                        <button class="btn btn-sm btn-clean btn-icon">
                                                            <i
                                                                class="icon-lg la {{ $c3->thaydoi ? 'fa-check text-primary' : 'fa-times-circle text-danger' }}  icon-2x"></i>
                                                        </button>
                                                    </td>
                                                    <td class="text-center">
                                                        <button class="btn btn-sm btn-clean btn-icon">
                                                            <i
                                                                class="icon-lg la {{ $c3->hoanthanh ? 'fa-check text-primary' : 'fa-times-circle text-danger' }}  icon-2x"></i>
                                                        </button>
                                                    </td>
                                                @endif
                                                <td style="text-align: center">
                                                    @if (chkPhanQuyen('taikhoan', 'thaydoi') && $c1->phanquyen && $c2->phanquyen)
                                                        <button
                                                            onclick="getChucNang('{{ $c3->maso }}','{{ $c3->tencn }}','{{ $c3->phanquyen }}',
                                                        '{{ $c3->danhsach }}', '{{ $c3->thaydoi }}', '{{ $c3->hoanthanh }}', '{{ $c3->nhomchucnang }}')"
                                                            class="btn btn-sm btn-clean btn-icon" data-target="#modify-modal"
                                                            title="Thay đổi thông tin" data-toggle="modal">
                                                            <i class="icon-lg la flaticon-edit-1 text-primary"></i>
                                                        </button>
        
                                                        {{-- <a href="{{ url('/TaiKhoan/PhamViDuLieu?tendangnhap='.$m_taikhoan->tendangnhap.'&machucnang='.$c3->machucnang) }}"
                                                            class="btn btn-sm btn-clean btn-icon">
                                                            <i class="icon-lg la flaticon-list text-dark"></i>
                                                        </a> --}}
                                                    @endif
        
                                                </td>
                                            </tr>
        
                                            @foreach ($model_c4 as $c4)
                                                <?php
                                                $phanquyen_c4 = $c4->phanquyen == 0 || $phanquyen_c3 == 0 ? 0 : 1;
                                                ?>
                                                <tr>
                                                    <td
                                                        class="text-uppercase {{ $phanquyen_c4 == 0 ? 'text-line-through' : '' }}">
                                                        {{ romanNumerals($c1->sapxep) }}--{{ $c2->sapxep }}--{{ $c3->sapxep }}--{{ $c4->sapxep }}
                                                    </td>
                                                    <td style="{{ $phanquyen_c4 == 0 ? 'text-decoration: line-through;' : '' }}">
                                                        {{ $c4->maso }}</td>
                                                    <td class="{{ $phanquyen_c4 == 0 ? 'text-line-through' : '' }}">
                                                        {{ $c4->tencn }}</td>
                                                    @if ($c4->nhomchucnang)
                                                        <td class="text-center"></td>
                                                        <td class="text-center"></td>
                                                        <td class="text-center"></td>
                                                    @else
                                                        <td class="text-center">
                                                            <button class="btn btn-sm btn-clean btn-icon">
                                                                <i
                                                                    class="icon-lg la {{ $c4->danhsach ? 'fa-check text-primary' : 'fa-times-circle text-danger' }}  icon-2x"></i>
                                                            </button>
                                                        </td>
                                                        <td class="text-center">
                                                            <button class="btn btn-sm btn-clean btn-icon">
                                                                <i
                                                                    class="icon-lg la {{ $c4->thaydoi ? 'fa-check text-primary' : 'fa-times-circle text-danger' }}  icon-2x"></i>
                                                            </button>
                                                        </td>
                                                        <td class="text-center">
                                                            <button class="btn btn-sm btn-clean btn-icon">
                                                                <i
                                                                    class="icon-lg la {{ $c4->hoanthanh ? 'fa-check text-primary' : 'fa-times-circle text-danger' }}  icon-2x"></i>
                                                            </button>
                                                        </td>
                                                    @endif
                                                    <td style="text-align: center">
                                                        @if (chkPhanQuyen('taikhoan', 'thaydoi') && $c1->phanquyen && $c2->phanquyen && $c3->phanquyen)
                                                            <button
                                                                onclick="getChucNang('{{ $c4->maso }}','{{ $c4->tencn }}',{{ $c4->phanquyen }},
                                                       {{ $c4->danhsach }}, {{ $c4->thaydoi }}, {{ $c4->hoanthanh }}, {{ $c4->nhomchucnang }})"
                                                                class="btn btn-sm btn-clean btn-icon"
                                                                data-target="#modify-modal" title="Thay đổi thông tin"
                                                                data-toggle="modal">
                                                                <i class="icon-lg la flaticon-list text-primary"></i>
                                                            </button>
        
                                                            <a href="getChucNang('{{ $c4->machucnang }}','{{ $c4->tenchucnang }}'"
                                                                class="btn btn-sm btn-clean btn-icon"
                                                                data-target="#modify-modal" title="Phạm vi lọc dữ liệu"
                                                                data-toggle="modal">
                                                                <i class="icon-lg la flaticon-edit-1 text-primary"></i>
                                                            </a>
        
                                                            {{-- <a href="{{ url('/TaiKhoan/PhamViDuLieu?tendangnhap='.$m_taikhoan->tendangnhap.'&machucnang='.$c4->machucnang) }}"
                                                                class="btn btn-sm btn-clean btn-icon">
                                                                <i class="icon-lg la flaticon-list text-dark"></i>
                                                            </a> --}}
                                                        @endif
        
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endforeach
                                    @endforeach
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end::Card-->
        <!--end::Example-->
    </div>
    <!--end::Row-->
 <!--Modal thông tin chi tiết -->
 {!! Form::open(['url' => '/nhomchucnang/PhanQuyen', 'id' => 'frm_modify']) !!}
 <input type="hidden" name="manhomchucnang" value="{{ $m_nhomtaikhoan->manhomchucnang }}" />
 <input type="hidden" name="machucnang" />
 <div id="modify-modal" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade kt_select2_modal">
     <div class="modal-dialog modal-lg">
         <div class="modal-content">
             <div class="modal-header modal-header-primary">
                 <h4 id="modal-header-primary-label" class="modal-title">Thông tin chức năng</h4>
                 <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
             </div>
             <div class="modal-body">
                 <div class="form-horizontal">
                     <div class="row form-group">
                         <div class="col-6">
                             <label class="control-label">Tên chức năng<span class="require">*</span></label>
                             {!! Form::text('tenchucnang', null, ['class' => 'form-control', 'required' => 'required']) !!}
                         </div>
                     </div>

                     <div class="form-group row">
                         <label class="col-3 col-form-label">Thiết lập chức năng:</label>
                         <div class="col-9 col-form-label">
                             <div class="checkbox-inline">
                                 <label class="checkbox checkbox-outline checkbox-success">
                                     <input type="checkbox" name="phanquyen" />
                                     <span></span>Sử dụng</label>
                                 <label class="checkbox checkbox-outline checkbox-success">
                                     <input type="checkbox" name="nhomchucnang" onclick="setNhomChucNang()" />
                                     <span></span>Áp dụng cho chức năng con</label>
                             </div>
                         </div>
                     </div>

                     <div class="form-group row">
                         <label class="col-3 col-form-label">Phân quyền chức năng:</label>
                         <div class="col-9 col-form-label">
                             <div class="checkbox-inline">
                                 <label class="checkbox checkbox-outline checkbox-success">
                                     <input type="checkbox" name="danhsach" />
                                     <span></span>Danh sách</label>
                                 <label class="checkbox checkbox-outline checkbox-success">
                                     <input type="checkbox" name="thaydoi" />
                                     <span></span>Thay đổi</label>
                                 <label class="checkbox checkbox-outline checkbox-success">
                                     <input type="checkbox" name="hoanthanh" />
                                     <span></span>Hoàn thành</label>
                             </div>
                             <span class="form-text text-muted">"Danh sách" mặc định được chọn khi chọn "Thay đổi" hoặc
                                 "Hoàn thành"</span>
                         </div>
                     </div>
                 </div>
             </div>
             <div class="modal-footer">
                 <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                 <button type="submit" id="submit" name="submit" value="submit" class="btn btn-primary">Đồng
                     ý</button>
             </div>
         </div>
     </div>
 </div>
 {!! Form::close() !!}


@stop
