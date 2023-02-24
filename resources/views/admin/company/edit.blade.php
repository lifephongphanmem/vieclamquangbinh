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

    {{-- 
    <section class="panel">
	<header class="panel-heading">
	  {{$info->name}}
	</header> --}}
    {{-- <div class="panel-body">
	<div class="row ">	
	<div class="col-sm-10 col-sm-offset-1">
		<div class="top-menu">
			@include('admin.dnmenu')
			@yield('top-menu') 
		</div>
	</div>
	</div> --}}
    <div class="row">
        <div class="col-xl-8">
            <div class="card card-custom">
                <div class="card-header card-header-tabs-line" style="display: block">
                    <div class="card-title">
                        <h3 class="card-label text-uppercase"> {{ $info->name }}</h3>

                    </div>

                </div>
                <div class="card-body">
                    <div class="row ">
                        <div class="col-md-12 mb-5">
                            {{-- <div class="top-menu"> --}}
                            @include('admin.dnmenu')
                            @yield('top-menu')
                            {{-- </div> --}}
                        </div>
                    </div>
                    <form role="form" method="POST" action="{{ url('/doanhnghiep-up?id=' . $info->id) }}"
                        enctype='multipart/form-data'>
                        {{ csrf_field() }}
                        <table width="100%">
                            <tr>
                                <td>Mã số doanh nghiệp </td>
                                <td>
                                    <input type="text" size=20 class="form-control" name="masodn"
                                        value="{{ $info->masodn }}">

                                </td>
                            </tr>

                            <tr>
                                <td>Mã số DKKD</td>
                                <td><input type="text" class="form-control" id="dkkd" name="dkkd"
                                        value="{{ $info->dkkd }}"></td>
                            </tr>
                            <tr>
                                <td>Tình trạng hoạt động</td>
                                <td>
                                    Hoạt động <input type='radio' value='1' name='public' <?php if ($info->public) {
                                        echo 'checked';
                                    } ?>>
                                    Dừng <input type='radio' value='0' name='public' <?php if (!$info->public) {
                                        echo 'checked';
                                    } ?>>
                                </td>
                            </tr>
                            <tr>
                                <td>Số điện thoại </td>
                                <td><input type="text" name="phone" class="form-control" value="{{ $info->phone }}">
                                </td>
                            </tr>
                            <tr>
                                <td>Fax</td>
                                <td><input type="text" name="fax" value="{{ $info->fax }}" class="form-control">
                                </td>
                            </tr>
                            <tr>
                                <td>Website</td>
                                <td><input type="text" name="website" value="{{ $info->website }}" class="form-control">
                                </td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><input type="email" name="email" value="{{ $info->email }}" class="form-control">
                                </td>
                            </tr>
                            <tr>
                                <td>Tỉnh</td>
                                <td>
                                    <select class="form-control " name="tinh" id='tinh'>
                                        <option value="44"> Quảng Bình </option>

                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Huyện/Thị xã/Thành phố </td>
                                <td><select class="form-control " name="huyen" id='huyen'>
                                        <?php foreach ($dmhc as $dv){
						if ($dv->level == 'Huyện' || $dv->level == 'Thành phố'||$dv->level =="Thị xã"){
					
						?>
                                        @if ($info->tinh == '44')
                                            <option value='{{ $dv->maquocgia }}' <?php if ($dv->maquocgia == $info->huyen) {
                                                echo 'selected';
                                            } ?>>{{ $dv->name }}
                                            </option>
                                        @else
                                            <option value='{{ $dv->maquocgia }}' <?php if ($dv->name == $info->huyen) {
                                                echo 'selected';
                                            } ?>>{{ $dv->name }}
                                            </option>
                                        @endif


                                        <?php  }}?>

                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Xã/Phường</td>
                                <td>
                                    <select class="form-control" name="xa" id="xa" readonly>
                                        <?php foreach ($dmhc as $dv){
						if ($dv->level =="Xã"||$dv->level =="Phường"||$dv->level =="Thị trấn"){
						?>
                                        @if ($info->tinh == '44')
                                            <option value='{{ $dv->maquocgia }}' <?php if ($dv->maquocgia == $info->xa) {
                                                echo 'selected';
                                            } ?>>{{ $dv->name }}
                                            </option>
                                        @else
                                            <option value='{{ $dv->maquocgia }}' <?php if ($dv->name == $info->xa) {
                                                echo 'selected';
                                            } ?>>{{ $dv->name }}
                                            </option>
                                        @endif
                                        <?php } }?>


                                    </select>
                                    Thành thị <input type='radio' value='1' name='khuvuc' <?php if ($info->khuvuc) {
                                        echo 'checked';
                                    } ?>>
                                    Nông thôn <input type='radio' value='0' name='khuvuc' <?php if (!$info->khuvuc) {
                                        echo 'checked';
                                    } ?>>
                                </td>
                            </tr>
                            <tr>
                                <td>Địa chỉ</td>
                                <td>
                                    <textarea type="text" class="form-control" name="adress">{{ $info->adress }}</textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>Khu công nghiệp</td>
                                <td><select class="form-control" name="khucn">
                                        <option value=0> Chọn khu công nghiệp </option>
                                        <?php foreach ($kcn as $dv){
					
						?>
                                        <option value='{{ $dv->id }}' <?php if ($dv->id == $info->khucn) {
                                            echo 'selected';
                                        } ?>>{{ $dv->name }}
                                        </option>
                                        <?php  }?>


                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Loại hình doanh nghiệp</td>
                                <td><select class="form-control" name="loaihinh">
                                        @if ($info->tinh == '44')
                                            <?php foreach ($ctype2 as $dv){
						?>
                                            <option value='{{ $dv->madmlhkt }}' <?php if ($dv->madmlhkt == $info->loaihinh) {
                                                echo 'selected';
                                            } ?>>{{ $dv->tenlhkt }}
                                            </option>
                                            <?php  }?>
                                        @else
                                            <?php foreach ($ctype as $dv){
						?>
                                            <option value='{{ $dv->id }}' <?php if ($dv->id == $info->loaihinh) {
                                                echo 'selected';
                                            } ?>>{{ $dv->name }}
                                            </option>
                                            <?php  }?>
                                        @endif




                                    </select> </td>
                            </tr>
                            <tr>
                                <td>Ngành nghề</td>
                                <td> <select class="form-control" name="nganhnghe">
                                        <?php foreach ($cfield as $dv){
					
						?>
                                        <option value='{{ $dv->id }}' <?php if ($dv->id == $info->nganhnghe) {
                                            echo 'selected';
                                        } ?>>{{ $dv->name }}
                                        </option>
                                        <?php  }?>


                                    </select> </td>
                            </tr>


                        </table>

                        <div class="form-actions mt-5">
                            <div class="row">
                                <div class="col-md-offset-4 col-md-12 text-center">

                                    <button type="submit" class="btn btn-success">Lưu hồ sơ</button>

                                    <a href="{{ url(
                                        '/doanhnghiep-ba?dm_filter=' .
                                            $dm_filter .
                                            '&public_filter=' .
                                            $public_filter .
                                            '&khaibao=' .
                                            $khaibao .
                                            '&quymo_min_filter=' .
                                            $quymo_min_filter .
                                            '&quymo_max_filter=' .
                                            $quymo_max_filter,
                                    ) }}"
                                        class="btn btn-danger"><i class="fa fa-reply"></i>&nbsp;Quay lại</a>
                                </div>
                            </div>
                        </div>


                    </form>
                </div>
            </div>

        </div>
        <div class="col-xl-4">
            <div class="card card-custom mb-2">
                <div class="card-header card-header-tabs-line">
                    <div class="card-title">
                        <h3 class="card-label text-uppercase"><a data-toggle="collapse" data-parent="#accordion"
                                href="#collapse1">
                                Thông tin khác </a></h3>
                    </div>
                </div>
                <div class="panel-group" id="accordion">
                    <div class="panel panel-info">
                        {{-- <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                                        Thông tin khác </a>
                                </h4>
                            </div> --}}
                        <div id="collapse1" class="panel-collapse collapse in">
                            <div class="panel-body" style="margin-left:16px;">

                                <div>Tổng số lao động: {{ $info_th->tonghop['slld'] }}</div>
                                <div>Số lao động ngoại tỉnh:
                                    {{ $info_th->tonghop['slld'] - $info_th->tonghop['trongtinh'] }}</div>
                                <div>Số lao động nữ :{{ $info_th->tonghop['nu'] }}</div>
                                <div>Số lao động đã ký HĐLĐ (tổng/nữ): {{ $info_th->tonghop['dakyhd'] }}/
                                    {{ $info_th->tonghop['nudakyhd'] }} </div>
                                <div>Số lao động nước ngoài (tổng/nữ): {{ $info_th->tonghop['nuocngoai'] }}/
                                    {{ $info_th->tonghop['nunuocngoai'] }} </div>
                                <div>Số lao động đã tốt nghiệp phổ thông :{{ $info_th->tonghop['tnpt'] }}</div>

                                <h3>Tiền lương</h3>
                                <div>Lương bình quân :{{ $info_th->tonghop['avgluong'] }}</div>
                                <div>Lương thấp nhất :{{ $info_th->tonghop['minluong'] }}</div>
                                <div>Lương cao nhất :{{ $info_th->tonghop['maxluong'] }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card card-custom mb-2">
                <div class="card-header card-header-tabs-line">
                    <div class="card-title">
                        <h3 class="card-label text-uppercase"><a data-toggle="collapse" data-parent="#accordion"
                                href="#collapse2">
                                Phân bố LD theo trình độ CMKT</a></h3>
                    </div>
                </div>
                <div class="panel panel-info">
                    {{-- <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                                        Phân bố LD theo trình độ CMKT</a>
                                </h4>
                            </div> --}}
                    <div id="collapse2" class="panel-collapse collapse">
                        <div class="panel-body" style="margin-left:16px;">

                            <?php
								foreach($info_th->pbcmkt as $key =>$val) 
								{ ?>
                            <div>{{ $key }} : {{ $val }}</div>
                            <?php } ?>



                        </div>
                    </div>
                </div>
            </div>
            <div class="card card-custom mb-2">
                <div class="card-header card-header-tabs-line">
                    <div class="card-title">
                        <h3 class="card-label text-uppercase"><a data-toggle="collapse" data-parent="#accordion"
                                href="#collapse3">
                                Phân bố LD theo lĩnh vực GDĐT </a></h3>
                    </div>
                    <div class="card-toolbar">
                    </div>

                </div>
                <div class="panel panel-info">
                    {{-- <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
                                        Phân bố LD theo lĩnh vực GDĐT </a>
                                </h4>
                            </div> --}}
                    <div id="collapse3" class="panel-collapse collapse">
                        <div class="panel-body" style="margin-left:16px;">
                            <?php
									foreach($info_th->pblvdt as $key =>$val) 
									{ ?>
                            <div>{{ $key }} : {{ $val }}</div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card card-custom mb-2">
                <div class="card-header card-header-tabs-line">
                    <div class="card-title">
                        <h3 class="card-label text-uppercase"><a data-toggle="collapse" data-parent="#accordion"
                                href="#collapse4">
                                Phân bố LD theo nhóm ngành nghề chính </a></h3>
                    </div>
                    <div class="card-toolbar">
                    </div>

                </div>
                <div class="panel panel-info" style="margin-left:16px;">
                    {{-- <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">
                                        Phân bố LD theo nhóm ngành nghề chính </a>
                                </h4>
                            </div> --}}
                    <div id="collapse4" class="panel-collapse collapse">
                        <div class="panel-body">
                            <h3>Phân bố LD theo nhóm ngành nghề chính</h3>
                            <?php
									foreach($info_th->pbnghenghiep as $key =>$val) 
									{ ?>
                            <div class="mt-3">{{ $key }} : {{ $val }}</div>
                            <?php } ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
 
    @endsection
