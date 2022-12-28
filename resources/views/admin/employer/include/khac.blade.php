<div class="form-body">
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">Phụ cấp chức vụ </label>
                {{-- {!!Form::text('tencanbo', null, array('id' => 'tencanbo','class' => 'form-control', 'required'=>'required'))!!} --}}
                <input type="text" name="pcchucvu[]" class="form-control">
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">Phụ cấp thâm niên</label>
                <input type="text" name="pcthamnien[]" class="form-control">
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">Phụ cấp thâm niên nghề</label>
                <input type="text" name="pcthamniennghe[]" class="form-control">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">Phụ cấp lương</label>
                <input type="text" name="pcluong[]" class="form-control">
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-md-3">
            <label class="control-label">Lương</label>
            <input type="text" name="luong[]" class="form-control">
        </div>
        <div class="col-md-3">
            <label class="control-label">Phụ cấp bổ sung</label>
            <input type="text" name="pcbosung[]" class="form-control">
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">Ngày bắt đầu NN độc hại, nặng nhọc</label>
                <input type="date" name="bddochai[]" class="form-control">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">Ngày kết thúc NN độc hại, nặng nhọc</label>
                <input type="date" name="ktdochai[]" id="ktdochai" class="form-control">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">Loại HĐLĐ </label>
                <select class="form-control input-sm m-bot15" name="loaihdld[]">
                    <?php foreach ( $list_hdld as $td){ ?>
                    <option value='{{ $td->name }}'>{{ $td->name }}</option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">Ngày hiệu lực HĐLĐ </label>
                <input type="date" name="bdhopdong[]" id="bdhopdong" class="form-control">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">Ngày kết thúc HĐLĐ </label>
                <input type="date" name="kthopdong[]" id="kthopdong" class="form-control">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label>Tuyển dụng từ TTDVVL</label>
                <select class="form-control input-sm m-bot5" name="fromttdvvl[]">
                    <option value='1' selected>Đúng</option>
                    <option value='0'>Sai</option>
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label class="control-label">Số sổ BHXH </label>
                    <input type="text" name="sobaohiem[]" id="sobaohiem" class="form-control">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label class="control-label">Ngày bắt đầu BHXH </label>
                    <input type="date" name="bdbhxh[]" id="bdbhxh" class="form-control">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label class="control-label">Ngày kết thúc BHXH </label>
                    <input type="date" name="ktbhxh[]" id="ktbhxh" class="form-control">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label class="control-label">Mức lương đóng BHXH </label>
                    <input type="text" name="luongbhxh[]" id="luongbhxh" class="form-control">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <label>Ghi chú</label>
                <textarea name="ghichu[]" class="form-control"rows='2'> </textarea>
            </div>
        </div>
    </div>
</div>