@extends ('main')
@section('custom-style')
<link rel="stylesheet" type="text/css" href="{{ url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css') }}" />
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
<script type="text/javascript" src="{{ url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js') }}"></script>

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
                    <h3 class="card-label text-uppercase">Báo tăng lao động</h3>
                </div>
                <div class="card-toolbar">
                </div>

            </div>
            <div class="card-body">
                <form role="form" method="post" action="{{ '/dangkytimviec/update' }}" enctype='multipart/form-data'>
                    @csrf
                       <div class="card card-custom">
                        <div class="row">
                            <div class="col-sm-12 col-sm-offset-1 ">
                                <fieldset class="scheduler-border">
                                    <legend class="scheduler-border text-info">Thông tin phiên giao dịch</legend>
                                    <div class="row">

                                        <div class="col-sm-4 col-sm-offset-0 ">
                                            <label>Phiên giao dịch(*)</label>
                                            <select name="phiengd" class="form-control" disabled>
                                                <option {{ isset($model)?($model->phiengd == "Phiên định kỳ" ? 'selected' : ''):'' }}>Phiên định kỳ</option>
                                                <option {{ isset($model)?($model->phiengd == "Phiên đột xuất" ? 'selected' : ''):'' }}>Phiên đột xuất</option>
                                                <option {{ isset($model)?($model->phiengd == "Phiên online" ? 'selected' : ''):'' }}>Phiên online</option>
                                            </select>
                                        </div>

                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body" id='dynamicTable'>
                        <div class="row" id="1stld">
                            <div class="col-md-12">
                                <div class="card card-custom">
                                    <div class="card-header flex-wrap border-0 pt-6 pb-0">
                                        <div class="card-title">
                                            <h3 class="card-label text-uppercase" id="nld">Thông tin người tìm việc</h3>
                                        </div>
                                        <div class="card-toolbar">
                                            <!--begin::Button-->
                                            <!--end::Button-->
                                        </div>
                                    </div>
                                    <div class="card-header card-header-tabs-line">
                                        <div class="card-toolbar">
                                            <ul class="nav nav-tabs nav-bold nav-tabs-line">
                                                <li class="nav-item">
                                                    <a class="nav-link active" data-toggle="tab" href="#thongtincoban" id="ttcb">
                                                        <span class="nav-icon">
                                                            <i class="fas fa-users"></i>
                                                        </span>
                                                        <span class="nav-text">Thông tin cơ bản</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-toggle="tab" href="#khac" id="k">
                                                        <span class="nav-icon">
                                                            <i class="far fa-user"></i>
                                                        </span>
                                                        <span class="nav-text">Thông tin tìm việc</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>

                                    </div>
                                    <div class="card-body">
                                        <div class="tab-content">
                                            <div class="tab-pane fade active show" id="thongtincoban" role="tabpanel" aria-labelledby="thongtincoban">

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        @include('admin.dangkytimviec.include.coban')
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="khac" role="tabpanel" aria-labelledby="khac">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        @include('admin.dangkytimviec.include.timviec')
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                
                    <input type="hidden" name="quantity" id="quantity"  value="1">
                    <input type="hidden" name="isnew" value='1'>
                    <input type="hidden" name="id" value='{{$model->id}}'>
                    <input type="hidden" name="tungay"  value="{{$input['tungay']}}">
                    <input type="hidden" name="denngay"  value="{{$input['denngay']}}">
                    <input type="hidden" name="gioitinh_filter"  value="{{$input['gioitinh_filter']}}">
                    <input type="hidden" name="age_filter"  value="{{$input['age_filter']}}">
                    <input type="hidden" name="phien"  value="{{$input['phien']}}">

                    <div class="row text-center">
                        <div class="col-lg-12">
                            <a onclick="history.back()" class="btn btn-danger mr-5"><i class="fa fa-reply"></i>&nbsp;Quay lại</a>
                            <button onclick="submit_td()" type="submit" class="btn btn-success  mr-5" >
                                Hoàn thành
                            </button>
                        </div>
                    </div>


                </form>
            </div>
        </div>
    </div>
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script type="text/javascript">
    var i = 0;

    function submit_td() {
        var quantity = $("#quantity").val();  
        for (i = 0; i < quantity; i++) {

            if (i == 0) {
                rowid = "#1stld";
            } else {

                rowid = "#row" + i;
            }
            
            // combine data - phuc loi-
            var varsphucloi = $('.phucloi:checked').map(function() {
                if ($(this).parents(rowid).length == 1) {
                    return $(this).val();
                }
            }).get().join("; ");
            
            if ($(rowid).find("#checkphucloikhac").first().prop('checked') == true) {
                varsphucloi = varsphucloi.concat("; ", $(rowid).find("#phucloikhac").first().val());
            };

            if (varsphucloi == '') {
                $(rowid).find(".phucloival").first().val('{{$model->phucloi}}');
            } else {
                $(rowid).find(".phucloival").first().val(varsphucloi);
            }


            // combine data - ky nang mem-
            var varskynangmem = $('.kynangmem:checked').map(function() {
                if ($(this).parents(rowid).length == 1) {
                    return $(this).val();
                }
            }).get().join("; ");
            if ($(rowid).find("#checkkynangmemkhac").first().prop('checked') == true) {
                varskynangmem = varskynangmem.concat("; ", $(rowid).find("#kynangmemkhac").first().val());
            };
            if (varskynangmem == '') {
                $(rowid).find(".kynangmemval").first().val('{{$model->kynangmem}}');
            } else {
                $(rowid).find(".kynangmemval").first().val(varskynangmem);
            }
           

        }
    }
</script>
@endsection