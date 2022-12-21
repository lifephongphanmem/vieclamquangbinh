@extends ('admin.layout')

@section ('content')
 

			<section class="panel">
                        <header class="panel-heading">
                           Cập nhật dịch vụ
                        </header>
			<div class="row w3-res-tb">
		  <div class="col-sm-3 m-b-xs">
			
					  </div>
		  <div class="col-sm-4">
		  </div>
		  <div class="col-sm-5">
			<button class="btn"><i class="fa fa-plus"> <a href="{{URL::to('dichvu-bn')}}"> Tạo mới  </a></i></button>
		   <button  class="btn" > <i class="fa fa-undo"> <a href="{{URL::to('dichvu-ba')}}">Trở về </a></i></button>

											

		  </div>
		</div>
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" method="POST" action="{{URL::to('dichvu-bu')}}" enctype= 'multipart/form-data'>
									 {{ csrf_field() }}
							   <div class="form-group">
									<label >Tên </label>

										<input type="text" name ="name" class="form-control" value="{{$dv->name}}" required >
								
								</div>
								<div class="form-group">
									<label >Hoạt động</label>
										<select class="form-control input-sm m-bot5" name ="state">
											<option value='1'>Hoạt động</option>
											<option value='2'<?php if($dv->state==2){echo "selected";} ?>>Không</option>
											
										</select>
								</div>
								<div class="form-group">
									<label >Miêu tả </label>

										<textarea name ="description" class="form-control"  rows=10 required > {{$dv->description}}</textarea>
								
								</div>
								
													
								
								<input type='hidden' name='id' value="{{$dv->id}}">
								
                                <button type="submit" class="btn btn-info">Cập nhật</button>
                            </form>
                            </div>

                        </div>
                    </section>
					<script> 
					var check = function() {
							  if (document.getElementById('password').value ==
								document.getElementById('confirm_password').value) {
								document.getElementById('message').style.color = 'green';
								document.getElementById('message').innerHTML = '';
							  } else {
								document.getElementById('message').style.color = 'red';
								document.getElementById('message').innerHTML = 'Không trùng';
							  }
							}
					</script>
				
@endsection