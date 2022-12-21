@extends ('admin.layout')

@section ('content')
 

			<section class="panel">
                        <header class="panel-heading">
                           Tham số: {{ $catname }}
                        </header>
						<div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
       <button onclick="goBack()" class="btn" > <i class="fa fa-undo"> <a href="#">Trở về </a></i></button>

										<script>
										function goBack() {
										  window.history.go(-1);
										}
										</script>
	  </div>
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
       
      </div>
    </div>
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" method="POST" action="{{URL::to('param-bs')}} " enctype= 'multipart/form-data'>
									 {{ csrf_field() }}
							  <div class="form-group">
									<label >Tên giá trị tham số</label>

										<input type="text" name ="name" class="form-control" required >
								
								</div>
								
								<div class="form-group">
									<label >Miêu tả</label>
										<textarea style="resize:none" rows='5' name ="description" class="form-control" required>
										</textarea>
								</div>
								
								<input type="hidden" name="isnew" value= '1'>
								<input type="hidden" name="type" value= ' {{ $catid }}'>
								<input type="hidden" name="id" value= '0'>
								
                                <button type="submit" class="btn btn-info">Thêm giá trị</button>
                            </form>
							
                            </div>

                        </div>
                    </section>
				
@endsection