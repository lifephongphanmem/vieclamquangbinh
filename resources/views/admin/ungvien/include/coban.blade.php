


<div class="form-body" id="frm_data">

    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">Ảnh đại diện </label>
                <input type="file" name="avatar" id="avatar" class="form-control" placeholder="Chọn ảnh" value="">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">Họ tên <span class="require">*</span></label>
                <input type="text" name="hoten" id="hoten" class="form-control" placeholder="Nhập đầy đủ Họ và Tên"
                    value="" required>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">Giới tính <span class="require">*</span></label>
                <select name="gioitinh"  id="gioitinh" class="form-control">
                    <option value="Nữ">Nữ</option>
                    <option value="Nam">Nam</option>
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">Số điện thoại<span class="require">*</span></label>
                <input type="number" name="phone"  id="phone" class="form-control" value="" required>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <?php $danhmuc_tinh = $danhmuc->where('capdo', 'T'); ?>
                <label class="control-label">Tỉnh<span class="require">*</span></label>
                <select name="tinh"  id="tinh"class="form-control">
                    @foreach ($danhmuc_tinh as $item)
                        <option value="{{ $item->maquocgia }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <?php $danhmuc_huyen = $danhmuc->where('capdo', 'H'); ?>
                <label class="control-label">Huyện<span class="require">*</span></label>
                <select name="huyen"  id="huyen" class="form-control select2basic" required>
                    <option value="">Chọn huyện</option>
                    @foreach ($danhmuc_huyen as $item)
                        <option value="{{ $item->maquocgia }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <?php $danhmuc_xa = $danhmuc->where('capdo', 'X'); ?>
                <label class="control-label">Xã<span class="require">*</span></label>
                <select name="xa"  id="xa" class="form-control select2basic" required>
                    <option value="">Chọn xã</option>
                    @foreach ($danhmuc_xa as $item)
                        <option value="{{ $item->maquocgia }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">address<span class="require">*</span></label>
                <input type="text" name="address"  id="address" class="form-control" placeholder="số nhà-Tên đường/Xóm-Thôn"
                    required>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">Chức danh<span class="require">*</span></label>
                <select name="chucdanh"  id="chucdanh" class="form-control" value="">
                    <option value="">Chọn chức danh</option>
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">Trạng thái hôn nhân<span class="require">*</span></label>>
                <select name="honnhan" id="honnhan" class="form-control">
                    <option value="0">Độc thân</option>
                    <option value="1">Đã kết hôn</option>
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">Hình thức làm việc<span class="require">*</span></label>
                <select name="hinhthuclv"  id="hinhthuclv" class="form-control" value="">
                    <option>Full time</option>
                    <option>Freelance</option>
                    <option>Part time</option>
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">Mức lương mong muốn<span class="require">*</span></label>
                <input type="number" id="luong"  name="luong" class="form-control" value="">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">Trình độ</label>
                <select name="trinhdocmkt"  id="trinhdocmkt" class="form-control">
                    <option value="">Chọn trình độ</option>
                    @foreach ($dmtrinhdokythuat as $item)
                        <option value="{{ $item->madmtdkt }}">{{ $item->tentdkt }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">Word</label>
                <select name="word"  id="word" class="form-control">
                    <option value="1">1 điểm</option>
                    <option value="2">2 điểm</option>
                    <option value="3">3 điểm</option>
                    <option value="4">4 điểm</option>
                    <option value="5">5 điểm</option>
                    <option value="6">6 điểm</option>
                    <option value="7">7 điểm</option>
                    <option value="8">8 điểm</option>
                    <option value="9">9 điểm</option>
                    <option value="10">10 điểm</option>
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">Excel</label>
                <select name="excel"  id="excel" class="form-control">
                    <option value="1">1 điểm</option>
                    <option value="2">2 điểm</option>
                    <option value="3">3 điểm</option>
                    <option value="4">4 điểm</option>
                    <option value="5">5 điểm</option>
                    <option value="6">6 điểm</option>
                    <option value="7">7 điểm</option>
                    <option value="8">8 điểm</option>
                    <option value="9">9 điểm</option>
                    <option value="10">10 điểm</option>
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">powerpoint</label>
                <select name="powerpoint"  id="powerpoint" class="form-control">
                    <option value="1">1 điểm</option>
                    <option value="2">2 điểm</option>
                    <option value="3">3 điểm</option>
                    <option value="4">4 điểm</option>
                    <option value="5">5 điểm</option>
                    <option value="6">6 điểm</option>
                    <option value="7">7 điểm</option>
                    <option value="8">8 điểm</option>
                    <option value="9">9 điểm</option>
                    <option value="10">10 điểm</option>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Giới thiệu bản thân</label>
                <textarea name="gioithieu" id="gioithieu" class="form-control" rows="3"></textarea>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Mục tiêu nghề nghiệp</label>
                <textarea name="muctieu"  id="muctieu" class="form-control" rows="3"></textarea>
            </div>
        </div>
    </div>

    {{-- <div class="row">
        <button type="submit" class="btn btn-sm btn-info btn-lg pull-right" style="margin-left:49%">
            Lưu
        </button>
    </div> --}}
    <div class="row">
        <button onclick="storecoban()" class="btn btn-sm btn-info btn-lg pull-right" style="margin-left:49%">
            Lưu
        </button>
    </div>
</div>
