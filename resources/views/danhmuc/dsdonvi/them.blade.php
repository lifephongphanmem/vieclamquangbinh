@extends('main')
@section('custom-style')
    <link rel="stylesheet" type="text/css"
        href="{{ url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ url('assets/global/plugins/select2/select2.css') }}" />
@stop

@section('custom-script')
    <script type="text/javascript" src="{{ url('assets/global/plugins/select2/select2.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('assets/global/plugins/datatables/media/js/jquery.dataTables.min.js') }}">
    </script>

    <script src="{{ url('assets/admin/pages/scripts/table-lifesc.js') }}"></script>
    <script>
        jQuery(document).ready(function() {
            TableManaged3.init();
        });
    </script>
@stop
@section('content')
     <!--begin::Card-->
     {!! Form::model($model, ['method' => 'POST', 'danh_muc/dsdonvi/them', 'class'=>'horizontal-form','id'=>'update_dmdonvi','files'=>true,'enctype'=>'multipart/form-data']) !!}
     {{ Form::hidden('madonvi', null) }}
     <div class="card card-custom wave wave-animate-slow wave-primary" style="min-height: 600px">
         <div class="card-header flex-wrap border-0 pt-6 pb-0">
             <div class="card-title">
                 <h3 class="card-label text-uppercase">Thông tin chi tiết đơn vị</h3>
             </div>
             <div class="card-toolbar">
                 <!--begin::Button-->
                 <!--end::Button-->
             </div>
         </div>
         <div class="card-body">
             <div class="form-group row">
                 {{-- <div class="col-lg-4">
                     <label>Mã quan hệ ngân sách</label>
                     {!!Form::text('maqhns', null, array('class' => 'form-control'))!!}
                 </div> --}}
 
                 <div class="col-lg-4">
                     <label>Tên đơn vị<span class="require">*</span></label>
                     {!!Form::text('tendonvi', null, array('class' => 'form-control', 'required', 'autofocus'))!!}
                 </div>
 
                 <div class="col-lg-4">
                     <label>Tên đơn vị hiển thị báo cáo<span class="require">*</span></label>
                     {!!Form::text('tendvhienthi', null, array('class' => 'form-control', 'required'))!!}
                 </div>                
             </div>
 
             <div class="form-group row">
                 <div class="col-lg-4">
                     <label>Tên đơn vị cấp trên</label>
                     {!!Form::text('tendvcqhienthi', null, array('class' => 'form-control'))!!}
                 </div>
 
                 <div class="col-lg-4">
                     <label>Địa chỉ trụ sở</label>
                     {!!Form::text('diachi', null, array('class' => 'form-control'))!!}
                 </div>
 
                 <div class="col-lg-4">
                     <label>Địa danh</label>
                     {!!Form::text('diadanh', null, array('class' => 'form-control'))!!}
                 </div>                
             </div>
 
             <div class="form-group row">
                 <div class="col-lg-4">
                     <label>Chức vụ người ký</label>
                     {!!Form::text('chucvuky', null, array('class' => 'form-control'))!!}
                 </div>
 
                 <div class="col-lg-4">
                     <label>Họ tên người ký</label>
                     {!!Form::text('nguoiky', null, array('class' => 'form-control'))!!}
                 </div>
 
                 <div class="col-lg-4">
                     <label>Chức vụ người ký thay</label>
                     {!!Form::text('chucvukythay', null, array('class' => 'form-control'))!!}
                 </div>                
             </div>
 
             <div class="form-group row">
                 <div class="col-lg-4">
                     <label>Địa bàn quản lý</label>
                     {{-- {!! Form::select('madiaban', getDiaBan_All(), null, array('class'=>'form-control select2basic'))!!} --}}
                 </div>
                 <div class="col-lg-8">
                     <label>Ngành, lĩnh vực</label>
                     {{-- {!! Form::select('linhvuchoatdong', setArrayAll(getNganhLinhVuc(),'Không chọn','') ,null, array('class'=>'form-control select2basic'))!!} --}}
                 </div>
             </div>
 
             <div class="form-group row">
                 <div class="col-lg-12">
                     <label>Thông tin liên hệ</label>
                     {!! Form::text('ttlienhe', null, array('class'=>'form-control'))!!}
                 </div>
             </div>
 
         </div>
         <div class="card-footer">
             <div class="row text-center">
                 <div class="col-lg-12">
                     <a href="{{url('DonVi/DanhSach?madiaban='.$model->madiaban)}}" class="btn btn-danger"><i class="fa fa-reply"></i>&nbsp;Quay lại</a>
                     <button type="submit" class="btn btn-primary mr-2"><i class="fa fa-check"></i>Hoàn thành</button>                    
                 </div>
             </div>
         </div>
     </div>
     {!! Form::close() !!}
@stop