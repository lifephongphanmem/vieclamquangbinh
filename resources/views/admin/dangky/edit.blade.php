@extends('pages.layout')
@section('mainpanel')
<div class="row ">	
	<div class="col-sm-10 col-sm-offset-1">
		<div class="top-menu">
			@include('pages.menu.dnmenu')
			@yield('top-menu') 
		</div>
	</div>
</div>

<div class="clear" style="clear:both;"></div>
			<section class="panel">
 <div class="col-sm-8 col-sm-offset-2">                   
<div class="clear" style="clear:both;"><h3> Thay đổi thông tin</h3> </div>
</div>
					<form role="form" method="POST" action="{{URL::to('laodong-fu')}}" enctype= 'multipart/form-data'>
									 {{ csrf_field() }}
			
	<div class="row ">	
		<div class="col-sm-3 col-sm-offset-8 text-right">			
		
			<button type="button" class="btn btn-danger  " onclick="javascript:window.location='{{URL::to('report-fa')}}';" > Quay về </button>
			<br>
			<br>
	</div>	
	</div>	
	<div class="row ">	
		<div class="col-sm-4 col-sm-offset-2 ">		
			<div class="form-group">
			<label >Nội dung khai báo</label>
				<textarea   name ="note" class="form-control"rows='8' required> </textarea>						
			</div>
		</div>
		<div class="col-sm-2 ">	
			<div class="form-group">
				<label >Người khai báo</label>
			<input type="text" name ="username" class="form-control" readonly value="{{Auth::user()->name}}" >
			</div>
			<div class="form-group">
				<label >Ngày khai báo</label>
			<input type="text" name ="date_create" class="form-control" readonly value="{{date('d/m/Y')}}" >
			</div>
			<div class="form-group">
				<label >Số lượng</label>
			<input type="text" name ="quantity" id="quantity" class="form-control" readonly value="1" >
			</div>
		</div>
		<div class="col-sm-3 ">	
		<br>
		<button type="submit" name="action" value="{{$action}}" class="btn btn-warning btn-lg"> <?php	
			switch($action){
			case "tamdung":echo "Tạm dừng"; break;
			case "kethuctamdung":echo "Kết thúc tạm dừng"; break;
			case "delete":echo "Báo giảm"; break;
			case "update":echo "Cập nhật"; break;
			

				} ?> 
		</button>
			
		
		</div>
		
	</div>
	                 
                        <div class="panel-body" id='dynamicTable'>
						
						<div class="row" id ="1stld">
							<fieldset class="col-sm-8 col-sm-offset-2" >
							<legend class="w-auto px-3">		
								<button type="button"   class="btn btn-success">Người lao động</button>            
							</legend>
							<div class="col-sm-4 col-sm-offset-0">
                              
							   <div class="form-group">
									<label >Họ và Tên</label>

										<input type="text" name ="hoten" value="{{$ld->hoten}}" class="form-control" required >
								
								</div>
								<div class="form-group">
									<label >Số CMND/CCCD</label>

										<input type="text" name ="cmnd" value="{{$ld->cmnd}}" class="form-control" required >
								
								</div>
								<div class="form-group">
									<label > Giới tính  </label>
									<select class="form-control input-sm m-bot5" name ="gioitinh" >
											<option value='nam'  >Nam</option>
											<option value='nu' <?php if($ld->gioitinh=="nu") echo "selected"; ?>>Nữ</option>
											
										</select></div>
								<div class="form-group">
									<label >Ngày tháng năm sinh</label>
										<input type="date" name ="ngaysinh" value="{{$ld->ngaysinh}}" class="form-control" required >						
								</div>	
								<div class="form-group">
									<label >Quốc tịch</label>
										<select class="form-control input-sm m-bot5" name ="nation" >
										<?php foreach ( $countries_list as $key => $value){ ?>
											<option value='{{$key}}' <?php if($key==$ld->nation) echo"selected" ;?>>{{$value}}</option>
										<?php } ?>	
										</select>
								</div>
								<div class="form-group">
									<label >Dân tộc</label>
										<input type="text" name ="dantoc" value="{{$ld->dantoc}}" class="form-control" required >						
								</div>	
								
								<div class="form-group">
									<label >Tỉnh</label>
										<input type="text" name ="tinh" value="{{$ld->tinh}}" class="form-control" required >					
								</div>
								<div class="form-group">
									<label >Huyện Thị</label>
										<input type="text" name ="huyen" value="{{$ld->huyen}}" class="form-control"  >					
								</div>
								
								<div class="form-group">
									<label >Phường xã</label>
										<input type="text" name ="xa" value="{{$ld->xa}}" class="form-control"  >					
								</div>	
								<div class="form-group">
									<label >Địa chỉ</label>
										<input type="text" name ="address" value="{{$ld->address}}" class="form-control"  >						
								</div>
								<div class="form-group">
									<label >Vị trí</label>
										<input type="text" name ="vitri" value="{{$ld->vitri}}"  class="form-control"  >						
								</div>
							</div>
							<div class="col-sm-4">
							
								
								<div class="form-group">
									<label >Chức vụ</label>
										<input type="text" name ="chucvu" value="{{$ld->chucvu}}"  class="form-control"  >						
								</div>
								<div class="form-group">
									<label >Trình độ Giáo dục</label>
										<select class="form-control input-sm m-bot15" name ="trinhdogiaoduc" >
											<?php foreach ( $list_tdgd as $td){ ?>
											<option value='{{$td->id}}'  <?php if($td->id==$ld->trinhdogiaoduc) echo"selected" ;?> >{{$td->name}}</option>
											<?php } ?>	
											
											
										</select>
								</div>
								<div class="form-group">
									<label >Trình độ CMKT</label>
										<select class="form-control input-sm m-bot15" name ="trinhdocmkt" >
											
											<?php foreach ( $list_cmkt as $td){ ?>
											<option value='{{$td->id}}'  <?php if($td->id==$ld->trinhdocmkt) echo"selected" ;?> >{{$td->name}}</option>
											<?php } ?>	
											
										</select>
								</div>
								<div class="form-group">
									<label >Ngành nghề </label>
										<select class="form-control input-sm m-bot15" name ="nghenghiep" >
											
											<?php foreach ( $list_nghe as $td){ ?>
											<option value='{{$td->id}}'  <?php if($td->id==$ld->nghenghiep) echo"selected" ;?> >{{$td->name}}</option>
											<?php } ?>	
										</select>
								</div>
								
								<div class="form-group">
									<label >Lĩnh vực đào tạo </label>
										<select class="form-control input-sm m-bot15" name ="linhvucdaotao" >
											
											<?php foreach ( $list_linhvuc as $td){ ?>
											<option value='{{$td->id}}'  <?php if($td->id==$ld->linhvucdaotao) echo"selected" ;?>>{{$td->name}}</option>
											<?php } ?>	
										</select>
								</div>
								
								
								<div class="form-group">
									<label >Mức lương</label>
										<input type="text" name ="luong" value="{{$ld->luong}}"  class="form-control" required >						
								</div>
								<div class="form-group">
									<label >Phụ cấp chức vụ</label>
										<input type="text" name ="pcchucvu" value="{{$ld->pcchucvu}}"  class="form-control"  >						
								</div>
								<div class="form-group">
									<label >Phụ cấp thâm niên</label>
										<input type="text" name ="pcthamnien" value="{{$ld->pcthamnien}}"  class="form-control"  >						
								</div>
								<div class="form-group">
									<label >Phụ cấp thâm niên nghề</label>
										<input type="text" name ="pcthamniennghe" value="{{$ld->pcthamniennghe}}" class="form-control"  >						
								</div>
								<div class="form-group">
									<label >Phụ cấp lương</label>
										<input type="text" name ="pcluong" value="{{$ld->pcluong}}" class="form-control"  >						
								</div>
								<div class="form-group">
									<label >Phụ cấp bổ sung</label>
										<input type="text" name ="pcbosung" value="{{$ld->pcbosung}}" class="form-control"  >						
								</div>
								
								
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<label >Ngày bắt đầu NN độc hại, nặng nhọc </label>
										<input type="date" name ="bddochai" value="{{$ld->bddochai}}"  class="form-control"  >						
								</div>
								<div class="form-group">
									<label >Ngày kết thúc NN độc hại, nặng nhọc </label>
										<input type="date" name ="ktdochai" value="{{$ld->ktdochai}}"  class="form-control"  >						
								</div>
								
								<div class="form-group">
									<label >Loại HĐLĐ</label>
										<select class="form-control input-sm m-bot15" name ="loaihdld" >
											
											<?php foreach ( $list_hdld as $td){ ?>
											<option value='{{$td->id}}' <?php if($ld->loaihdld==$td->id) echo"selected" ;?> >{{$td->name}}</option>
											<?php } ?>	
										</select>
								</div>
								<div class="form-group">
									<label >Ngày hiệu lực HĐLD</label>
										<input type="date" name ="bdhopdong" value="{{$ld->bdhopdong}}"  class="form-control"  >						
								</div>
								<div class="form-group">
									<label >Ngày hết hiệu lực HĐLD</label>
										<input type="date" name ="kthopdong" value="{{$ld->kthopdong}}"  class="form-control"  >						
								</div>
								<div class="form-group">
									<label >Số sổ bảo hiểm</label>
										<input type="text" name ="sobaohiem" value="{{$ld->sobaohiem}}"  class="form-control"  >						
								</div>
								<div class="form-group">
									<label >Ngày bắt đầu BHXH</label>
										<input type="date" name ="bdbhxh" value="{{$ld->bdbhxh}}"  class="form-control"  >						
								</div>
								<div class="form-group">
									<label >Ngày kết thúc BHXH</label>
										<input type="date" name ="ktbhxh" value="{{$ld->ktbhxh}}" class="form-control"  >						
								</div>
								<div class="form-group">
									<label >Mức lương đóng BHXH</label>
										<input type="text" name ="luongbhxh" value="{{$ld->luongbhxh}}"  class="form-control"  >						
								</div>
								
								<div class="form-group">
									<label >Tuyển dụng từ TTDVVL</label>
										<select class="form-control input-sm m-bot5" name ="fromttdvvl" >
											<option value='1' >Đúng</option>
											<option value='0'<?php if($ld->fromttdvvl==0) echo"selected" ;?> >Sai</option>
											
										</select>				
								</div>
								
								<div class="form-group">
									<label >Ghi chú</label>
									<textarea   name ="ghichu" class="form-control"rows='2' >{{$ld->ghichu}} </textarea>						
								</div>
                            </div>
							
						</fieldset>		
                          </div>   
					  
						</div>        
	<input type="hidden" name="id" value= '{{$ld->id}}'>
							
</form>
                       
 </section>

 
@endsection