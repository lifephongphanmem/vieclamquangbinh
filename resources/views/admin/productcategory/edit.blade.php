@extends ('admin.layout')

@section ('content')
 

			<section class="panel">
                        <header class="panel-heading">
                            Chính sửa loại tham số
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" method="POST" action="{{URL::to('update-cat-product')}}" enctype= 'multipart/form-data'>
									 {{ csrf_field() }}
							  <div class="form-group">
									<label >Tên danh mục</label>

										<input type="text" name ="name" class="form-control" value='{{$cat->name}}' required >
								
								</div>
							<div class="form-group">
									<label >Public</label>
										<select class="form-control input-sm m-bot5" name ="public" >
											<option value='1' <?php if($cat->public){ echo 'selected';}?> >Có</option>
											<option value='0'  <?php if(!$cat->public){ echo 'selected';}?> >Không</option>
											
										</select>
								</div>
								<div class="form-group">
									<label >Miêu tả</label>

										<textarea style="resize:none" rows='5' name ="desc" class="form-control"  required>
										{{$cat->description}}
										</textarea>
								</div>
								<div class="form-group">
									<label >Thư mục trên</label>
										<select class="form-control input-sm m-bot15" name ="parent" >
											<option value='0' <?php if(!$cat->parent){ echo 'selected';}?> >Không có</option>
											 <?php if(count($cats)){
		 
														foreach ($cats as $parent) {      ?>
														
														<option value='{{$parent->id}}' <?php if($parent->id == $cat->parent){ echo 'selected';}?> >{{$parent->name}}</option>
														<?php 
																}
														 
														 } 
														 ?>
											
										</select>
								</div>
                                <div class="form-group">
								<div>
									<img src="{{URL::to('../storage/app/'.$cat->image)}}" > </img>
								</div>
                                    <label for="exampleInputFile">Hình ảnh</label>
                                    <input type="file" id="catImage" name ="image" value =''>
                                    
                                </div>
								
									<input type="hidden" name="catid" value= '{{$cat->id}}'>
								
                                <button type="submit" class="btn btn-info">Cập nhật</button>
                            </form>
							
                            </div>

                        </div>
                    </section>
				
@endsection