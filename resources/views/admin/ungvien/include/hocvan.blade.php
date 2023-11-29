<div class="form-body">
    <div id="hocvan_danhsach">
        @if (isset($ungvienhocvan))
            <table class="table table-bordered table-hover dataTable no-footer">
                @foreach ($ungvienhocvan as $item)
                    <tr>
                        <td>
                            <div style="margin-bottom: -2rem;margin-top: 1rem">
                                <span>
                                    {{ $item->truong }} &emsp;&emsp;&emsp;
                                </span>
                                <span>
                                    {{ getDayVn($item->tungay) }}
                                    {{ isset($item->denngay) ? ' - ' . getDayVn($item->denngay) : '' }}
                                </span>
                            </div>

                            <div style="display: flex;justify-content:end;">
                                <span>
                                    <a onclick="edithocvan({{ $item->id }})" class="btn btn-primary"> Cật nhật</a>
                                    <a onclick="deletehocvan({{ $item->id }})" class="btn btn-danger"> Xóa</a>
                                </span>
                            </div>

                            <div class="form-body" id="hocvan_edit{{ $item->id }}"
                                style="margin-top: 10px;display: none">
                                <div class="row col-md-12">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label">Chuyên ngành<span
                                                    style="color: red">*</span></label>
                                            <input type="text" name="chuyennganh"
                                                id="chuyennganh_edit{{ $item->id }}"
                                                value="{{ $item->chuyennganh }}" class="form-control"
                                                placeholder="VD: Kinh doanh quốc tế">
                                            <span style="color: red"
                                                id="chuyennganh_edit_error{{ $item->id }}"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label">Trường <span
                                                    style="color: red">*</span></label>
                                            <input type="text" name="truong" id="truong_edit{{ $item->id }}"
                                                class="form-control" value="{{ $item->truong }}"
                                                placeholder="VD: Đại học Ngoại Thương">
                                            <span style="color: red" id="truong_edit_error{{ $item->id }}"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label">Bằng cấp <span
                                                    style="color: red">*</span></label>
                                            <select name="bangcap" id="bangcap_edit{{ $item->id }}"
                                                class="form-control">
                                                <option value="">Chọn bằng cấp</option>
                                                @foreach ($dmtrinhdokythuat as $dm)
                                                    <option value="{{ $dm->madmtdkt }}"
                                                        {{ $item->bangcap == $dm->madmtdkt ? 'selected' : '' }}>
                                                        {{ $dm->tentdkt }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <span style="color: red" id="bangcap_edit_error{{ $item->id }}"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row col-md-3">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">Từ ngày </label>
                                            <input type="date" name="tungay" id="tungay_edit{{ $item->id }}"
                                                class="form-control" value="{{ $item->tungay }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">Đến ngày </label>
                                            <input type="date" name="denngay" id="denngay_edit{{ $item->id }}"
                                                class="form-control" value="{{ $item->denngay }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row col-md-9">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">Thành tựu</label>
                                            <textarea type="text" name="thanhtuu" id="thanhtuu_edit{{ $item->id }}" class="form-control" rows="6">{{ $item->thanhtuu }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <button onclick="huyedithocvan({{ $item->id }})"
                                        class="btn btn-sm btn-lg pull-right"
                                        style="margin-left:2%;background-color: rgba(128, 128, 128, 0.507)">
                                        Hủy</button>
                                    <button onclick="updatehocvan({{ $item->id }})"
                                        class="btn btn-sm btn-primary btn-lg pull-right" style="margin-left:1px">
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
        <button onclick="createhocvan()" class="btn btn-sm btn-success btn-lg pull-right" style="margin-left:1%">
            Thêm mới
        </button>

    </div>
</div>
<br>

<div class="form-body" id="hocvan_themmoi" style="display: none">
    <div class="row col-md-12">
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">Chuyên ngành<span style="color: red">*</span></label>
                <input type="text" name="chuyennganh" id="chuyennganh" class="form-control"
                    placeholder="VD: Kinh doanh quốc tế">
                <span style="color: red" id="chuyennganh_error"></span>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">Trường <span style="color: red">*</span></label>
                <input type="text" name="truong" id="truong" class="form-control"
                    placeholder="VD: Đại học Ngoại Thương">
                <span style="color: red" id="truong_error"></span>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">Bằng cấp <span style="color: red">*</span></label>
                <select name="bangcap" id="bangcap" class="form-control">
                    <option value="">Chọn bằng cấp</option>
                    @foreach ($dmtrinhdokythuat as $item)
                        <option value="{{ $item->madmtdkt }}">{{ $item->tentdkt }}</option>
                    @endforeach
                </select>
                <span style="color: red" id="bangcap_error"></span>
            </div>
        </div>
    </div>

    <div class="row col-md-3">
        <div class="col-md-12">
            <div class="form-group">
                <label class="control-label">Từ ngày </label>
                <input type="date" name="tungay" id="tungay" class="form-control">
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label class="control-label">Đến ngày </label>
                <input type="date" name="denngay" id="denngay" class="form-control">
            </div>
        </div>
    </div>
    <div class="row col-md-9">
        <div class="col-md-12">
            <div class="form-group">
                <label class="control-label">Thành tựu</label>
                <textarea type="text" name="thanhtuu" id="thanhtuu" class="form-control" rows="6"></textarea>
            </div>
        </div>
    </div>
    <div class="row">
        <button onclick="huyhocvan()" class="btn btn-sm btn-secondary btn-lg pull-right" style="margin-left:2%">
            Hủy</button>
        <button onclick="storehocvan()" class="btn btn-sm btn-info btn-lg pull-right" style="margin-left:1px">
            Lưu</button>
    </div>

</div>

<script>
    function createhocvan() {
        if ($('#user').val() == '') {
            toastr.warning("Vui lòng lưu lại thông tin trước khi cập nhật thông tin này.");
        } else {
            $('#chuyennganh').val('');
            $('#truong').val('');
            $('#bangcap').val('');
            $('#tungay').val('');
            $('#denngay').val('');
            $('#thanhtuu').val('');
            $("#hocvan_themmoi").css("display", "block");
        }
    }

    function huyhocvan() {
        $("#hocvan_themmoi").css("display", "none");
    }

    function storehocvan() {

        var chuyennganh = $('#chuyennganh').val();
        var truong = $('#truong').val();
        var bangcap = $('#bangcap').val();

        if (chuyennganh != '' && truong != '' && bangcap != '') {
            $.ajax({
                url: '/ungvien/storehocvan',
                type: 'POST',
                data: {
                    _token: CSRF_TOKEN,
                    user: $('#user').val(),
                    chuyennganh: $('#chuyennganh').val(),
                    truong: $('#truong').val(),
                    bangcap: $('#bangcap').val(),
                    tungay: $('#tungay').val(),
                    denngay: $('#denngay').val(),
                    thanhtuu: $('#thanhtuu').val(),
                },
                dataType: 'JSON',
                success: function(data) {
                    $('#hocvan_danhsach').html(data.content);
                    $('#hocvan_themmoi').css("display", "none");
                    $('#chuyennganh_error').html('');
                    $('#truong_error').html('');
                    $('#bangcap_error').html('');
                    toastr.success('Đã lưu thông tin', "Hoàn thành!");
                }
            })
            
        } else {

            if (chuyennganh == '') {
                $('#chuyennganh_error').html('Chuyên ngành không được để trống');
            } else {
                $('#chuyennganh_error').html('');
            }
            if (truong == '') {
                $('#truong_error').html('Trường không được để trống');
            } else {
                $('#truong_error').html('');
            }
            if (bangcap == '') {
                $('#bangcap_error').html('Bằng cấp không được để trống');
            } else {
                $('#bangcap_error').html('');
            }
        }

    }

    function edithocvan(id) {

        let id_edit = id.toString();
        $("#hocvan_edit" + id_edit).css("display", "block");
    }

    function huyedithocvan(id) {

        $.ajax({
            url: '/ungvien/huyedithocvan',
            type: 'GET',
            data: {
                _token: CSRF_TOKEN,
                id: id,
                user: $('#user').val(),
            },
            dataType: 'JSON',
            success: function(data) {
                $('#hocvan_danhsach').html(data.content);
            }
        })
    }

    function updatehocvan(id) {
        let id_edit = id.toString();

        var validate = validate_hocvan(id_edit);

        if (validate) {
            $.ajax({
                url: '/ungvien/updatehocvan',
                type: 'POST',
                data: {
                    _token: CSRF_TOKEN,
                    id: id,
                    user: $('#user').val(),
                    chuyennganh: $('#chuyennganh_edit' + id_edit).val(),
                    truong: $('#truong_edit' + id_edit).val(),
                    bangcap: $('#bangcap_edit' + id_edit).val(),
                    tungay: $('#tungay_edit' + id_edit).val(),
                    denngay: $('#denngay_edit' + id_edit).val(),
                    thanhtuu: $('#thanhtuu_edit' + id_edit).val(),
                },
                dataType: 'JSON',
                success: function(data) {
                    $('#hocvan_danhsach').html(data.content);
                    // $('#hocvan_themmoi').css("display", "none");
                    toastr.success('Đã lưu thông tin', "Hoàn thành!");
                }
            })
        }

    }

    function deletehocvan(id, user) {

        $.ajax({
            url: '/ungvien/deletehocvan',
            type: 'GET',
            data: {
                _token: CSRF_TOKEN,
                id: id,
                user: $('#user').val(),
            },
            dataType: 'JSON',
            success: function(data) {
                // $('#form_hocvan1').hide();
                $('#hocvan_danhsach').html(data.content);
                // $('#hocvan_themmoi').css("display", "none");
                toastr.success('Đã xóa thông tin', "Hoàn thành!");
            }
        })
    }

    function validate_hocvan(id_edit) {

        var chuyennganh = $('#chuyennganh_edit' + id_edit).val();
        var truong = $('#truong_edit' + id_edit).val();
        var bangcap = $('#bangcap_edit' + id_edit).val();

        if (chuyennganh != '' && truong != '' && bangcap != '') {

            return true;
        } else {

            if (chuyennganh == '') {
                $('#chuyennganh_edit_error' + id_edit).html('Chuyên ngành không được để trống');
            } else {
                $('#chuyennganh_edit_error' + id_edit).html('');
            }
            if (truong == '') {
                $('#truong_edit_error' + id_edit).html('Trường không được để trống');
            } else {
                $('#truong_edit_error' + id_edit).html('');
            }
            if (bangcap == '') {
                $('#bangcap_edit_error' + id_edit).html('Bằng cấp không được để trống');
            } else {
                $('#bangcap_edit_error' + id_edit).html('');
            }
            return false;
        }

    }
</script>
