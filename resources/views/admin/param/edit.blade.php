@extends ('admin.layout')

@section ('content')
 

			<section class="panel">
                        <header class="panel-heading">
						Tham số: {{$cat->name}}
                        </header>
						<div class="row w3-res-tb">
						  <div class="col-sm-5 m-b-xs">
							
						  <button class="btn"><i class="fa fa-plus"> <a href="{{URL::to('param-bn'.'/'.$cat->id)}}"> Tạo mới  </a></i></button>
						   <button  class="btn" > <i class="fa fa-undo"> <a href="{{URL::to('param-ba'.'/'.$cat->id)}}">Trở về </a></i></button>

															
						  </div>
						  <div class="col-sm-4">
						  </div>
						  <div class="col-sm-3">
						   
						  </div>
						</div>
                        <div class="panel-body">
                            <div class="position-center">
							
                                <form role="form" method="POST" action="{{URL::to('param-bu')}}" enctype= 'multipart/form-data'>
									 {{ csrf_field() }}
							  <div class="form-group">
									<label >Giá trị</label>

										<input type="text" name ="name" class="form-control" value='{{$param->name}}' required >
								
								</div>
							
								<div class="form-group">
									<label >Miêu tả</label>

										<textarea style="resize:none" rows='5' name ="desc" class="form-control"  >
										{{$param->description}}
										</textarea>
								</div>
								
                                
								
									<input type="hidden" name="type" value= '{{$cat->id}}'>
									<input type="hidden" name="id" value= '{{$param->id}}'>
								
                                <button type="submit" class="btn btn-info">Cập nhật</button>
                               
                            </form>
							
                            </div>

                        </div>
                    </section>
				
@endsection