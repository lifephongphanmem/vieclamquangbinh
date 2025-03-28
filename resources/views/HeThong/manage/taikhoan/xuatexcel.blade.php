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
    <p id='data_body' style="text-align: center;font-weight: bold;font-size: 20px; text-transform: uppercase">DANH SÁCH TÀI KHOẢN<br>
    </p>

    <table id="data_body2" border="1" cellspacing="0" cellpadding="0">
        <thead>


            <tr>
                <th width="5%">TT</th>
                <th>Tên tài khoản </th>
                <th>Tên đăng nhập</th>
            </tr>


        </thead>
        <?php $stt = 1; $i=1?>
        <tbody>

                    @foreach ($taikhoan as $k=> $item)
                        <tr>

                            <td style="text-align: right ; vertical-align: middle">{{ ++$k }}</td>
                            <td style="vertical-align: middle">{{ $item->name }}</td>
                            @if ($inputs['phanloai'] == 'DN')
                            <td style="text-align: center ; vertical-align: middle">{{ $item->email }}</td>
                            @else
                            <td style="text-align: center ; vertical-align: middle">{{ $item->username }}</td>
                            @endif
                            
                        </tr>
                    @endforeach



        </tbody>
    </table>
@stop
