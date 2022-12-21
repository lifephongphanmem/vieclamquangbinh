 @extends('main')
 @section('custom-style')
 <link rel="stylesheet" type="text/css"
     href="{{ url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css') }}" />
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
<form method="POST" action="{{'/dmdonvi/update_dvql/'.$model_hc->id}}" accept-charset="UTF-8"  class="horizontal-form" id="update_dmdonvi" enctype="multipart/form-data">
    @csrf
    <div class="card card-custom wave wave-animate-slow wave-primary" style="min-height: 600px">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
                <h3 class="card-label text-uppercase">Thông đơn vị quản lý địa bàn</h3>
            </div>
            <div class="card-toolbar">
                <!--begin::Button-->
                <!--end::Button-->
            </div>
        </div>
        <div class="card-body">
            <div class="form-group row">
                <div class="col-lg-12">
                    <label>Đơn vị quản lý địa bàn</label>
                    <select class="form-control select2me" name="madvql">
                        <option value="">--- Chọn đơn vị ---</option>
                        @foreach ($model_donvi as $donvi )
                        <option value="{{$donvi->madv}}" {{$model_hc->madvql == $donvi->madv?'selected':''}}>{{$donvi->tendv}}</option>                            
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="row text-center">
                <div class="col-lg-12">
                    <a href="{{'/dmdonvi/danh_sach'}}" class="btn btn-danger"><i class="fa fa-reply"></i>&nbsp;Quay lại</a>
                    <button type="submit" class="btn btn-primary mr-2"><i class="fa fa-check"></i>Hoàn thành</button>                    
                </div>
            </div>
        </div>
    </div>
    </form>
@stop