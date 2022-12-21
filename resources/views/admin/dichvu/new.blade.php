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
                        <h3 class="card-label text-uppercase">Thêm dịch vụ</h3>
                    </div>
					<div class="card-toolbar">
						<a class="btn btn-xs btn-primary" href="{{ URL::to('dichvu-ba') }}"><i class="fa fa-undo">&ensp; Trở về </a></i>
					</div>
                </div>
                <div class="card-body">
                    <div class="row w3-res-tb">
                        <div class="col-sm-5 m-b-xs">
                        </div>
                        <div class="col-sm-4">
                        </div>
                        <div class="col-sm-3">
                           
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="position-center">
                            <form role="form" method="POST" action="{{ URL::to('dichvu-bs') }}"
                                enctype='multipart/form-data'>
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label>Tên </label>

                                    <input type="text" name="name" class="form-control" required>

                                </div>
                                <div class="form-group">
                                    <label>Hoạt động</label>
                                    <select class="form-control" name="state">
                                        <option value='1'>Hoạt động</option>
                                        <option value='2'>Không</option>

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Miêu tả </label>

                                    <textarea name="description" class="form-control" rows=10 required></textarea>

                                </div>





                                <input type="hidden" name="isnew" value='1'>
                                <input type="hidden" name="id" value='0'>


                                <button type="submit" class="btn btn-info">Thêm dich vụ</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
		</div>


        @endsection
