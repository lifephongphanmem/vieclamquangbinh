<div class="form-body">
    <div id="kinhnghiem_danhsach">
        @if (isset($ungvienkinhnghiem))
            <table class="table  table-bordered table-hover dataTable no-footer">
                @foreach ($ungvienkinhnghiem as $item)
                    <tr>
                        <td>
                            <div style="margin-bottom: -2rem;margin-top: 1rem">
                                <span>
                                    {{ $item->congty }} &emsp;&emsp;&emsp;
                                </span>
                                <span>
                                    {{ getDayVn($item->ngayvao) }}
                                    {{ isset($item->ngaynghi) ? ' - ' . getDayVn($item->ngaynghi) : '' }}
                                </span>
                            </div>

                            <div style="display: flex;justify-content:end;">
                                <span>
                                    <a onclick="editkinhnghiem({{ $item->id }})" class="btn btn-primary"> Cật nhật</a>
                                    <a onclick="deletekinhnghiem({{ $item->id }})" class="btn btn-danger"> Xóa</a>
                                </span>
                            </div>


                            <div class="form-body" id="kinhnghiem_edit{{ $item->id }}" style="display: none">
                                <div class="row col-md-12">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label">Công ty<span
                                                    style="color: red">*</span></label>
                                            <input type="text" name="congty" id="congty_edit{{ $item->id }}"
                                                class="form-control" placeholder="Ví dụ: Công ty ABC"
                                                value="{{ $item->congty }}">
                                            <span style="color: red" id="congty_edit_error{{ $item->id }}"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label">Quy mô</label>
                                            <input type="number" name="quymo" id="quymo_edit{{ $item->id }}"
                                                class="form-control" placeholder="Ví dụ: 50"
                                                value="{{ $item->quymo }}">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label">Lĩnh vực hoạt động của công ty</span></label>
                                            <input type="text" name="linhvuc" id="linhvuc_edit{{ $item->id }}"
                                                class="form-control" placeholder="Ví dụ: Lĩnh vực vông nghiệp"
                                                value="{{ $item->linhvuc }}">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label">Chức danh<span
                                                    style="color: red">*</span></label>
                                            <input type="text" name="chucdanh"
                                                id="chucdanh_kn_edit{{ $item->id }}" class="form-control"
                                                placeholder="Ví dụ: Kinh doanh quốc tế" value="{{ $item->chucdanh }}">
                                            <span style="color: red" id="chucdanh_kn_edit_error{{ $item->id }}"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row col-md-12">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label">Ngày vào</label>
                                            <input type="date" name="ngayvao" id="ngayvao_edit{{ $item->id }}"
                                                class="form-control" value="{{ $item->ngayvao }}">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label">Ngày xin nghỉ việc</label>
                                            <input type="date" name="ngaynghi" id="ngaynghi_edit{{ $item->id }}"
                                                class="form-control" value="{{ $item->ngaynghi }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Lý do nghỉ</label>
                                            <input type="text" name="lydo" id="lydo_edit{{ $item->id }}"
                                                class="form-control" value="{{ $item->lydo }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Chi tiết công việc</label>
                                            <textarea type="text" name="chitiet" id="chitiet_edit{{ $item->id }}" value="{{ $item->chitiet }}"
                                                class="form-control" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Mô tả</label>
                                            <textarea type="text" name="mota" id="mota_edit{{ $item->id }}" value="{{ $item->mota }}"
                                                class="form-control" rows="3"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <button onclick="huyeditkinhnghiem({{ $item->id }})"
                                        class="btn btn-sm btn-secondary btn-lg pull-right"
                                        style="margin-left:2%;background-color: rgba(128, 128, 128, 0.507)">
                                        Hủy</button>
                                    <button onclick="updatekinhnghiem({{ $item->id }})"
                                        class="btn btn-sm btn-info btn-lg pull-right" style="margin-left:1px">
                                        Lưu</button>
                                </div>

                            </div>
                        </td>
                    </tr>
                @endforeach
            </table>
        @endif
    </div>
    <div class="row">
        <button onclick="createkinhnghiem()" class="btn btn-sm btn-success btn-lg pull-right" style="margin-left:1%">
            Thêm mới
        </button>

    </div>
</div>
<br>

<div class="form-body" id="kinhnghiem_themmoi" style="display: none">
    <div class="row col-md-12">
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">Công ty<span style="color: red">*</span></label>
                <input type="text" name="congty" id="congty" class="form-control"
                    placeholder="Ví dụ: Công ty ABC">
                <span style="color: red" id="congty_error"></span>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">Quy mô</label>
                <input type="number" name="quymo" id="quymo" class="form-control" placeholder="Ví dụ: 50">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">Lĩnh vực hoạt động của công ty</span></label>
                <input type="text" name="linhvuc" id="linhvuc" class="form-control"
                    placeholder="Ví dụ: Lĩnh vực vông nghiệp" value="">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">Chức danh<span style="color: red">*</span></label>
                <input type="text" name="chucdanh" id="chucdanh_kn" class="form-control"
                    placeholder="Ví dụ: Kinh doanh quốc tế">
                <span style="color: red" id="chucdanh_kn_error"></span>
            </div>
        </div>
    </div>
    <div class="row col-md-12">
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">Ngày vào</label>
                <input type="date" name="ngayvao" id="ngayvao" class="form-control">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">Ngày xin nghỉ việc</label>
                <input type="date" name="ngaynghi" id="ngaynghi" class="form-control">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Lý do nghỉ</label>
                <input type="text" name="lydo" id="lydo" class="form-control">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Chi tiết công việc</label>
                <textarea type="text" name="chitiet" id="chitiet" class="form-control" rows="3"></textarea>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Mô tả</label>
                <textarea type="text" name="mota" id="mota" class="form-control" rows="3"></textarea>
            </div>
        </div>
    </div>
    <div class="row">
        <button onclick="huykinhnghiem()" class="btn btn-sm btn-secondary btn-lg pull-right" style="margin-left:2%">
            Hủy</button>
        <button onclick="storekinhnghiem()" class="btn btn-sm btn-info btn-lg pull-right" style="margin-left:1px">
            Lưu</button>
    </div>

</div>



<script>
    function createkinhnghiem() {
        if ($('#user').val() == '') {
            toastr.warning("Vui lòng lưu lại thông tin trước khi cập nhật thông tin này.");
        } else {
            $('#congty').val('');
            $('#quymo').val('');
            $('#linhvuc').val('');
            $('#chucdanh_kn').val('');
            $('#ngayvao').val('');
            $('#ngaynghi').val('');
            $('#chitiet').val('');
            $('#mota').val('');
            $('#lydo').val('');
            $("#kinhnghiem_themmoi").css("display", "block");
        }
    }

    function huykinhnghiem() {
        $("#kinhnghiem_themmoi").css("display", "none");
    }

    function storekinhnghiem() {

        var congty = $('#congty').val();
        var chucdanh = $('#chucdanh_kn').val();

        if (congty != '' && chucdanh != '') {

            $.ajax({
                url: '/ungvien/storekinhnghiem',
                type: 'POST',
                data: {
                    _token: CSRF_TOKEN,
                    user: $('#user').val(),
                    congty: $('#congty').val(),
                    quymo: $('#quymo').val(),
                    linhvuc: $('#linhvuc').val(),
                    chucdanh: $('#chucdanh_kn').val(),
                    ngayvao: $('#ngayvao').val(),
                    ngaynghi: $('#ngaynghi').val(),
                    chitiet: $('#chitiet').val(),
                    mota: $('#mota').val(),
                    lydo: $('#lydo').val(),
                },
                dataType: 'JSON',
                success: function(data) {
                    $('#kinhnghiem_danhsach').html(data.content);
                    $('#kinhnghiem_themmoi').css("display", "none");
                    $('#congty_error').html('');
                    $('#chucdanh_kn_error').html('');
                    toastr.success('Đã lưu thông tin', "Hoàn thành!");
                }
            })

        } else {

            if (congty == '') {
                $('#congty_error').html('Công ty không được để trống');
            } else {
                $('#congty_error').html('');
            }
            if (chucdanh == '') {
                $('#chucdanh_kn_error').html('Chức danh không được để trống');
            } else {
                $('#chucdanh_kn_error').html('');
            }

        }

    }

    function huyeditkinhnghiem(id) {

        $.ajax({
            url: '/ungvien/huyeditkinhnghiem',
            type: 'GET',
            data: {
                _token: CSRF_TOKEN,
                id: id,
                user: $('#user').val(),
            },
            dataType: 'JSON',
            success: function(data) {
                $('#kinhnghiem_danhsach').html(data.content);
            }
        })
    }

    function editkinhnghiem(id) {
        let id_edit = id.toString();
        $("#kinhnghiem_edit" + id_edit).css("display", "block");
    }

    function updatekinhnghiem(id) {
        let id_edit = id.toString();

        var validate = validate_kinhnghiem(id_edit);
        if (validate) {
            $.ajax({
                url: '/ungvien/updatekinhnghiem',
                type: 'POST',
                data: {
                    _token: CSRF_TOKEN,
                    id: id,
                    user: $('#user').val(),
                    congty: $('#congty_edit' + id_edit).val(),
                    quymo: $('#quymo_edit' + id_edit).val(),
                    linhvuc: $('#linhvuc_edit' + id_edit).val(),
                    chucdanh: $('#chucdanh_kn_edit' + id_edit).val(),
                    ngayvao: $('#ngayvao_edit' + id_edit).val(),
                    ngaynghi: $('#ngaynghi_edit' + id_edit).val(),
                    chitiet: $('#chitiet_edit' + id_edit).val(),
                    mota: $('#mota_edit' + id_edit).val(),
                    lydo: $('#lydo_edit' + id_edit).val(),
                },
                dataType: 'JSON',
                success: function(data) {
                    $('#kinhnghiem_danhsach').html(data.content);
                    $('#congty_edit_error' + id_edit).html('');
                    $('#chucdanh_edit_error' + id_edit).html('');
                    toastr.success('Đã lưu thông tin', "Hoàn thành!");
                }
            })
        }

    }

    function deletekinhnghiem(id, user) {

        $.ajax({
            url: '/ungvien/deletekinhnghiem',
            type: 'GET',
            data: {
                _token: CSRF_TOKEN,
                id: id,
                user: $('#user').val(),
            },
            dataType: 'JSON',
            success: function(data) {
                $('#kinhnghiem_danhsach').html(data.content);
                // $('#kinhnghiem_themmoi').css("display", "none");
                toastr.success('Đã xóa thông tin', "Hoàn thành!");
            }
        })
    }

    function validate_kinhnghiem(id_edit) {
       
        var congty = $('#congty_edit' + id_edit).val();
        var chucdanh = $('#chucdanh_kn_edit' + id_edit).val();

        if (congty != '' && chucdanh != '') {

            return true;
        } else {
           
            if (congty == '') {
                $('#congty_edit_error' + id_edit).html('Công ty không được để trống');
            } else {
                $('#congty_edit_error' + id_edit).html('');
            }
            if (chucdanh == '') {
                $('#chucdanh_kn_edit_error' + id_edit).html('Chức danh không được để trống');
            } else {
                $('#chucdanh_kn_edit_error' + id_edit).html('');
            }

            return false;
        }

    }
</script>
