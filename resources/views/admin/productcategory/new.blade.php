@extends ('admin.layout')

@section ('content')
 

			<section class="panel">
                        <header class="panel-heading">
                            Thêm danh mục sản phẩm
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" method="POST" action="{{URL::to('save-cat-product')}} " enctype= 'multipart/form-data'>
									 {{ csrf_field() }}
							  <div class="form-group">
									<label >Tên danh mục</label>

										<input type="text" name ="name" class="form-control" required >
								
								</div>
								<div class="form-group">
									<label >Public</label>
										<select class="form-control input-sm m-bot5" name ="public" >
											<option value='1' selected >Có</option>
											<option value='0'>Không</option>
											
										</select>
								</div>
								<div class="form-group">
									<label >Miêu tả</label>
										<textarea style="resize:none" rows='5' name ="description" class="form-control" required>
										</textarea>
								</div>
								<div class="form-group">
									<label >Thư mục trên</label>
										<select class="form-control input-sm m-bot15" name ="parent" >
											<option value='0' selected >Không có</option>
											 <?php if(count($cats)){
		 
														foreach ($cats as $cat) {      ?>
														
														<option value='{{$cat->id}}' >{{$cat->name}}</option>
														<?php 
																}
														 
														 } 
														 ?>
											
										</select>
								</div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Hình ảnh</label>
                                    <input type="file" id="catImage" name ="image">
                                    
                                </div>
								<input type="hidden" name="isnew" value= '1'>
								<input type="hidden" name="id" value= '0'>
								
                                <button type="submit" class="btn btn-info">Thêm danh mục</button>
                            </form>
                            </div>

                        </div>
                    </section>
				
@endsection