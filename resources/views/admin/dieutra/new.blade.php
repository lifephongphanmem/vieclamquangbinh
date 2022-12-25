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
                        <div class="row">
                            <div class="col-sm-4 col-sm-offset-2">

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
                                    <div class="col-md-12">
                                        <label style="font-weight: bold">Tỉnh</label>
                                        <select name="tinh" id="" class="form-control" aria-readonly="true">
                                            <option value="44">Quảng Bình</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label style="font-weight: bold">Huyện</label>
                                        {{-- {!! Form::select('huyen',$m_huyen->name,null , ['class' => 'form-control', 'id' => 'madv']) !!} --}}
                                        <select name="huyen" id="" class="form-control" aria-readonly="true">
                                            @if (isset($m_huyen))
                                            <option value="{{$m_huyen->maquocgia}}">{{$m_huyen->name}}</option> 
                                            @endif

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label style="font-weight: bold">Xã</label>
                                        <select name="xa" id="" class="form-control" aria-readonly="true">
                                        @if (isset($m_xa))
                                        <option value="{{$m_xa->maquocgia}}">{{$m_xa->name}}</option>
                                        @endif
 
                                           
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-12">
                                    <label for="exampleInputFile">File điều tra </label>
                                    <input type="file" id="import_file" name="import_file" required>
                                    </div>

                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Kỳ điều tra </label>
                                    {{-- <input type="year" id="kydieutra" name="kydieutra" size='30' style="width:50%;"
                                        class="form-control"> --}}
                                    {{Form::select('kydieutra',getNam(),date('Y'),['class'=>'form-control select2basic'])}}

                                </div>
                                <div class="form-group">
                                    <label>Ghi chú</label>
                                    <textarea name="ghichu" rows='5' class="form-control"></textarea>
                                </div>

                                <input type="hidden" name="isnew" value='1'>
                                <input type="hidden" name="id" value='0'>

                                <button type="submit" class="btn btn-info">Upload Danh sách</button>

                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
