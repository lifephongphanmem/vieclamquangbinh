@extends('main')
@section('custom-style')
    <link rel="stylesheet" type="text/css"
        href="{{ url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css') }}" />
@stop

@section('custom-script')

    <script src="{{ url('assets/admin/pages/scripts/table-lifesc.js') }}"></script>
@stop
@section('content')
    <form method="POST" action="{{ '/TongHopSoLieu/tonghopsolieu' }}" accept-charset="UTF-8" class="horizontal-form"
        id="update_dmdonvi" enctype="multipart/form-data">
        @csrf
        <div class="card card-custom wave wave-animate-slow wave-primary" style="min-height: 600px">
            <div class="card-header flex-wrap border-0 pt-6 pb-0">
                <div class="card-title">
                    <h3 class="card-label text-uppercase">Tổng hợp số liệu</h3>
                </div>
                <div class="card-toolbar">
                    <!--begin::Button-->
                    <!--end::Button-->
                </div>
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <div class="col-lg-3">
                        <label>Năm tổng hợp</label>
                        <select class="form-control select2basic" name="nam">
                            @foreach (getNam() as $ct)
                                <option value="{{ $ct }}">{{ $ct }}</option>
                            @endforeach

                        </select>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="row text-center">
                    <div class="col-lg-12">
                        <button type="submit" class="btn btn-primary mr-2"><i class="fa fa-check"></i>Tổng hợp</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@stop
