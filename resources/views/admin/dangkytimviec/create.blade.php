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
                <form role="form" method="get" action="{{ '/dangkytimviec/store' }}" enctype='multipart/form-data'>
                    @csrf
                    <div class="panel-body" id='dynamicTable'>
                        <div class="row" id="1stld">
                            <div class="col-md-12">
                                <div class="card card-custom">
                                    <div class="card-header flex-wrap border-0 pt-6 pb-0">
                                        <div class="card-title">
                                            <h3 class="card-label text-uppercase" id="nld">Thông tin người tìm việc 1</h3>
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
                    {{-- <input type="hidden" name="id[]" value='0'> --}}
                    <input type="hidden" name="tungay"  value="{{$input['tungay']}}">
                    <input type="hidden" name="denngay"  value="{{$input['denngay']}}">
                    <input type="hidden" name="gioitinh_filter"  value="{{$input['gioitinh_filter']}}">
                    <input type="hidden" name="age_filter"  value="{{$input['age_filter']}}">
                    
                    <div class="row text-center">
                        <div class="col-lg-12 text-left">
                            <button type="button" name="add" id="add" class="btn btn-sm btn-success">
                                Thêm người tìm việc
                            </button>
                            <button type="button" class="btn btn-sm btn-danger" id='remove'>
                                Xóa
                            </button>
                        </div>
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

    $("#add").click(function() {

        document.getElementById("quantity").value = parseInt(document.getElementById("quantity").value, 10) + 1;
        ++i;
        firstld = document.getElementById("1stld").innerHTML + '';
        nextld = "<div class='row' id ='row" + i + "' >" + firstld + "</div>"
        $("#dynamicTable").append(nextld);

        $("#row" + i).first().find("#nld").html("Thông tin người lao động " + (i + 1));

        $("#row" + i).first().find("#thongtincoban").attr("id", "thongtincoban" + i);
        $("#row" + i).first().find("#ttcb").attr("href", "#thongtincoban" + i);

        $("#row" + i).first().find("#khac").attr("id", "khac" + i);
        $("#row" + i).first().find("#k").attr("href", "#khac" + i);

    });
    $("#remove").click(function() {
        if ($("#quantity").val() > 1) {
            document.getElementById("quantity").value = parseInt(document.getElementById("quantity").value, 10) - 1;
            delrowid = "row" + i;
            document.getElementById(delrowid).remove();
            --i;
        }
    });

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
            console.log(varsphucloi);
            if ($(rowid).find("#checkphucloikhac").first().prop('checked') == true) {
                varsphucloi = varsphucloi.concat("; ", $(rowid).find("#phucloikhac").first().val());
            };
            $(rowid).find(".phucloival").first().val(varsphucloi);

            // combine data - ky nang mem-
            var varskynangmem = $('.kynangmem:checked').map(function() {
                if ($(this).parents(rowid).length == 1) {
                    return $(this).val();
                }
            }).get().join("; ");
            if ($(rowid).find("#checkkynangmemkhac").first().prop('checked') == true) {
                varskynangmem = varskynangmem.concat("; ", $(rowid).find("#kynangmemkhac").first().val());
            };
            $(rowid).find(".kynangmemval").first().val(varskynangmem);

        }
    }
</script>
@endsection