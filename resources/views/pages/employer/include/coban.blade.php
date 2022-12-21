<div class="form-body">
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">Họ tên <span class="require">*</span></label>
                {{-- {!!Form::text('tencanbo', null, array('id' => 'tencanbo','class' => 'form-control', 'required'=>'required'))!!} --}}
                <input type="text" name="hoten[]" class="form-control" placeholder="Nhập đầy đủ Họ và Tên" value="{{isset($model)?$model->hoten:''}}" required>
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">Số CMND/CCCD (*)</label>
                <input type="text" name="cmnd[]" class="form-control" placeholder="CMND/CCCD" value="{{isset($model)?$model->cmnd:''}}" required>
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">Ngày sinh (*)</label>
                <input type="date" name="ngaysinh[]" class="form-control" value="{{isset($model)?$model->ngaysinh:''}}" required>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">Giới tính</label>
                <select class="form-control input-sm m-bot5 select2basic" name="gioitinh[]">
                    <option value='Nam' {{isset($model)?($model->gioitinh=='Nam'?'selected':''):''}}>Nam</option>
                    <option value='Nữ'{{isset($model)?($model->gioitinh=='Nữ'?'selected':''):''}}>Nữ</option>
                </select>
            </div>
        </div>

    </div>

    <div class="row">

        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">Dân tộc (*)</label>
                <input type="text" name="dantoc[]" placeholder="Tên dân tộc" class="form-control" value="{{isset($model)?$model->dantoc:''}}" required>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">Vị trí </label>
                <input type="text" name="vitri[]" class="form-control">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">Chức vụ </label>
                <input type="text" name="chucvu[]" class="form-control">
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">Số điện thoại</label>
                <input type="text" name="phone[]" placeholder="Số điện thoại" class="form-control" value="{{isset($model)?$model->phone:''}}">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">Trình độ giáo dục </label>
                <select class="form-control input-sm m-bot15 select2basic" name="trinhdogiaoduc[]">
                    <?php foreach ( $list_tdgd as $td){ ?>
                        <option value='{{ $td->name }}'>{{ $td->name }}</option>
                        <?php } ?>
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">Trình độ CMKT </label>
                <select class="form-control input-sm m-bot15 select2basic" name="trinhdocmkt[]">
                    <?php foreach ( $list_cmkt as $td){ ?>
                        <option value='{{ $td->name }}'>{{ $td->name }}</option>
                        <?php } ?>
                </select>
            </div>
        </div>
        {{-- <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">Chuyên ngành đào tạo</label>
                <select class="form-control input-sm m-bot15 select2basic" name="chuyenmondaotao">
                    <option value=''>-- Chọn chuyên ngành --</option>
                    @foreach ($list_linhvuc as $lv )
                        <option value="{{$lv->id}}" {{isset($model)?($lv->id == $model->chuyenmondaotao?'selected':''):''}}>{{$lv->tendm}}</option>
                    @endforeach
                </select>
            </div>
        </div> --}}
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">Lĩnh vực đào tạo</label>
                <select class="form-control input-sm m-bot15 select2basic" name="linhvucdaotao[]">
                    <option value=''>-- Chọn lĩnh vực --</option>
                    <?php foreach ( $list_linhvuc as $td){ ?>
                        <option value='{{ $td->name }}'>{{ $td->name }}</option>
                        <?php } ?>
                </select>
            </div>
        </div> 
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">Nghề nghiệp</label>
                <select class="form-control input-sm m-bot15 select2basic" name="nghenghiep[]">
                    <option value=''>Chọn nghề nghiệp</option>
                    <?php foreach ( $list_nghe as $td){ ?>
                        <option value='{{ $td->name }}'>{{ $td->name }}</option>
                        <?php } ?>
                </select>
            </div>
        </div>

    </div>

    <div class="row" >
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">Tỉnh</label>
                <input type="text" name="tinh[]" class="form-control" required>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">Huyện</label>
                <input type="text" name="huyen[]" class="form-control">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">Xã</label>
                <input type="text" name="xa[]" class="form-control">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">Địa chỉ</label>
                {!! Form::text('address[]', isset($model)?$model->tamtru:null, ['class' => 'form-control','placeholder'=>'Thôn - Xã - Huyện']) !!}
            </div>
        </div>


    </div>
</div>
<input type="hidden" name='nation' value="VN">