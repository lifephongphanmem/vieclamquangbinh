@extends ('admin.layout')

@section ('content')
 

			<section class="panel">
                        <header class="panel-heading">
                            Thêm danh mục trong {{ $p->name}}
                        </header>
						<div class="row w3-res-tb">
						  <div class="col-sm-5 m-b-xs">
						 <button  class="btn" > <i class="fa fa-undo"> <a href="{{URL::to('dmhc-bac/'.$p->maquocgia)}}">Trở về </a></i></button>

															
						  </div>
						  <div class="col-sm-4">
						  </div>
						  <div class="col-sm-3">
						   
						  </div>
						</div>
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" method="POST" action="{{URL::to('dmhc-bs')}} " enctype= 'multipart/form-data'>
									 {{ csrf_field() }}
							  <div class="form-group">
									<label >Tên danh mục</label>
									<input type="text" name ="name" class="form-control" required >							
								</div>
								 <div class="form-group">
									<label >Hiệu lực <input type='radio' value='1' name= 'public' checked></label> 
									</label>Không hiệu lực` <input type='radio' value='0' name= 'public' ></label>
								
								</div>
								 <div class="form-group">
									<label >Mã quốc gia</label>

										<input type="text" name ="maquocgia" class="form-control"  >
								
								</div>
								 <div class="form-group">
									<label >Cấp</label>
									<input type="text" name ="level" class="form-control"  >	
								</div>
								 <div class="form-group">
									<label >Danh mục trên </label>

										<select class="input-sm form-control w-sm inline v-middle" name="parent">
										
										<option value="{{$p->maquocgia}}"> {{$p->name}} </option>	
										
										 </select>
								
								</div>
								<div class="form-group">
									<label >Miêu tả</label>
										<textarea style="resize:none" rows='5' name ="description" class="form-control" >
										</textarea>
								</div>
								
								
								<input type="hidden" name="isnew" value= '1'>
								<input type="hidden" name="id" value= '0'>
								
                                <button type="submit" class="btn btn-info">Thêm Danh mục</button>
                            </form>
							
                            </div>

                        </div>
                    </section>
				
@endsection