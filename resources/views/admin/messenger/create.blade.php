@extends ('main')
@section('custom-style')
    <link rel="stylesheet" type="text/css"
        href="{{ url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css') }}" />
    <style>
        .col-md-3 {
            float: left;
        }

        .wrapper {
            margin-top: 0px;
            padding: 0px 15px;
        }
    </style>
@stop

@section('custom-script')
    <script type="text/javascript" src="{{ url('assets/global/plugins/datatables/media/js/jquery.dataTables.min.js') }}">
    </script>
    <script type="text/javascript"
        src="{{ url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js') }}"></script>

    <script src="{{ url('assets/admin/pages/scripts/table-lifesc.js') }}"></script>
    <script>
        jQuery(document).ready(function() {
            TableManaged3.init();
        });
    </script>
@stop
@section('content')
    {{-- <section class="panel">
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
</div> --}}

    <div class="row">
        <div class="col-xl-12">
            <div class="card card-custom">
                <div class="card-header card-header-tabs-line">
                    <div class="card-title">
                        <h3 class="card-label text-uppercase">Văn bản mới</h3>
                    </div>
                    <div class="card-toolbar">
                        <button class="btn btn-sm btn-success"><i class="fa fa-undo"> <a href="{{ URL::to('admessages') }}">&nbsp; Trở về
                                </a></i></button>
                    </div>
                </div>
                <div class="panel-body">
                    <form action="{{ route('admessages.store') }}" method="post">
                        {{ csrf_field() }}
                        <div class="col-md-8 mt-3">
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
                                <input type="file" name="attach" class="form-control"> </td>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Người nhận</label>
                                <select name='recipients' class="form-control">
                                    <option value="0"> Tất cả các doanh nghiệp </option>
                                    <option value="-1"> Tất cả các doanh nghiệp chưa khai báo trong kỳ </option>

                                </select>
                            </div>

                            <!-- Submit Form Input -->
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary form-control" style="width:130px; text-align:center">Xác nhận</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
