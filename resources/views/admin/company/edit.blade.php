@extends ('admin.layout')

@section ('content')
 

<section class="panel">
	<header class="panel-heading">
	  {{$info->name}}
	</header>
	<div class="panel-body">
	<div class="row ">	
	<div class="col-sm-10 col-sm-offset-1">
		<div class="top-menu">
			@include('admin.dnmenu')
			@yield('top-menu') 
		</div>
	</div>
	</div>
	<form role="form" method="POST" action="#" enctype= 'multipart/form-data'>
									 {{ csrf_field() }}
		 <table width="100%">
			<tr>
				<td>Mã số doanh nghiệp </td>
				<td>
					<input type="text" size=20 class="form-control"  name ="masodn" value="{{$info->masodn}}" readonly >
					
				</td>
			</tr>
			
			<tr>
				<td>Mã số DKKD</td>
				<td><input type="text" class="form-control"  id="dkkd" name ="dkkd" value="{{$info->dkkd}}" readonly ></td>
			</tr>
			<tr>
				<td>Tình trạng hoạt động</td>
				<td>	
					Hoạt động <input type='radio' value='1' name= 'public' <?php if($info->public){echo "checked";}?> onclick="javascript: return false;"> 
					Dừng <input type='radio' value='0' name= 'public' <?php if(!$info->public){echo "checked";}?> onclick="javascript: return false;">
				</td>
			</tr>
			<tr>
				<td>Số điện thoại </td>
				<td><input type="text" name="phone" class="form-control" value="{{$info->phone}}" readonly></td>
			</tr>
			<tr>
				<td>Fax</td>
				<td><input type="text"  name="fax" value="{{$info->fax}}"  class="form-control" readonly> </td>
			</tr>
			<tr>
				<td>Website</td>
				<td><input type="text" name="website" value="{{$info->website}}" class="form-control" readonly> </td>
			</tr>
			<tr>
				<td>Email</td>
				<td><input type="email" name="email" value="{{$info->email}}" class="form-control" readonly> </td>
			</tr>
			<tr>
				<td>Tỉnh</td>
				<td>
				<select class="form-control input-sm m-bot5" name ="tinh" id='tinh' readonly>
				<option   value="44" > Quảng Bình </option>
				
				</select>
				</td>
			</tr>
			<tr>
				<td>Huyện/Thị xã/Thành phố </td>
				<td><select class="form-control input-sm m-bot5" name ="huyen" id='huyen' readonly>
					<?php foreach ($dmhc as $dv){
						if ($dv->level == 'Huyện' || $dv->level == 'Thành phố'||$dv->level =="Thị xã"){
						?>	
						<option value='{{$dv->maquocgia}}' <?php if($dv->maquocgia == $info->huyen){echo "selected";}?> >{{$dv->name}}</option>
					<?php  }}?>
						
					</select>
				</td>
			</tr>
			<tr>
				<td>Xã/Phường</td>
				<td>
				<select class="form-control input-sm m-bot5" name ="xa" id="xa" readonly>
					<?php foreach ($dmhc as $dv){
						if ($dv->level =="Xã"||$dv->level =="Phường"||$dv->level =="Thị trấn"){
						?>	
						<option class="{{$dv->parent}}" value='{{$dv->maquocgia}}' <?php if($dv->maquocgia == $info->xa){echo "selected";}?>  >{{$dv->name}}</option>
						<?php } }?>
						
											
				</select>	
				<script>
					var xa = $("[name=xa] option").detach()
						$("[name=huyen]").change(function() {
						  var val = $(this).val()
						  $("[name=xa] option").detach()
						  xa.filter("." + val).clone().appendTo("[name=xa]")
						}).change()
				</script>
				
				Thành thị <input type='radio' value='1' name= 'khuvuc' <?php if($info->khuvuc){echo "checked";}?> onclick="javascript: return false;"> 
				Nông thôn <input type='radio' value='0' name= 'khuvuc' <?php if(!$info->khuvuc){echo "checked";}?> onclick="javascript: return false;">
											</td>
			</tr>
			<tr>
				<td>Địa chỉ</td>
				<td>
				<textarea type="text" class="form-control" name="adress" readonly >{{$info->adress}}</textarea>
				</td>
			</tr>
			<tr>
				<td>Khu công nghiệp</td>
				<td><select class="form-control input-sm m-bot5" name ="khucn" readonly>
					<option value=0 > Chọn khu công nghiệp </option>
					<?php foreach ($kcn as $dv){
					
						?>	
						<option value='{{$dv->id}}' <?php if($dv->id == $info->khucn){echo "selected";}?>  >{{$dv->name}}</option>
						<?php  }?>
					
					
				</select>
				</td>
			</tr>
			<tr>
				<td>Loại hình doanh nghiệp</td>
				<td><select class="form-control input-sm m-bot5" name ="loaihinh" readonly>
					<?php foreach ($ctype as $dv){
					
						?>	
						<option value='{{$dv->id}}' <?php if($dv->id == $info->loaihinh){echo "selected";}?>  >{{$dv->name}}</option>
						<?php  }?>
					
					
				</select> </td>
			</tr>
			<tr>
				<td>Ngành nghề</td>
				<td> <select class="form-control input-sm m-bot5" name ="nganhnghe" readonly >
					<?php foreach ($cfield as $dv){
					
						?>	
						<option value='{{$dv->id}}' <?php if($dv->id == $info->nganhnghe){echo "selected";}?>  >{{$dv->name}}</option>
						<?php  }?>
					
					
				</select> </td>
			</tr>
			
			
		</table>	
			
			
		
			
		</form>
		</div>

</section>
@endsection