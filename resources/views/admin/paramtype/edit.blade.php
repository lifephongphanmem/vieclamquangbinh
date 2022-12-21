@extends ('admin.layout')

@section ('content')
 

			<section class="panel">
                        <header class="panel-heading">
                            Chính sửa tham số
                        </header>
						<div class="row w3-res-tb">
						  <div class="col-sm-5 m-b-xs">
							
						  <button class="btn"><i class="fa fa-plus"> <a href="{{URL::to('ptype-bn')}}"> Tạo mới  </a></i></button>
						   <button  class="btn" > <i class="fa fa-undo"> <a href="{{URL::to('ptype-ba')}}">Trở về </a></i></button>

															
						  </div>
						  <div class="col-sm-4">
						  </div>
						  <div class="col-sm-3">
						   
						  </div>
						</div>
                        <div class="panel-body">
                            <div class="position-center">
							
                                <form role="form" method="POST" action="{{URL::to('ptype-bu')}}" enctype= 'multipart/form-data'>
									 {{ csrf_field() }}
							  <div class="form-group">
									<label >Tên Tham số</label>

										<input type="text" name ="name" class="form-control" value='{{$cat->name}}' required >
								
								</div>
							
								<div class="form-group">
									<label >Miêu tả</label>

										<textarea style="resize:none" rows='5' name ="desc" class="form-control"  required>
										{{$cat->description}}
										</textarea>
								</div>
								
                                
								
									<input type="hidden" name="catid" value= '{{$cat->id}}'>
								
                                <button type="submit" class="btn btn-info">Cập nhật</button>
                               
                            </form>
							
                            </div>

                        </div>
                    </section>
				
@endsection