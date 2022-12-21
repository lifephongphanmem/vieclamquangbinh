
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
<div class="row ">	
	<div class="col-sm-6 col-sm-offset-2">                   
		<div class="bg-success text-white" >
		<h3> Đăng tin tuyển dụng </h3>
		</div>
	</div>
 </div>
<form role="form" method="POST" action="{{URL::to('tuyendung-fs')}}" enctype= 'multipart/form-data'>
									 {{ csrf_field() }}
	
  
	  <div class="row">
		<fieldset class="col-sm-8 col-sm-offset-2">
		<legend>Thông tin chung</legend> 
	  <div class="col-sm-5 col-sm-offset-0 " > 
	
		<div class="form-group">
			<label>Nội dung tuyển dụng </label>
			<textarea name="noidung" rows=5 required class="form-control"></textarea>
		</div>
		
		<div class="form-group">
			<label>Thời hạn tuyển dụng </label>
			<input type='date' name="thoihan" class="form-control" required >
		</div>
		
		<div class="form-group">
			<label>Hình thức tuyển dụng </label>
			<select class="form-control input-sm " name ="type" >
						<option value='Trực tiếp' selected >Trực tiếp </option>
						<option value='Qua điện thoại'  >Qua điện thoại</option>
						<option value='Phỏng vấn online'  >Phỏng vấn online</option>
						<option value='Nộp CV'  >Nộp CV</option>
						</select>
		</div>
		<div class="form-group">
			<label> Họ và tên người liên hệ</label>
			<input type="text" size=40 name="contact"class="form-control" required >
				
		</div>
	</div>
	<div class="col-sm-4 ">
	
		<div class="form-group">
			<label>Chức vụ </label>
			<input type="text" size=40 class="form-control" name="chucvutd" > 
		</div>
	
		<div class="form-group">
			<label> Điện thoại  </label>
			<input type="text" size=40 name="phonetd" class="form-control" required> 
		</div>
		<div class="form-group">
			<label>Email </label>
			<input type="email" size=40 name="emailtd" class="form-control"required>
		</div>
		<div class="form-group">
			<label> Hình thức liên lạc</label>
			<select class="form-control input-sm " name ="contacttype" >
					<option value='Nhận SMS ứng tuyển' selected >Nhận SMS ứng tuyển</option>
					<option value='Nhận Email'>Nhận Email</option>
					<option value='Gặp trực tiếp'>Gặp trực tiếp</option>
					
				</select>
		</div>
		
		<div class="form-group">
			<label> Yêu cầu TTDVVL</label>
			<select class="form-control " name ="yeucau" >
					<option value='Tư vấn' selected >Tư vấn</option>
					<option value='Giới thiệu việc làm'>Giới thiệu việc làm</option>
					<option value='Cung ứng lao động'>Cung ứng lao động</option>
					
				</select>	
		</div>
	</div>
	<div class="col-sm-3 text-right">
			<div class="form-group">
				<label >Người đăng</label>
			<input type="text" name ="username" class="form-control" readonly value="{{Auth::user()->name}}" >
			</div>
			<div class="form-group">
				<label >Ngày đăng</label>
			<input type="text" name ="date_create" class="form-control" readonly value="{{date('d/m/Y')}}" >
			</div>
			<div class="form-group">
				<label >Số lượng vị trí</label>
			<input type="text" name ="quantity" id="quantity" class="form-control" readonly value="1" >
			</div>
			</br>
			<input type='submit' class="btn btn-info btn-lg" value="Đăng tin">
			</br>
			</br>
			
			<input type='button' class="btn btn-danger" value=" Quay lại" onclick="javascript:window.location='{{URL::to('tuyendung-fa')}}';">
	
	</div>
	
	</fieldset>
		
	
	</div>  

	<div class="vitri" id='dynamicTable'>  
	<div class="row" id="1stld">
	<fieldset class="col-sm-8 col-sm-offset-2">
	<legend>
	<button type="button"   class="btn btn-success">Vị trí tuyển dụng</button>  
	</legend> 
		<div class="col-sm-6   "> 
		 <table class="table table-bordered ">
			<tr>
				<td width="30%">Tên công việc </td>
				<td>
			
				<input type="text" name="name[]" size=40  required>
				</td>
			</tr>
			<tr>
				<td>Số lượng tuyển</td>
				<td><input type="text" name="soluong[]" size=10 required></td>
			</tr>
			<tr>
				<td>Mô tả công việc</td>
				<td><textarea   rows=6 cols= 30 name="description[]" required></textarea></td>
			</tr>
			<tr>
				<td>Mã nghề</td>
				<td>	
					<input type="text" name="manghe[]" size=10 >
				</td>
			</tr>
			<tr>
				<td>Cấp </td>
				<td><input type="text" name="capbac[]" size=20 ></td>
			</tr>
			<tr>
				<td>Chức vụ</td>
				<td><input type="text" name="chucvu[]" size=20> </td>
			</tr>
			<tr>
				<td>Trình độ học vấn</td>
				<td>
					<select class="form-control input-sm m-bot5" name ="tdgd[]" >
						<?php foreach ( $list_tdgd as $td){ ?>
						<option value='{{$td->name}}' >{{$td->name}}</option>
						<?php } ?>	
						
					</select>
				</td>
			</tr>
			<tr>
				<td>Trình độ CMKT</td>
				<td>
					<select class="form-control input-sm m-bot5" name ="tdcmkt[]" >
						<?php foreach ( $list_cmkt as $td){ ?>
						<option value='{{$td->name}}' >{{$td->name}}</option>
						<?php } ?>	
					</select>
				</td>
			</tr>
			<tr>
				<td>Chuyên ngành đào tạo</td>
				<td>
					<select class="form-control input-sm m-bot15" name ="chuyennganh[]" >
						
						<?php foreach ( $list_linhvuc as $td){ ?>
						<option value='{{$td->name}}' >{{$td->name}}</option>
						<?php } ?>	
					</select>
				</td>
			</tr>
			<tr>
				<td>Trình độ kỹ năng nghề </td>
				<td> 
					<input type="text" size=20 name="trinhdonghe[]" value=" " > Bậc <input type="text" size=5 name="bacnghe[]"value=" " >
				</td>
			</tr>
			<tr>
				<td>Trình độ ngoại ngữ</td>
				<td>
					Ngoại ngữ 1 <input type="text" size=10 name="ngoaingu1[]" value="" > Chứng chỉ <input type="text" size=2 name="chungchinn1[]" value=" " >
							<select class="form-control input-sm m-bot5" name ="xeploainn1[]" >
											<option value='Trung bình'   >Trung bình</option>
											<option value='Khá' selected >Khá</option>
											<option value='Tốt'>Tốt</option>
							</select>	
					<br>
					Ngoại ngữ 2 <input type="text" size=10 value=" "  name="ngoaingu2[]"> Chứng chỉ <input type="text" size=2 name="chungchinn2[]"value=" " >
							<select class="form-control input-sm m-bot5" name ="xeploainn1[]" >
											<option value='Trung bình'   >Trung bình</option>
											<option value='Khá' selected >Khá</option>
											<option value='Tốt'>Tốt</option>
							</select>	
											</td>
			</tr>
			<tr>
				<td>Trình độ tin học</td>
				<td>Tin học văn phòng 
							<select class="form-control input-sm m-bot5" name ="loaithvp[]" >
											<option value='Trung bình'   >Trung bình</option>
											<option value='Khá' selected >Khá</option>
											<option value='Tốt'>Tốt</option>
							</select>	
					Khác <input type="text" size=10 value=" " name ="tinhockhac[]" > 
							<select class="form-control input-sm m-bot5" name ="loaithk[]" >
											<option value='Trung bình'   >Trung bình</option>
											<option value='Khá' selected >Khá</option>
											<option value='Tốt'>Tốt</option>
							</select>	

				</td>
			</tr>
			<tr>
				<td>Kỹ năng mềm</td>
				<td>
					<input type="hidden" name ="kynangmem[]" class="kynangmem" value="">
					<select class="form-control kynang" rows=11 multiple height="40">
					<option value='Giao tiếp' selected >Giao tiếp</option>
					<option value='Thuyết trình' >Thuyết trình</option>
					<option value='Quản lý thời gian' >Quản lý thời gian</option>
					<option value='Quản lý nhân sự' >Quản lý nhân sự</option>
					<option value='Tổng hợp báo cáo' >Tổng hợp báo cáo</option>
					<option value='Thích ứng' >Thích ứng</option>
					<option value='Làm việc nhóm' >Làm việc nhóm</option>
					<option value='Làm việc độc lập' >Làm việc độc lập</option>
					<option value='Chịu áp lực' >Chịu áp lực </option>
					<option value='Theo dõi giám sát' >Theo dõi giám sát</option>
					<option value='Tư duy phản biện' >Tư duy phản biện</option>
					<option value='Khác' >Khác</option>
				</select>
				</td>
			</tr>
			 <tr>
				<td>Yêu cầu kinh nghiệm</td>
				<td>
					<select class="form-control input-sm m-bot5" name ="yeucaukn[]" >
						<option value='Không yêu cầu' selected >Không yêu cầu</option>
						<option value='>Dưới 1 năm'  >Dưới 1 năm</option>
						<option value='1 đến 2 năm'  >1 đến 2 năm</option>
						<option value='2 đên 5 năm'  >2 đên 5 năm</option>
						<option value='Trên 5 năm'  >Trên 5 năm</option>
						
					</select>

				</td>
			</tr>
			
		</table>	

		</div>
			

		<div class="col-sm-6"> 
		 <table class="table table-bordered ">
		
			<tr>
				<td>Nơi làm việc dự kiến</td>
				<td> 
				
				<input type="text" size=40  name ="diadiem[]" required> </td>
			</tr>
			<tr>
				<td>Loại hợp đồng </td>
				<td> 
				<select class="form-control input-sm m-bot5" name ="loaihopdong[]" >
						<?php foreach ( $list_hdld as $td){ ?>
						<option value='{{$td->name}}' >{{$td->name}}</option>
						<?php } ?>	
					</select>
				</td>
			</tr>
			<tr>
				<td  width="30%">Yêu cầu thêm </td>
				<td>
					<select class="form-control input-sm m-bot5" name ="yeucauthem[]" >
						<option value='Không' selected >Không</option>
						<option value='Làm ca'  >Làm ca</option>
						<option value='Đi công tác'  >Đi công tác</option>
						<option value='Đi biệt phái'  >Đi biệt phái</option>
						
					</select>
				</td>
			</tr>
			<tr>
				<td>Hình thức làm việc</td>
				<td>
				<select class="form-control input-sm m-bot5" name ="hinhthuclv[]" >
						<option value='Toàn thời gian' selected >Toàn thời gian</option>
						<option value='Bán thời gian'  >Bán thời gian</option>
						
					</select>
				</td>
			</tr>
			<tr>
				<td>Mục đích làm việc</td>
				<td>
				<select class="form-control input-sm m-bot5" name ="mucdichlv[]" >
						<option value='Làm lâu dài' selected >Làm lâu dài</option>
						<option value='Làm tạm thời'  >Làm tạm thời</option>
						<option value='Làm thêm'  >Làm thêm</option>
						
					</select>
				</td>
			</tr>
			<tr>
				<td>Mức lương </td>
				<td>	
					<select class="form-control" name ="mucluong[]" >
						<option value='Dưới 5 triệu' selected > Dưới 5 triệu </option>
						<option value='5 - 10 triệu'  >5 - 10 triệu </option>
						<option value='10 - 20 triệu'  >10 - 20 triệu </option>
						<option value='20 - 50 triệu'  >20 - 50 triệu </option>
						<option value='trên 50 triệu'  > trên 50 triệu </option>
						<option value='Thỏa thuận'  >Thỏa thuận</option>
						<option value='Hoa hồng'  >Hoa hồng</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>Hỗ trợ ăn uống </td>
				<td>
				<select class="form-control input-sm m-bot5" name ="hotroan[]" >
						<option value='Không' selected > Không</option>
						<option value='1 Bữa'  >1 Bữa</option>
						<option value='2 Bữa'  >2 Bữa</option>
						<option value='3 Bữa'  >3 Bữa</option>
						<option value='Bằng tiền'  >Bằng tiền</option>
						
					</select>
				</td>
			</tr>
			<tr>
				<td>Phúc lợi khác</td>
				<td> 
				<input type="hidden" name="phucloi[]" class="phucloival" value="">
				<input type="checkbox" class="phucloi"  value="Đóng BHXH, BHYT, BHTN"> Đóng BHXH, BHYT, BHTN
				<input type="checkbox" class="phucloi"  value="Đóng BHNT"> Đóng BHNT
				<input type="checkbox" class="phucloi" value="Trợ cấp thôi việc"> Trợ cấp thôi việc
				<input type="checkbox" class="phucloi" value="Nhà trẻ"> Nhà trẻ
				<input type="checkbox" class="phucloi" value="Xe đưa đón"> Xe đưa đón
				<input type="checkbox" class="phucloi" value="Hỗ trợ đi lại"> Hỗ trợ đi lại
				<input type="checkbox" class="phucloi"  value="Hỗ trợ nhà ở"> Hỗ trợ nhà ở
				<input type="checkbox" class="phucloi"  value="Ký túc xá"> Ký túc xá
				<input type="checkbox" class="phucloi"  value="Đào tạo"> Đào tạo
				<input type="checkbox" class="phucloi"  value="Lối đi người khuyết tật"> Lối đi người khuyết tật
				<input type="checkbox" class="phucloi"  value="Cơ hội thăng tiến"> Cơ hội thăng tiến
				<br>
				<input type="checkbox"  id="checkphucloikhac" > Khác <input type="text"  id="phucloikhac" value="" size=30> 
				
				
				</td>
			</tr>
			<tr>
				<td>Nơi làm việc</td>
				<td>
				<select class="form-control input-sm m-bot5" name ="noilamviec[]" >
						<option value='Trong nhà' selected > Trong nhà</option>
						<option value='Ngoài trời'  >Ngoài trời</option>
						<option value='Hỗn hợp'  >Hỗn hợp</option>
						
					</select></td>
			</tr>
			<tr>
				<td>Trọng lượng nâng</td>
				<td>
				<select class="form-control input-sm m-bot5" name ="trongluongnang[]" >
						<option value='Dưới 5kg' selected >Dưới 5kg</option>
						<option value='5kg - 20kg'  >5kg - 20kg</option>
						<option value='trên 20kg'  >trên 20kg </option>
						
					</select></td>
			</tr>
			<tr>
				<td>Đứng hoặc đi lại</td>
				<td>
				<select class="form-control input-sm m-bot5" name ="dungvadilai[]" >
						<option value='Hầu như không' selected > Hầu như không</option>
						<option value='Trung bình'  >Trung bình</option>
						<option value='Đi lại nhiều'  >Đi lại nhiều</option>
						
					</select></td>
			</tr>
			<tr>
				<td>Nghe nói</td>
				<td>
				<select class="form-control input-sm m-bot5" name ="nghenoi[]" >
						<option value='Không cần' selected > Không cần</option>
						<option value='Cơ bản'  >Cơ bản</option>
						<option value='Nghe nói nhiều'  >Nghe nói nhiều</option>
						
					</select></td>
			</tr>
			<tr>
				<td>Thị lực</td>
				<td>
				<select class="form-control input-sm m-bot5" name ="thiluc[]" >
						<option value='Bình thường' selected > Bình thường</option>
						<option value='Nhìn được chi tiết nhỏ'  >Nhìn được chi tiết nhỏ</option>
						
					</select></td>
			</tr>
			<tr>
				<td>Thao tác tay</td>
				<td>
				<select class="form-control input-sm m-bot5" name ="thaotactay[]" >
						<option value='Lắp ráp đồ vật lớn' selected > Lắp ráp đồ vật lớn</option>
						<option value='Lắp ráp đồ vật nhỏ'  >Lắp ráp đồ vật nhỏ</option>
						<option value='Lắp ráp đồ vật rất nhỏ'  >Lắp ráp đồ vật rất nhỏ</option>
						
					</select></td>
			</tr>
			<tr>
				<td>Dùng tay</td>
				<td>
				<select class="form-control input-sm m-bot5" name ="dungtay[]" >
						<option value='Cần 2 tay' selected > Cần 2 tay </option>
						<option value='Đôi khi cần 2 tay'  >Đôi khi cần 2 tay</option>
						<option value='Cần 1 tay'  >Cần 1 tay</option>
						<option value='Cần tay trái'  >Cần tay trái</option>
						<option value='Cần tay phải'  >Cần tay phải</option>
						
					</select></td>
			</tr>
			<tr>
				<td>Đối tượng ưu tiên</td>
				<td>
				<input type="hidden" name="uutien[]" class="uutienval" value="">
				
				<input type="checkbox" value="Người khuyết tật"  class="uutien"  > Người khuyết tật
				<input type="checkbox" value="Bộ đội xuất ngũ" class="uutien"  > Bộ đội xuất ngũ
				<input type="checkbox" value="Hộ nghèo, hộ cận nghèo"class="uutien"   > Hộ nghèo, hộ cận nghèo
				<input type="checkbox" value="Nhà trẻ" class="uutien"  > Nhà trẻ
				<input type="checkbox" value="Người dân tộc thiểu số" class="uutien"  > Người dân tộc thiểu số
				
				<br>
				<input type="checkbox" id="checkuutien" > Khác <input type="text" id="uutienkhac" value="" size=30 placeholder="ghi rõ"> 
				</td>
			</tr>
			
		
		</table>	
			
			
		
			
		</div>
		</div>
		</fieldset>	
		</div>
		
	</div>
	<div><hr></div>
			<div>
			 <center>
				<button type="button" name="add" id="add" class="btn btn-success">Thêm vị trí</button>
					<button type="button" class="btn btn-danger" id='remove'>Giảm vị trí</button>
				<input type='submit' class="btn btn-submit" value=" Đăng tuyển dụng">
				 </center>
			</div>1
	</form>
                       
 </section>					
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

   
<script type="text/javascript">
    
    var i = 0;
   
   $("#add").click(function(){
		document.getElementById("quantity").value= parseInt(document.getElementById("quantity").value,10) +1;
        ++i;
		firstld =  document.getElementById("1stld").innerHTML +'';
		nextld= "<div class='row' id ='row"+i+"' >" + firstld + "</div>"
       $("#dynamicTable").append(nextld);
         });
    $("#remove").click(function(){
		document.getElementById("quantity").value= parseInt(document.getElementById("quantity").value,10) -1;
       
		delrowid="row"+i;
		document.getElementById(delrowid).remove();
		--i;
         });
  
  $(document).on('click', 'form input[type=submit]', function(e) {
	var quantity= $("#quantity").val();
   for(i=0;i<quantity; i++){
	  
	   if (i==0){rowid="#1stld";
	   }else{
		  
		   rowid="#row"+i;
	   }
	   // combine data - phuc loi-
		var varsphucloi = $('.phucloi:checked').map(function () {
		   if($(this).parents(rowid).length == 1) {
				return $(this).val();
			}  
		}).get().join("; "); 
		
		if($(rowid).find("#checkphucloikhac").first().prop('checked') == true){
			
			varsphucloi = varsphucloi.concat("; ",$(rowid).find("#phucloikhac").first().val());
		
		};
		
		$(rowid).find(".phucloival").first().val(varsphucloi);
		
	// combine data - uu tien-
		var varsuutien = $('.uutien:checked').map(function () {
		   if($(this).parents(rowid).length == 1) {
				return $(this).val();
			}  
		}).get().join("; "); 
		
		if($(rowid).find("#checkuutienkhac").first().prop('checked') == true){
			
			varsuutien = varsuutien.concat("; ",$(rowid).find("#uutienkhac").first().val());
		
		};
		$(rowid).find(".uutienval").first().val(varsuutien);
			
	// combine data - kynangmem- 
		var varskn = $(rowid).find('select.kynang option:selected').map(function () {
		  
					return $(this).val();
			
					}).get().join("; ");  
		
		$(rowid).find(".kynangmem").first().val(varskn);
		
		
   }
});

</script>	
@endsection