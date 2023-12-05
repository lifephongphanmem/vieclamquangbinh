<div class="form-body" id="frm_coban">

    <div class="row">
        {{-- <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">Ảnh đại diện </label>
                <input type="file" name="avatar" id="avatar" class="form-control" placeholder="Chọn ảnh"
                    value="">
            </div>
        </div> --}}
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">Họ tên <span style="color: red">*</span></label>
                <input type="text" name="hoten" id="hoten" class="form-control"
                    placeholder="Nhập đầy đủ Họ và Tên" value="{{ isset($ungvien->hoten) ? $ungvien->hoten : '' }}">
                <span style="color: red" id="hoten_error"></span>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">CCCD<span style="color: red">*</span></label>
                <input type="number" name="cccd" id="cccd" class="form-control"
                    placeholder="Nhập đầy đủ Họ và Tên" value="{{ isset($ungvien->cccd) ? $ungvien->cccd : '' }}">
                <span style="color: red" id="cccd_error"></span>
            </div>
        </div>
        <div class="col-md-1">
            <div class="form-group">
                <label class="control-label">Giới tính</label>
                <select name="gioitinh" id="gioitinh" class="form-control">
                    <option value="Nữ"
                        {{ isset($ungvien->gioitinh) ? ($ungvien->gioitinh == 'Nữ' ? 'selected' : '') : '' }}>Nữ
                    </option>
                    <option value="Nam"
                        {{ isset($ungvien->gioitinh) ? ($ungvien->gioitinh == 'Nam' ? 'selected' : '') : '' }}>Nam
                    </option>
                </select>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label class="control-label">Ngày sinh<span style="color: red">*</span></label>
                <input type="date" name="ngaysinh" id="ngaysinh" class="form-control"
                    value="{{ isset($ungvien->ngaysinh) ? $ungvien->ngaysinh : '' }}">
                <span style="color: red" id="ngaysinh_error"></span>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">Số điện thoại<span style="color: red">*</span></label>
                <input type="number" name="phone" id="phone" class="form-control"
                    value="{{ isset($ungvien->phone) ? $ungvien->phone : '' }}">
                <span style="color: red" id="phone_error"></span>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <?php $danhmuc_tinh = $danhmuc->where('capdo', 'T'); ?>
                <label class="control-label">Tỉnh<span style="color: red">*</span></label>
                <select name="tinh" id="tinh"class="form-control">
                    @foreach ($danhmuc_tinh as $item)
                        <option value="{{ $item->maquocgia }}"
                            {{ isset($ungvien->tinh) ? ($ungvien->tinh == $item->maquocgia ? 'selected' : '') : '' }}>
                            {{ $item->name }}</option>
                    @endforeach
                </select>

            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <?php $danhmuc_huyen = $danhmuc->where('capdo', 'H'); ?>
                <label class="control-label">Huyện<span style="color: red">*</span></label>
                <select name="huyen" id="huyen" class="form-control select2basic">
                    <option value="">Chọn huyện</option>
                    @foreach ($danhmuc_huyen as $item)
                        <option value="{{ $item->maquocgia }}"
                            {{ isset($ungvien->huyen) ? ($ungvien->huyen == $item->maquocgia ? 'selected' : '') : '' }}>
                            {{ $item->name }}</option>
                    @endforeach
                </select>
                <span style="color: red" id="huyen_error"></span>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <?php $danhmuc_xa = $danhmuc->where('capdo', 'X'); ?>
                <label class="control-label">Xã<span style="color: red">*</span></label>
                <select name="xa" id="xa" class="form-control select2basic">
                    <option value="">Chọn xã</option>
                    @foreach ($danhmuc_xa as $item)
                        <option value="{{ $item->maquocgia }}"
                            {{ isset($ungvien->xa) ? ($ungvien->xa == $item->maquocgia ? 'selected' : '') : '' }}>
                            {{ $item->name }}</option>
                    @endforeach
                </select>
                <span style="color: red" id="xa_error"></span>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">address<span style="color: red">*</span></label>
                <input type="text" name="address" id="address" class="form-control"
                    placeholder="số nhà-Tên đường/Xóm-Thôn"
                    value="{{ isset($ungvien->address) ? $ungvien->address : '' }}">
                <span style="color: red" id="address_error"></span>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">Cấp bậc</label>
                <select name="capbac" id="capbac" class="form-control">
                    <option value="">Chọn cấp bậc</option>
                    @foreach ($capbac as $item)
                        <option value="{{ $item->madm }}">{{ $item->tendm }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">Trạng thái hôn nhân</label>
                <select name="honnhan" id="honnhan" class="form-control">
                    <option value="0"
                        {{ isset($ungvien->honnhan) ? ($ungvien->honnhan == '0' ? 'selected' : '') : '' }}>Độc thân
                    </option>
                    <option value="1"
                        {{ isset($ungvien->honnhan) ? ($ungvien->honnhan == '1' ? 'selected' : '') : '' }}>Đã kết hôn
                    </option>
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">Hình thức làm việc</label>
                <select class="form-control " name="hinhthuclv" id="hinhthuclv">
                    <option value="Toàn thời gian" selected="">Toàn thời gian</option>
                    <option value="Bán thời gian">Bán thời gian</option>
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">Mức lương mong muốn<span style="color: red">*</span></label>
                <input type="number" id="luong" name="luong"
                    class="form-control"value="{{ isset($ungvien->luong) ? $ungvien->luong : '' }}"
                    placeholder="VD: 8 (8 triệu)">
                <span style="color: red" id="luong_error"></span>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">Trình độ</label>
                <select name="trinhdocmkt" id="trinhdocmkt" class="form-control">
                    <option value="">Chọn trình độ</option>
                    @foreach ($dmtrinhdokythuat as $item)
                        <option value="{{ $item->madmtdkt }}"
                            {{ isset($ungvien->trinhdocmkt) ? ($ungvien->trinhdocmkt == $item->madmtdkt ? 'selected' : '') : '' }}>
                            {{ $item->tentdkt }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">Word</label>
                <select name="word" id="word" class="form-control">
                    <option value="1"
                        {{ isset($ungvien->word) ? ($ungvien->word == '1' ? 'selected' : '') : '' }}>1
                        điểm</option>
                    <option value="2"
                        {{ isset($ungvien->word) ? ($ungvien->word == '2' ? 'selected' : '') : '' }}>2
                        điểm</option>
                    <option value="3"
                        {{ isset($ungvien->word) ? ($ungvien->word == '3' ? 'selected' : '') : '' }}>3
                        điểm</option>
                    <option value="4"
                        {{ isset($ungvien->word) ? ($ungvien->word == '4' ? 'selected' : '') : '' }}>4
                        điểm</option>
                    <option value="5"
                        {{ isset($ungvien->word) ? ($ungvien->word == '5' ? 'selected' : '') : '' }}>5
                        điểm</option>
                    <option value="6"
                        {{ isset($ungvien->word) ? ($ungvien->word == '6' ? 'selected' : '') : '' }}>6
                        điểm</option>
                    <option value="7"
                        {{ isset($ungvien->word) ? ($ungvien->word == '7' ? 'selected' : '') : '' }}>7
                        điểm</option>
                    <option value="8"
                        {{ isset($ungvien->word) ? ($ungvien->word == '8' ? 'selected' : '') : '' }}>8
                        điểm</option>
                    <option value="9"
                        {{ isset($ungvien->word) ? ($ungvien->word == '9' ? 'selected' : '') : '' }}>9
                        điểm</option>
                    <option value="10"
                        {{ isset($ungvien->word) ? ($ungvien->word == '10' ? 'selected' : '') : '' }}>
                        10 điểm</option>
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">Excel</label>
                <select name="excel" id="excel" class="form-control">
                    <option value="1"
                        {{ isset($ungvien->excel) ? ($ungvien->excel == '1' ? 'selected' : '') : '' }}>
                        1 điểm</option>
                    <option value="2"
                        {{ isset($ungvien->excel) ? ($ungvien->excel == '2' ? 'selected' : '') : '' }}>
                        2 điểm</option>
                    <option value="3"
                        {{ isset($ungvien->excel) ? ($ungvien->excel == '3' ? 'selected' : '') : '' }}>
                        3 điểm</option>
                    <option value="4"
                        {{ isset($ungvien->excel) ? ($ungvien->excel == '4' ? 'selected' : '') : '' }}>
                        4 điểm</option>
                    <option value="5"
                        {{ isset($ungvien->excel) ? ($ungvien->excel == '5' ? 'selected' : '') : '' }}>
                        5 điểm</option>
                    <option value="6"
                        {{ isset($ungvien->excel) ? ($ungvien->excel == '6' ? 'selected' : '') : '' }}>
                        6 điểm</option>
                    <option value="7"
                        {{ isset($ungvien->excel) ? ($ungvien->excel == '7' ? 'selected' : '') : '' }}>
                        7 điểm</option>
                    <option value="8"
                        {{ isset($ungvien->excel) ? ($ungvien->excel == '8' ? 'selected' : '') : '' }}>
                        8 điểm</option>
                    <option value="9"
                        {{ isset($ungvien->excel) ? ($ungvien->excel == '9' ? 'selected' : '') : '' }}>
                        9 điểm</option>
                    <option value="10"
                        {{ isset($ungvien->excel) ? ($ungvien->excel == '10' ? 'selected' : '') : '' }}>10 điểm
                    </option>
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">powerpoint</label>
                <select name="powerpoint" id="powerpoint" class="form-control">
                    <option value="1"
                        {{ isset($ungvien->powerpoint) ? ($ungvien->powerpoint == '1' ? 'selected' : '') : '' }}>1 điểm
                    </option>
                    <option value="2"
                        {{ isset($ungvien->powerpoint) ? ($ungvien->powerpoint == '2' ? 'selected' : '') : '' }}>2 điểm
                    </option>
                    <option value="3"
                        {{ isset($ungvien->powerpoint) ? ($ungvien->powerpoint == '3' ? 'selected' : '') : '' }}>3 điểm
                    </option>
                    <option value="4"
                        {{ isset($ungvien->powerpoint) ? ($ungvien->powerpoint == '4' ? 'selected' : '') : '' }}>4 điểm
                    </option>
                    <option value="5"
                        {{ isset($ungvien->powerpoint) ? ($ungvien->powerpoint == '5' ? 'selected' : '') : '' }}>5 điểm
                    </option>
                    <option value="6"
                        {{ isset($ungvien->powerpoint) ? ($ungvien->powerpoint == '6' ? 'selected' : '') : '' }}>6 điểm
                    </option>
                    <option value="7"
                        {{ isset($ungvien->powerpoint) ? ($ungvien->powerpoint == '7' ? 'selected' : '') : '' }}>7 điểm
                    </option>
                    <option value="8"
                        {{ isset($ungvien->powerpoint) ? ($ungvien->powerpoint == '8' ? 'selected' : '') : '' }}>8 điểm
                    </option>
                    <option value="9"
                        {{ isset($ungvien->powerpoint) ? ($ungvien->powerpoint == '9' ? 'selected' : '') : '' }}>9 điểm
                    </option>
                    <option value="10"
                        {{ isset($ungvien->powerpoint) ? ($ungvien->powerpoint == '10' ? 'selected' : '') : '' }}>10
                        điểm
                    </option>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Giới thiệu bản thân</label>
                <textarea name="gioithieu" id="gioithieu" class="form-control" rows="3">{{ isset($ungvien->gioithieu) ? $ungvien->gioithieu : '' }}</textarea>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Mục tiêu nghề nghiệp</label>
                <textarea name="muctieu" id="muctieu" class="form-control" rows="3">{{ isset($ungvien->muctieu) ? $ungvien->muctieu : '' }}</textarea>
            </div>
        </div>
    </div>

    <div class="row">
        <button onclick="storecoban()" class="btn btn-sm btn-info btn-lg pull-right" style="margin-left:1%">
            Lưu cb
        </button>
    </div>
</div>
<script>
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

    function storecoban() {
       
        var email = $('#email').val().trim();

        var hoten = $('#hoten').val().trim();
        var cccd = $('#cccd').val();
        var ngaysinh = $('#ngaysinh').val();
        var phone = $('#phone').val();
        var huyen = $('#huyen').val();
        var xa = $('#xa').val();
        var address = $('#address').val().trim();
        var luong = $('#luong').val();

        var regex =
            /^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/;

            if ($('#case').val() == 'create') {
                var url_link = '/ungvien/storecoban';
                var checkpassword = null;
                var password = $('#password').val().trim();
            }
            if ($('#case').val() == 'edit') {
                var url_link = '/ungvien/updatecoban';
                var checkpassword = document.getElementById('checkpassword').checked;
                var password = true;
            }

        if (hoten != '' &&  cccd != '' && ngaysinh != '' && phone != '' && huyen != '' && xa != '' && address != '' && luong !=
            '' && email != '' && password != '' && regex.test(email) == true) {

            $.ajax({
                url: url_link,
                type: 'POST',
                data: {
                    //thông tin tài khoản
                    _token: CSRF_TOKEN,
                    user: $('#user').val(),
                    email: $('#email').val(),
                    checkpassword: checkpassword,
                    password: $('#password').val(),
                    status: $('#status').val(),

                    // thông tin cơ bản
                    hoten: $('#hoten').val(),
                    cccd: $('#cccd').val(),
                    gioitinh: $('#gioitinh').val(),
                    ngaysinh: $('#ngaysinh').val(),
                    phone: $('#phone').val(),
                    tinh: $('#tinh').val(),
                    huyen: $('#huyen').val(),
                    xa: $('#xa').val(),
                    address: $('#address').val(),
                    capbac: $('#capbac').val(),
                    honnhan: $('#honnhan').val(),
                    hinhthuclv: $('#hinhthuclv').val(),
                    luong: $('#luong').val(),
                    trinhdocmkt: $('#trinhdocmkt').val(),
                    word: $('#word').val(),
                    excel: $('#excel').val(),
                    powerpoint: $('#powerpoint').val(),
                    gioithieu: $('#gioithieu').val(),
                    muctieu: $('#muctieu').val(),
                },
                dataType: 'JSON',
                success: function(data) {
 
                    if (data.status == 'success') {
                        // $('#frm_coban').replaceWith(data.content);
                        $('#user').val(data.user);
                        $('#email_error').html('');
                        $('#cccd_error').html('');
                        $('#password_error').html('');
                        $('#hoten_error').html('');
                        $('#ngaysinh_error').html('');
                        $('#phone_error').html('');
                        $('#huyen_error').html('');
                        $('#xa_error').html('');
                        $('#address_error').html('');
                        $('#luong_error').html('');

                        toastr.success(data.message, "Hoàn thành!");
                    } else {
                        if (data.email) {
                            $('#email_error').html(data.email);
                        }else{
                            $('#email_error').html('');
                        }
                        if (data.cccd) {
                            $('#cccd_error').html(data.cccd);
                        }else{
                            $('#cccd_error').html('');
                        }
                        toastr.error(data.message, "Lỗi!");
                    }
                }
            })
        } else {
  
            if (regex.test(email) == false) {
                $('#email_error').html('Email không hợp lệ');
            } else if (email == '') {
                $('#email_error').html('Email không được để trống');
            } else {
                $('#email_error').html('');
            }
            if (password == '') {
                $('#password_error').html('Mật khẩu không được để trống');
            } else {
                $('#password_error').html('');
            }
            if (hoten == '') {
                $('#hoten_error').html('Họ tên không được để trống');
            } else {
                $('#hoten_error').html('');
            }
            if (cccd == '') {
                $('#cccd_error').html('CCCD không được để trống');
            } else {
                $('#cccd_error').html('');
            }
            if (ngaysinh == '') {
                $('#ngaysinh_error').html('Ngày sinh không được để trống');
            } else {
                $('#ngaysinh_error').html('');
            }
            if (phone == '') {
                $('#phone_error').html('Số điện thoại không được để trống');
            } else {
                $('#phone_error').html('');
            }
            if (huyen == '') {
                $('#huyen_error').html('Huyện không được để trống');
            } else {
                $('#huyen_error').html('');
            }
            if (xa == '') {
                $('#xa_error').html('Xã không được để trống');
            } else {
                $('#xa_error').html('');
            }
            if (address == '') {
                $('#address_error').html('address không được để trống');
            } else {
                $('#address_error').html('');
            }
            if (luong == '') {
                $('#luong_error').html('Mức lương không được để trống');
            } else {
                $('#luong_error').html('');
            }
        }

    }

</script>
