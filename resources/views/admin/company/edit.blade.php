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
                                <td>M?? s??? doanh nghi???p </td>
                                <td>
                                    <input type="text" size=20 class="form-control" name="masodn"
                                        value="{{ $info->masodn }}">

                                </td>
                            </tr>

                            <tr>
                                <td>M?? s??? DKKD</td>
                                <td><input type="text" class="form-control" id="dkkd" name="dkkd"
                                        value="{{ $info->dkkd }}"></td>
                            </tr>
                            <tr>
                                <td>T??nh tr???ng ho???t ?????ng</td>
                                <td>
                                    Ho???t ?????ng <input type='radio' value='1' name='public' <?php if ($info->public) {
                                        echo 'checked';
                                    } ?>>
                                    D???ng <input type='radio' value='0' name='public' <?php if (!$info->public) {
                                        echo 'checked';
                                    } ?>>
                                </td>
                            </tr>
                            <tr>
                                <td>S??? ??i???n tho???i </td>
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
                                <td>T???nh</td>
                                <td>
                                    <select class="form-control " name="tinh" id='tinh'>
                                        <option value="44"> Qu???ng B??nh </option>

                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Huy???n/Th??? x??/Th??nh ph??? </td>
                                <td><select class="form-control " name="huyen" id='huyen'>
                                        <?php foreach ($dmhc as $dv){
						if ($dv->level == 'Huy???n' || $dv->level == 'Th??nh ph???'||$dv->level =="Th??? x??"){
					
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
                                <td>X??/Ph?????ng</td>
                                <td>
                                    <select class="form-control" name="xa" id="xa" readonly>
                                        <?php foreach ($dmhc as $dv){
						if ($dv->level =="X??"||$dv->level =="Ph?????ng"||$dv->level =="Th??? tr???n"){
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
                                    Th??nh th??? <input type='radio' value='1' name='khuvuc' <?php if ($info->khuvuc) {
                                        echo 'checked';
                                    } ?>>
                                    N??ng th??n <input type='radio' value='0' name='khuvuc' <?php if (!$info->khuvuc) {
                                        echo 'checked';
                                    } ?>>
                                </td>
                            </tr>
                            <tr>
                                <td>?????a ch???</td>
                                <td>
                                    <textarea type="text" class="form-control" name="adress">{{ $info->adress }}</textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>Khu c??ng nghi???p</td>
                                <td><select class="form-control" name="khucn">
                                        <option value=0> Ch???n khu c??ng nghi???p </option>
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
                                <td>Lo???i h??nh doanh nghi???p</td>
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
                                <td>Ng??nh ngh???</td>
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

                                    <button type="submit" class="btn btn-success">L??u h??? s??</button>

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
                                        class="btn btn-danger"><i class="fa fa-reply"></i>&nbsp;Quay l???i</a>
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
                                Th??ng tin kh??c </a></h3>
                    </div>
                </div>
                <div class="panel-group" id="accordion">
                    <div class="panel panel-info">
                        {{-- <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                                        Th??ng tin kh??c </a>
                                </h4>
                            </div> --}}
                        <div id="collapse1" class="panel-collapse collapse in">
                            <div class="panel-body" style="margin-left:16px;">

                                <div>T???ng s??? lao ?????ng: {{ $info_th->tonghop['slld'] }}</div>
                                <div>S??? lao ?????ng ngo???i t???nh:
                                    {{ $info_th->tonghop['slld'] - $info_th->tonghop['trongtinh'] }}</div>
                                <div>S??? lao ?????ng n??? :{{ $info_th->tonghop['nu'] }}</div>
                                <div>S??? lao ?????ng ???? k?? H??L?? (t???ng/n???): {{ $info_th->tonghop['dakyhd'] }}/
                                    {{ $info_th->tonghop['nudakyhd'] }} </div>
                                <div>S??? lao ?????ng n?????c ngo??i (t???ng/n???): {{ $info_th->tonghop['nuocngoai'] }}/
                                    {{ $info_th->tonghop['nunuocngoai'] }} </div>
                                <div>S??? lao ?????ng ???? t???t nghi???p ph??? th??ng :{{ $info_th->tonghop['tnpt'] }}</div>

                                <h3>Ti???n l????ng</h3>
                                <div>L????ng b??nh qu??n :{{ $info_th->tonghop['avgluong'] }}</div>
                                <div>L????ng th???p nh???t :{{ $info_th->tonghop['minluong'] }}</div>
                                <div>L????ng cao nh???t :{{ $info_th->tonghop['maxluong'] }}</div>
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
                                Ph??n b??? LD theo tr??nh ????? CMKT</a></h3>
                    </div>
                </div>
                <div class="panel panel-info">
                    {{-- <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                                        Ph??n b??? LD theo tr??nh ????? CMKT</a>
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
                                Ph??n b??? LD theo l??nh v???c GD??T </a></h3>
                    </div>
                    <div class="card-toolbar">
                    </div>

                </div>
                <div class="panel panel-info">
                    {{-- <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
                                        Ph??n b??? LD theo l??nh v???c GD??T </a>
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
                                Ph??n b??? LD theo nh??m ng??nh ngh??? ch??nh </a></h3>
                    </div>
                    <div class="card-toolbar">
                    </div>

                </div>
                <div class="panel panel-info" style="margin-left:16px;">
                    {{-- <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">
                                        Ph??n b??? LD theo nh??m ng??nh ngh??? ch??nh </a>
                                </h4>
                            </div> --}}
                    <div id="collapse4" class="panel-collapse collapse">
                        <div class="panel-body">
                            <h3>Ph??n b??? LD theo nh??m ng??nh ngh??? ch??nh</h3>
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
