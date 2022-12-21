@extends ('admin.layout')

@section ('content')
 

			<section class="panel">
                        <header class="panel-heading">
                            Thêm tham số
                        </header>
						<div class="row w3-res-tb">
						  <div class="col-sm-5 m-b-xs">
						 <button  class="btn" > <i class="fa fa-undo"> <a href="{{URL::to('ptype-ba')}}">Trở về </a></i></button>

															
						  </div>
						  <div class="col-sm-4">
						  </div>
						  <div class="col-sm-3">
						   
						  </div>
						</div>
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" method="POST" action="{{URL::to('ptype-bs')}} " enctype= 'multipart/form-data'>
									 {{ csrf_field() }}
							  <div class="form-group">
									<label >Tên tham số</label>

										<input type="text" name ="name" class="form-control" required >
								
								</div>
								
								<div class="form-group">
									<label >Miêu tả</label>
										<textarea style="resize:none" rows='5' name ="description" class="form-control" required>
										</textarea>
								</div>
								
								<input type="hidden" name="isnew" value= '1'>
								<input type="hidden" name="id" value= '0'>
								
                                <button type="submit" class="btn btn-info">Thêm tham số</button>
                            </form>
							
                            </div>

                        </div>
                    </section>
				
@endsection