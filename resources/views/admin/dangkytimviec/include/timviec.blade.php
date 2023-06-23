<div class="form-body">
    <div class="row">

        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">Tên vị trí công việc</label>
                <input type="text" name="tencongviec[]" class="form-control"  value="{{isset($model)?$model->tencongviec:''}}" >
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">Mã nghề</label>
                <select name="manghe[]" class="form-control " style="width: 100%;">
                    <option value="">---Chọn mã nghề--</option>
                    @foreach ($dmmanghetrinhdo as $val)
                        <option value="{{$val->stt}}" {{isset($model)?($model->manghe==$val->stt?'selected':''):''}}>{{$val->tenmntd}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">Chức vụ</label>
                <select name="chucvu[]" class="form-control ">
                    <option value="">---Chọn chức vụ</option>
                    @foreach ($dmchucvu as $val)
                        <option value="{{$val->id}}" {{isset($model)?($model->chucvu==$val->id?'selected':''):''}}>{{$val->tencv}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">Loại hình kinh tế</label>
                <select  name="loaihinhkt[]" class="form-control " style="width: 100%;">
                <option value="">---Chọn loại hình kinh tế</option>
                    @foreach ($dmloaihinhhdkt as $val)
                        <option value="{{$val->id}}" {{isset($model)?($model->loaihinhkt==$val->id?'selected':''):''}}>{{$val->tenlhkt}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">Loại HĐLĐ </label>
                <select name="loaihdld[]" class="form-control " >
                    <?php foreach ( $list_hdld as $td){ ?>
                    <option value='{{ $td->name }}' {{isset($model)?($model->loaihdld==$td->name?'selected':''):''}}>{{ $td->name }}</option>
                    <?php } ?>
                </select>
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">Khả năng đáp ứng</label>
                <select  name="khanangcongtac[]" class="form-control">
                    <option value="">---Chọn khả năng đáp ứng---</option>
                    <option value="Làm ca" {{isset($model)?($model->khanangcongtac=='Làm ca'?'selected':''):''}}>Làm ca</option>
                    <option value="Đi công tác" {{isset($model)?($model->khanangcongtac=='Đi công tác'?'selected':''):''}}>Đi công tác</option>
                    <option value="Đi biết phái" {{isset($model)?($model->khanangcongtac=='Đi biết phái'?'selected':''):''}}>Đi biết phái</option>
                </select>
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">Hình thức làm việc</label>
                <select  name="hinhthuclv[]" class="form-control">
                    <option value="">---Chọn hình thức làm việc---</option>
                    <option value="Toàn thời gian" {{isset($model)?($model->hinhthuclv=='Toàn thời gian'?'selected':''):''}}>Toàn thời gian</option>
                    <option value="Bán thời gian"  {{isset($model)?($model->hinhthuclv=='Bán thời gian'?'selected':''):''}}>Bán thời gian</option>
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">Mục đích làm việc</label>
                <select name="mucdichlv[]" id="mucdichlv" class="form-control">
                      <option value="">---Chọn mục đích làm việc---</option>
                    <option value="Làm việc lâu dài" {{isset($model)?($model->mucdichlv=='Làm việc lâu dài'?'selected':''):''}}>Làm việc lâu dài</option>
                    <option value="Làm việc tạm thời"  {{isset($model)?($model->mucdichlv=='Làm việc tạm thời'?'selected':''):''}}>Làm việc tạm thời</option>
                    <option value="Làm thêm"  {{isset($model)?($model->mucdichlv=='Làm thêm'?'selected':''):''}}>Làm thêm</option>
                </select>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">Lương </label>
                <select type="text" name="luong[]" class="form-control">
                    <option value="">---Chọn mức lương---</option>
                    <option value="Dưới 5 triệu" {{isset($model)?($model->luong=='Dưới 5 triệu'?'selected':''):''}}>Dưới 5 triệu</option>
                    <option value="5 - 10 triệu" {{isset($model)?($model->luong=='5 - 10 triệu'?'selected':''):''}}>5 - 10 triệu</option>
                    <option value="10 - 20 triệu" {{isset($model)?($model->luong=='10 - 20 triệu'?'selected':''):''}}>10 - 20 triệu</option>
                    <option value="20 - 50 triệu" {{isset($model)?($model->luong=='20 - 50 triệu'?'selected':''):''}}>20 - 50 triệu</option>
                    <option value=">50 triệu" {{isset($model)?($model->luong=='>50 triệu'?'selected':''):''}}>>50 triệu</option>
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">Hỗ trợ ăn</label>
                <select name="hotroan[]" id="hotroan" class="form-control">
                    <option value="">---Chọn hỗ trợ ăn---</option>
                    <option value="1 bữa" {{isset($model)?($model->hotroan=='1 bữa'?'selected':''):''}}>1 bữa</option>
                    <option value="2 bữa" {{isset($model)?($model->hotroan=='2 bữa'?'selected':''):''}}>2 bữa</option>
                    <option value="3 bữa" {{isset($model)?($model->hotroan=='3 bữa'?'selected':''):''}}>3 bữa</option>
                    <option value="Bằng tiền" {{isset($model)?($model->hotroan=='Bằng tiền'?'selected':''):''}}>Bằng tiền</option>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Phúc lợi : <span style="font-style: italic">{{isset($model) ? $model->phucloi :''}}</span></label><br>

                <input type="hidden" name="phucloi[]" class="phucloival" value="">
                <input type="checkbox" class="phucloi" value="Đóng BHXH, BHYT, BHTN"  >
                Đóng BHXH, BHYT, BHTN
                <input type="checkbox" class="phucloi" value="Đóng BHNT"  > Đóng BHNT
                <input type="checkbox" class="phucloi" value="Trợ cấp thôi việc" > Trợ
                cấp thôi việc
                <input type="checkbox" class="phucloi" value="Nhà trẻ"  > Nhà trẻ
                <input type="checkbox" class="phucloi" value="Xe đưa đón"  > Xe đưa đón
                <input type="checkbox" class="phucloi" value="Hỗ trợ đi lại"  > Hỗ trợ
                đi lại
                <input type="checkbox" class="phucloi" value="Hỗ trợ nhà ở" > Hỗ trợ
                nhà ở<br>
                <input type="checkbox" class="phucloi" value="Ký túc xá" > Ký túc xá
                <input type="checkbox" class="phucloi" value="Đào tạo" > Đào tạo
                <input type="checkbox" class="phucloi"
                    value="Lối đi người khuyết tật"  > Lối đi người khuyết tật
                <input type="checkbox" class="phucloi" value="Cơ hội thăng tiến" > Cơ
                hội thăng tiến
     
                <input type="checkbox" id="checkphucloikhac"> Khác <input
                 type="text" id="phucloikhac" value="" size=30 placeholder="Nhập phúc lợi khác">
            </div>
        </div>
 
    </div>
    <div class="row">
        <div class="col-sm-3" >
            <label>Nhóm ngành nghề</label>
            <select name="linhvuc[]" class="form-control">
                <option {{ isset($model)?($model->linhvuc == "Lĩnh vực xây dựng" ? 'selected' : ''):'' }}>Lĩnh vực xây dựng</option>
                <option {{ isset($model)?($model->linhvuc == "Lĩnh vực kinh tế" ? 'selected' : ''):'' }}>Lĩnh vực kinh tế</option>
                <option {{ isset($model)?($model->linhvuc == "Lĩnh vực dịch vụ" ? 'selected' : ''):'' }}>Lĩnh vực dịch vụ</option>
                <option {{ isset($model)?($model->linhvuc == "Lĩnh vực kỹ thuật" ? 'selected' : ''):'' }}>Lĩnh vực kỹ thuật</option>
                <option {{ isset($model)?($model->linhvuc == "Lĩnh vực LDPT" ? 'selected' : ''):'' }}>Lĩnh vực LDPT</option>
                <option {{ isset($model)?($model->linhvuc == "Lĩnh vực khác" ? 'selected' : ''):'' }}>Lĩnh vực khác</option>
 
            </select>
        </div>
    </div>
    {{-- <div class="row">
        <div class="col-sm-3" >
            <label>Phiên giao dịch</label>
            <select name="phiengd[]" class="form-control">
                <option {{ isset($model)?($model->phiengd == "Phiên định kỳ" ? 'selected' : ''):'' }}>Phiên định kỳ</option>
                <option {{ isset($model)?($model->phiengd == "Phiên đột xuất" ? 'selected' : ''):'' }}>Phiên đột xuất</option>
                <option {{ isset($model)?($model->phiengd == "Phiên online" ? 'selected' : ''):'' }}>Phiên online</option>
            </select>
        </div>
    </div> --}}

</div>