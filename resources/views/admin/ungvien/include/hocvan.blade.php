

<div class="form-body">
    <div class="row col-md-12">
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">Chuyên ngành<span class="require">*</span></label>

                <input type="text" name="chuyennganh" class="form-control" placeholder="VD: Kinh doanh quốc tế"
                    value="">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">Trường <span class="require">*</span></label>

                <input type="text" name="truong" class="form-control" placeholder="VD: Đại học Ngoại Thương"
                    value="">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">Bằng cấp <span class="require">*</span></label>
                <select name="bangcap" class="form-control">
                    <option value="">Chọn bằng cấp</option>
                    @foreach ($dmtrinhdokythuat as $item)
                        <option value="{{ $item->madmtdkt }}">{{ $item->tentdkt }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="row col-md-3">
        <div class="col-md-12">
            <div class="form-group">
                <label class="control-label">Từ ngày </label>
                <input type="date" name="tungay" class="form-control" value="">
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <label class="control-label">Đến ngày </label>
                <input type="date" name="denngay" class="form-control" value="">
            </div>
        </div>

    </div>

    <div class="row col-md-9">
        <div class="col-md-12">
            <div class="form-group">
                <label class="control-label">Thành tựu</label>
                <textarea type="date" name="thanhtuu" class="form-control" rows="6"></textarea>
            </div>
        </div>
    </div>

    <div class="row">
        <button onclick="storehocvan()" class="btn btn-sm btn-info btn-lg pull-right" style="margin-left:49%">
            Lưu
        </button>
    </div>
</div>
