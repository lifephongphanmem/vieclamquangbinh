@extends ('admin.layout')

@section ('content')
 

			<section class="panel">
                        <header class="panel-heading">
                            Chính sửa danh mục 
                        </header>
												<div class="row w3-res-tb">
						  <div class="col-sm-3 m-b-xs">
							
						 			  </div>
						  <div class="col-sm-4">
						  </div>
						  <div class="col-sm-5">
						    <button class="btn"><i class="fa fa-plus"> <a href="{{URL::to('dmhc-bn')}}"> Tạo mới  </a></i></button>
						   <button  class="btn" > <i class="fa fa-undo"> <a href="{{URL::to('dmhc-ba')}}">Trở về </a></i></button>

															
			
						  </div>
						</div>
                        <div class="panel-body">
                            <div class="position-center">
							
                                <form role="form" method="POST" action="{{URL::to('dmhc-bu')}}" enctype= 'multipart/form-data'>
									 {{ csrf_field() }}
								
								<div class="form-group">
									<label >Tên danh mục</label>
									<input type="text" name ="name" class="form-control" required value="{{$cat->name}}" >							
								</div>
								 <div class="form-group">
									<label >Hiệu lực <input type='radio' value='1' name= 'public' <?php if ($cat->public==1){echo "checked";}; ?>></label> 
									</label>Không hiệu lực` <input type='radio' value='0' name= 'public'  <?php if ($cat->public==0){echo "checked";}; ?> ></label>
								
								</div>
								 <div class="form-group">
									<label >Mã quốc gia</label>

										<input type="text" name ="maquocgia" class="form-control" value="{{$cat->maquocgia}}"  >
								
								</div>
								 <div class="form-group">
									<label >Cấp</label>

										<input type="text" name ="level" class="form-control" value="{{$cat->level}}"  >
								
								</div>
								 <div class="form-group">
									<label >Danh mục trên </label>

										<select class="input-sm form-control w-sm inline v-middle" name="parent">
										<?php foreach($cats as $dm) { ?>	
										<option value="{{$dm->maquocgia}}" <?php if ($cat->parent==$dm->maquocgia){echo "selected";} ?>> {{$dm->name}} </option>	
										
										<?php } ?>
										 </select>
								
								</div>
								<div class="form-group">
									<label >Miêu tả</label>
										<textarea style="resize:none" rows='5' name ="description" class="form-control" value={{$dm->description}} >										{{$cat->description}}
										</textarea>
								</div>
								
								<input type="hidden" name="id" value= '{{$cat->id}}'>
								
                                <button type="submit" class="btn btn-info">Cập nhật</button>
                               
                            </form>
							
                            </div>

                        </div>
                    </section>
				
@endsection