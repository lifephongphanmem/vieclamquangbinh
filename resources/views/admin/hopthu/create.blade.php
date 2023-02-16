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
    <div class="row">
        <div class="col-xl-12">
            <div class="card card-custom">
                <div class="card-header card-header-tabs-line">
                    <div class="card-title">
                        <h3 class="card-label text-uppercase">Chi tiết văn bản</h3>
                    </div>
                </div>
                    <div class="card-body form" id="form_wizard">
                        {{-- {!! Form::open(['url'=>'/nghiep_vu/ho_so/store','method'=>'post' , 'files'=>true, 'id' => 'create_hscb','enctype'=>'multipart/form-data']) !!} --}}
                        <form action="{{ '/hopthu/store' }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label">Đối tượng gửi</label>
                                            <select name="doituong" id="" class="form-control select2basic"
                                                style="width:100%">
                                                <option value="">Tất cả</option>
                                                <option value="xa">Xã</option>
                                                <option value="huyen">Huyện</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label">Tiêu đề</label>
                                            <input type="text" name="tieude" class="form-control"
                                                value="{{ isset($model) ? $model->tieude : '' }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label">Nội dung</label>
                                            {{-- {!!Form::text('tencanbo', null, array('id' => 'tencanbo','class' => 'form-control', 'required'=>'required'))!!} --}}
                                            <input type="text" name="noidung" class="form-control"
                                                value="{{ isset($model) ? $model->noidung : '' }}" required>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label">File đính kèm</label>
                                            <input type="file" name="file" class="form-control"
                                                value="{{ isset($model) ? $model->file : '' }}" required>
                                        </div>
                                    </div>

                                </div>

                            </div>

                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-4 col-md-12 text-center">

                                        <button type="submit" class="btn btn-success">Tạo hồ sơ</button>

                                        <a href="{{ URL::previous() }}" class="btn btn-danger"><i
                                                class="fa fa-reply"></i>&nbsp;Quay lại</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                        {{-- {!! Form::close() !!} --}}
                    </div>
                </div>
            </div>
        </div>
    @stop
