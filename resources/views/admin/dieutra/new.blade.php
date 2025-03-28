{{-- @extends ('admin.layout') --}}
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
            $('#madv').change(function() {
                window.location.href = "{{ $inputs['url'] }}" + '?madv=' + $('#madv').val();
            });
            $('#kydieutra').change(function() {
                $('#ky_dieu_tra').val($('#kydieutra').val());
            });
        });
    </script>
@stop
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card card-custom">
                <div class="card-header card-header-tabs-line">
                    <div class="card-title">
                        <h3 class="card-label text-uppercase">Thêm danh sách điều tra mới</h3>
                    </div>
                    {{-- <div class="card-heading">Thông tin Sử dụng lao động</div> --}}
                </div>
                <div class="card-body">
                    <form role="form" method="POST" action="{{ URL::to('dieutra-bs') }}" enctype='multipart/form-data'>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label style="font-weight: bold">Đơn vị</label>
                                {!! Form::select('madv', $a_dsdv, $inputs['madv'], ['class' => 'form-control select2basic', 'id' => 'madv']) !!}
                            </div>
                        </div>

                        {{ csrf_field() }}
                        {{-- <div class="row"> --}}
                        {{-- <div class="col-sm-4 col-sm-offset-2"> --}}

                            {{-- <div class="form-group">
                                    <table>
                                        <tr>
                                            <td>Tỉnh</td>
                                            <td>
                                                <select class="form-control select2basic" name="tinh" id='tinh'
                                                    readonly>
                                                    <option value="44"> Quảng Bình </option>

                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Huyện/Thị xã/Thành phố </td>
                                            <td><select class="form-control select2basic" name="huyen" id='huyen'
                                                    readonly>
                                                    @foreach ($dmhc as $dv)
                                                        @if ($dv->capdo == 'H')
                                                            <option value='{{ $dv->maquocgia }}'>{{ $dv->name }}
                                                            </option>
                                                        @endif
                                                    @endforeach

                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Xã/Phường</td>
                                            <td>
                                                <select class="form-control select2basic" name="xa" id="xa"
                                                    readonly>
                                                    @foreach ($dmhc as $dv)
                                                        @if ($dv->capdo == 'X')
                                                            <option class="{{ $dv->parent }}"
                                                                value='{{ $dv->maquocgia }}'>
                                                                {{ $dv->name }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>
                                    </table>
                                </div> --}}
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <label style="font-weight: bold">Tỉnh</label>
                                    <select name="tinh" id="tinh" class="form-control" aria-readonly="true">
                                        <option value="44">Quảng Bình</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label style="font-weight: bold">Huyện</label>
                                    {{-- {!! Form::select('huyen',$m_huyen->name,null , ['class' => 'form-control', 'id' => 'madv']) !!} --}}
                                    <select name="huyen" id="huyen" class="form-control" aria-readonly="true">
                                        @if (isset($m_huyen))
                                            <option value="{{ $m_huyen->maquocgia }}">{{ $m_huyen->name }}</option>
                                        @endif

                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label style="font-weight: bold">Xã</label>
                                    <select name="xa" id="xa" class="form-control" aria-readonly="true">
                                        @if (isset($m_xa))
                                            <option value="{{ $m_xa->maquocgia }}">{{ $m_xa->name }}</option>
                                        @endif


                                    </select>
                                </div>
                            </div>
                            {{-- <div class="form-group">

                            </div>
                            <div class="form-group">

                            </div> --}}

                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label style="font-weight: bold">Kỳ điều tra </label>
                                    {{ Form::select('kydieutra', getNam(), date('Y'), ['class' => 'form-control select2basic', 'id' => 'kydieutra']) }}
                                </div>
                                <div class="col-md-6">
                                    <label style="font-weight: bold">File điều tra </label>
                                    <input type="file" id="import_file" name="import_file" class="form-control" >
                                </div>

                            </div>
                        {{-- </div> --}}
                        {{-- <div class="col-sm-4"> --}}

                            <div class="form-group">
                                <label style="font-weight: bold">Ghi chú</label>
                                <textarea name="ghichu" rows='5' class="form-control"></textarea>
                            </div>

                            <input type="hidden" name="isnew" value='1'>
                            <input type="hidden" name="id" value='0'>

                            <div class="row">
                                <div class="col-md-offset-4 col-md-12 text-center">
                                <button type="submit" class="btn btn-success">Đồng ý</button>
                                </div>
                            </div>
                                {{-- <a onclick="themmoi()" class="btn btn-success">Add</a> --}}
                        {{-- </div> --}}
                    </form>
                    {{-- </div> --}}
                </div>
            </div>
        </div>
    </div>
    <script>
        function themmoi() {
            madv = $('#madv').val();
            kydieutra = $('#kydieutra').val();
            huyen = $('#huyen').val();
            xa = $('#xa').val();
            url = '/dieutra/create?madv=' + madv + '&kydieutra=' + kydieutra + '&huyen=' + huyen + '&xa=' + xa;
            window.location.href = url;
        }
    </script>
@endsection
