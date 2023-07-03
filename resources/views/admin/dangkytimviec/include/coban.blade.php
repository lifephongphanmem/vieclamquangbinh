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
                <input type="text" name="cccd[]" class="form-control" placeholder="CMND/CCCD" value="{{isset($model)?$model->cccd:''}}" required>
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">Ngày sinh (*)</label>
                <input type="date" name="ngaysinh[]" class="form-control" value="{{isset($model)? $model->ngaysinh:''}}" required>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">Giới tính</label>
                <select class="form-control " name="gioitinh[]"  style="width: 100%;">
                    <option value='Nam' {{isset($model)?($model->gioitinh=='Nam'?'selected':''):''}}>Nam</option>
                    <option value='Nữ'{{isset($model)?($model->gioitinh=='Nữ'?'selected':''):''}}>Nữ</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">Dân tộc </label>
                <input type="text" name="dantoc[]" placeholder="Tên dân tộc" class="form-control" value="{{isset($model)?$model->dantoc:''}}" >
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">Số điện thoại</label>
                <input type="text" name="phone[]" placeholder="Số điện thoại" class="form-control" value="{{isset($model)?$model->phone:''}}">
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">Nơi đăng ký thường trú(*)</label>
                <input type="text" name="thuongtru[]"  class="form-control" value="{{isset($model)?$model->thuongtru:''}}" required>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">Nơi ở hiện nay</label>
                <input type="text" name="tamtru[]"  class="form-control" value="{{isset($model)?$model->tamtru:''}}">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">Trình độ giáo dục </label><br>
                <select class="form-control " name="trinhdogiaoduc[]" style="width: 100%;">
                    <option value="">---Chọn trình độ giáo dục---</option>
                    <?php foreach ( $dmtrinhdogdpt as $td){ ?>
                        <option value='{{ $td->stt }}' {{isset($model)?($model->trinhdogiaoduc==$td->stt?'selected':''):''}}>{{ $td->tengdpt }}</option>
                        <?php } ?>
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">Trình độ CMKT </label><br>
                <select class="form-control " name="trinhdocmkt[]"  style="width: 100%;">
                    <option value="">---Chọn trình độ CMKT---</option>
                    <?php foreach ( $dmtrinhdokythuat as $td){ ?>
                        <option value='{{ $td->stt }}' {{isset($model)?($model->trinhdocmkt==$td->stt?'selected':''):''}}>{{ $td->tentdkt }}</option>
                        <?php } ?>
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">Tin học văn phòng </label>
                <select class="form-control " name="loaithvp[]">
                    <option value="">---Chọn xếp loại tin học văn phòng---</option>
                    <option value='Trung bình' {{isset($model)?($model->loaithvp=='Trung bình'?'selected':''):''}}>Trung bình</option>
                    <option value='Khá' {{isset($model)?($model->loaithvp=='Khá'?'selected':''):''}}>Khá</option>
                    <option value='Tốt' {{isset($model)?($model->loaithvp=='Tốt'?'selected':''):''}}>Tốt</option>
                </select>
            </div>
        </div>

        <div class="col-md-2"> 
            <div class="form-group">   
                <label class="control-label">Tin học khác </label>
                <input type="text" class="form-control" name="tinhockhac[]" value="{{isset($model)?$model->tinhockhac:''}}">
            </div>
        </div>
        <div class="col-md-1"> 
            <div class="form-group"> 
                <label class="control-label">Xếp loại </label>
                <select class="form-control " name="loaithk[]" >
                    <option value='Trung bình' {{isset($model)?($model->loaithk=='Trung bình'?'selected':''):''}}>Trung bình</option>
                    <option value='Khá' {{isset($model)?($model->loaithk=='Khá'?'selected':''):''}}>Khá</option>
                    <option value='Tốt' {{isset($model)?($model->loaithk=='Tốt'?'selected':''):''}}>Tốt</option>
                </select>
            </div>
        </div>
    </div>

    <div class="row">
        <label class="col-sm-12" >Trình độ ngoại ngữ</label>

        <div class="col-sm-2" >
            <div class="form-group">
                <span >Ngoại ngữ 1 </span>
                <input type="text"  class="form-control"name="ngoaingu1[]" value="{{isset($model)?$model->ngoaingu1:''}}">
            </div>
        </div>

        <div class="col-sm-2">
            <div class="form-group">
                <span > Chứng chỉ</span> 
                <input type="text" name="chungchinn1[]" class="form-control"value="{{isset($model)?$model->chungchinn1:''}}">
            </div>
         </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <span >Xếp loại</span>
                    <select class="form-control"  name="xeploainn1[]" >
                        <option value='Trung bình' {{isset($model)?($model->xeploainn1=='Trung bình'?'selected':''):''}}>Trung bình</option>
                        <option value='Khá' {{isset($model)?($model->xeploainn1=='Khá'?'selected':''):''}}>Khá</option>
                        <option value='Tốt' {{isset($model)?($model->xeploainn1=='Tốt'?'selected':''):''}}>Tốt</option>  
                    </select>
                </div>
            </div>
        
        <div class="col-sm-3">
            <div class="form-group">
                <span >Kinh nghiệm trong lĩnh vực</span>
                <select class="form-control " name="kinhnghiem[]">
                    <option value='Chưa có kinh nghiệm' {{isset($model)?($model->kinhnghiem=='Chưa có kinh nghiệm'?'selected':''):''}}>Chưa có kinh nghiệm</option>
                    <option value='Dưới 1 năm' {{isset($model)?($model->kinhnghiem=='Dưới 1 năm'?'selected':''):''}}>Dưới 1 năm</option>
                    <option value='1 đến 2 năm' {{isset($model)?($model->kinhnghiem=='1 đến 2 năm'?'selected':''):''}}>1 đến 2 năm</option>
                    <option value='2 đên 5 năm' {{isset($model)?($model->kinhnghiem=='2 đên 5 năm'?'selected':''):''}}>2 đên 5 năm</option>
                    <option value='Trên 5 năm' {{isset($model)?($model->kinhnghiem=='Trên 5 năm'?'selected':''):''}}>Trên 5 năm</option>
                </select>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                <span >Thuộc đối tượng người khuyết tật</span>
                <select class="form-control " name="nguoikhuyettat[]">
                    <option value='Không' {{isset($model)?($model->nguoikhuyettat=='Không'?'selected':''):''}}>Không</option>
                    <option value='Có' {{isset($model)?($model->nguoikhuyettat=='Có'?'selected':''):''}}>Có</option>
                </select>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-2" >
            <div class="form-group">
                <span >Ngoại ngữ 2 </span>
                <input type="text"  class="form-control"name="ngoaingu2[]" value="{{isset($model)?$model->ngoaingu2:''}}">
            </div>
         </div>
        <div class="col-sm-2">
            <div class="form-group">
                <span > Chứng chỉ</span> 
                <input type="text" name="chungchinn2[]" class="form-control" value="{{isset($model)?$model->chungchinn2:''}}">
            </div>
        </div>
        <div class="col-sm-2">
            <div class="form-group">
                <span >Xếp loại</span>
                <select class="form-control" name="xeploainn2[]" >
                    <option value='Trung bình' {{isset($model)?($model->xeploainn2=='Trung bình'?'selected':''):''}}>Trung bình</option>
                    <option value='Khá' {{isset($model)?($model->xeploainn2=='Khá'?'selected':''):''}}>Khá</option>
                    <option value='Tốt' {{isset($model)?($model->xeploainn2=='Tốt'?'selected':''):''}}>Tốt</option> 
                </select>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <span >Kỹ năng mềm : <span style="font-style: italic">{{ isset($model) ? $model->kynangmem: '' }}</span></span><br>
                <input type="hidden" name="kynangmem[]" class="kynangmemval" value="">
                <input type="checkbox" class="kynangmem" value="Giao tiếp" >Giao tiếp
                <input type="checkbox" class="kynangmem" value="Thuyết trình" >Thuyết trình
                <input type="checkbox" class="kynangmem" value="Quản lý thời gian" >Quản lý thời gian
                <input type="checkbox" class="kynangmem" value="Quản lý nhân sự" >Quản lý nhân sự
                <input type="checkbox" class="kynangmem" value="Tổng hợp báo cáo" >Tổng hợp báo cáo
                <input type="checkbox" class="kynangmem" value="Thích ứng" >Thích ứng
                <input type="checkbox" class="kynangmem" value="Làm việc nhóm" >Làm việc nhóm<br>
                <input type="checkbox" class="kynangmem" value="Làm việc độc lập" >Làm việc độc lập
                <input type="checkbox" class="kynangmem" value="Chịu áp lực" >Chịu áp lực
                <input type="checkbox" class="kynangmem" value="Theo dõi giám sát" >Theo dõi giám sát
                <input type="checkbox" class="kynangmem" value="Tư duy phản biện" >Tư duy phản biện
                <input type="checkbox" id="checkkynangmemkhac"> Khác <input
                type="text" id="kynangmemkhac" value="" size=30 placeholder="Nhập kỹ năng mềm khác">
            </div>   
        </div>  
 
    </div>

    <div class="row">
        <div class="col-sm-3" >
            <div class="form-group">
                <span>Tên doanh nghiệp (*)</span>
                <input type="text" class="form-control" name="tendn[]" value="{{isset($model)?$model->tendn:''}}" required>
            </div>
         </div>
        <div class="col-sm-3">
            <div class="form-group">
                <span>Mã DKKD (*)</span> 
                <input type="text" name="madkkd[]" class="form-control" value="{{isset($model)?$model->madkkd:''}}" required>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                <span>Đạt sơ tuyển sau phỏng vấn (*)</span> 
                <select name="datsotuyen[]" id="datsotuyen" class="form-control" >
                    <option value="">---Chưa chọn---</option>
                    <option value='Đạt' {{isset($model)?($model->datsotuyen=='Đạt'?'selected':''):''}}>Đạt</option>
                    <option value='Không đạt' {{isset($model)?($model->datsotuyen=='Không đạt'?'selected':''):''}}>Không đạt</option>
                </select>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                <span>Nhận được việc sau phỏng vấn (*)</span> 
                <select name="nhanduocviec[]" id="nhanduocviec" class="form-control" >
                    <option value="">---Chưa chọn---</option>
                    <option value='Có' {{isset($model)?($model->datsotuyen=='Có'?'selected':''):''}}>Có</option>
                    <option value='Không' {{isset($model)?($model->datsotuyen=='Không'?'selected':''):''}}>Không</option>
                </select>
            </div>
        </div>
    </div>

</div>