@extends('main_baocao')

@section('content')
    <table id="data_header" width="96%" cellspacing="0" cellpadding="8" style="margin:0 auto 20px; text-align: center;">
        <tr>
            <td></td>
            <td class="text-right" style="font-style:italic"></td>
        </tr>
        <tr>
            <td width="40%" style="vertical-align: top;">

                {{-- <p>Tỉnh: Quảng Bình</p> --}}
                {{-- <p>{{ $m_donvi->huyen != "Quảng Bình" ? $m_donvi->huyen :'' }}</p>
                <p>{{ $m_donvi->name }}</p> --}}
                <hr style="width: 10%;vertical-align: top;  margin-top: 2px">

            </td>

        </tr>
    </table>
    <p id='data_body' style="text-align: center;font-weight: bold;font-size: 20px; text-transform: uppercase">DANH SÁCH CÁN BỘ<br>
    </p>

    <table id="data_body2" border="1" cellspacing="0" cellpadding="0">
        <thead>


            <tr>
                <th width="5%">TT</th>
                <th>Họ và tên </th>
                <th style="width:10%">Ngày sinh<br></th>
                <th>CCCD</th>
                <th>Giới tính </th>
                <th>Điện thoại </th>
                <th>Địa chỉ</th>
                <th> Ghi chú </th>
            </tr>

            <tr>
                @for ($i = 1; $i < 9; $i++)
                    <td style="font-weight:bold; text-decoration: underline;font-style: italic;text-align: center">
                        {{ $i }}</td>
                @endfor
            </tr>

        </thead>
        <?php $stt = 1; $i=1?>
        <tbody>
            @foreach ($m_huyen as $ct)
                <?php $model_xa = $m_xa->where('parent', $ct->maquocgia); ?>
                <tr style="font-weight: bold">
                    <td>{{strtoupper(toAlpha($stt++))}}</td>
                    <td colspan="7" style="font-weight: bold">{{ $ct->name }}</td>
                </tr>
                @foreach ($model_xa as $val)
                    <?php $canbo = $model->where('madv', $val->madv); ?>
                    @if (count($canbo) > 0)
                    <tr style="font-weight: bold; font-style:italic">
                        <td>{{convert2Roman($i++)}}</td>
                        <td colspan="7">{{ $val->name }}</td>
                    </tr>
                    @endif

                    @foreach ($canbo as $k=> $item)
                        <tr>

                            <td style="text-align: right ; vertical-align: middle">{{ ++$k }}</td>
                            <td style="vertical-align: middle">{{ $item->name }}</td>
                            <td style="text-align: center ; vertical-align: middle">{{ getDayVn($item->ngaysinh) }}</td>
                            <td style="text-align: center ; vertical-align: middle">{{ $item->cccd }}</td>
                            <td style="text-align: center ; vertical-align: middle">{{ $item->gioitinh == 1 ? 'Nam' : 'Nữ' }}
                            </td>
                            <td style="text-align: center ; vertical-align: middle">{{ $item->sdt }}</td>
                            <td style="vertical-align: middle">{{ $item->diachi }}</td>
                            <td></td>
                        </tr>
                    @endforeach
                @endforeach
            @endforeach


        </tbody>
    </table>
@stop
