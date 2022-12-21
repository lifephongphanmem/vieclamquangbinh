@extends ('admin.layout')

@section('content')
<section class="panel">
<header class="panel-heading">
	Văn bản mới
</header>
<div class="row w3-res-tb">
  <div class="col-sm-5 m-b-xs">
 <button  class="btn" > <i class="fa fa-undo"> <a href="{{URL::to('admessages')}}">Trở về </a></i></button>

									
  </div>
  <div class="col-sm-4">
  </div>
  <div class="col-sm-3">
   
  </div>
</div>
<div class="panel-body">
    <form action="{{ route('admessages.store') }}" method="post">
        {{ csrf_field() }}
        <div class="col-md-8">
            <!-- Subject Form Input -->
            <div class="form-group">
                <label class="control-label">Tiêu đề</label>
                <input type="text" class="form-control" name="subject" placeholder="Subject"
                       value="{{ old('subject') }}">
            </div>

            <!-- Message Form Input -->
            <div class="form-group">
                <label class="control-label">Nội dung</label>
                <textarea name="message" class="form-control">{{ old('message') }}</textarea>
            </div>
			<div class="form-group">
                <label class="control-label">File đính kèm</label>
               <input type="file" name="attach" class="form-control" > </td>
			 </div>
           <div class="form-group">
                <label class="control-label">Người nhận</label>    
					<select name='recipients'>
					<option value="0"> Tất cả các doanh nghiệp </option>
					<option value="-1"> Tất cả các doanh nghiệp chưa khai báo trong kỳ </option>
					
					</select>
            </div>
    
            <!-- Submit Form Input -->
            <div class="form-group">
                <button type="submit" class="btn btn-primary form-control">Submit</button>
            </div>
        </div>
    </form>
</div>
</section>
@stop
