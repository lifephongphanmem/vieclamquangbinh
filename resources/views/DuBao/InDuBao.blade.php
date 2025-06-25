@extends('main_baocao')


@section('content')

    <table class="header" width="96%" border="0" cellspacing="0" cellpadding="8"
        style="margin:0 auto 25px; text-align: center;">
        <tr>

            <td style="text-align: left;width: 50%">
                <b>Đơn vị báo cáo: {{ $m_donvi['tendv'] }}</b>
            </td>
            <td style="text-align: left; font-weight: bold">

            </td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center; font-weight: bold; font-size: 20px;text-transform: uppercase">
                {{-- dự báo nhu cầu tuyển dụng lao động năm {{ date('Y', strtotime($m_dubao->thoigian ?? date('Y-m-d')))}} --}}
                dự báo thị trường lao động năm {{ date('Y', strtotime($m_dubao->thoigian ?? date('Y-m-d')))}}
            </td>
        </tr>

    </table>

    <table cellspacing="0" cellpadding="0" border="1" style="margin: 20px auto; border-collapse: collapse;">
        <thead>
            <tr class="text-center">
                <th style="width: 5%">STT</th>
                <th >Vị trí việc làm</th>
                <th style="width: 10%">Phân loại</th>
                <th >Số lượng</th>
                {{-- <th style="width: 10%">Nhu cầu</th> --}}
                <th style="width: 10%">Ghi chú</th>
            </tr>
            <tr class="text-center">
                <td>A</td>
                <td>B</td>
                <td>1</td>
                <td>2</td>
                <td>3</td>

            </tr>
        </thead>
        <?php $i = 1; ?>
        <tr style="font-weight: bold; text-align: left;">
            <td>I</td>
            <td colspan="4" style="font-weight: bold; text-align: left;">CUNG LAO ĐỘNG</td>
        </tr>
        @foreach ($model_chitiet->where('phanloai','CUNG') as $vitri)
            <tr>
                <td style="text-align: center">{{ $i++ }}</td>
                <td>{{ $vitri->tentgktct2 }}</td>
                <td class="text-center">{{ $a_phanloai[$vitri->phanloai]??'' }}</td>
                <td class="text-center">{{ dinhdangso($vitri->soluong) }}</td>
                <td class="text-center"></td>
            </tr>
        @endforeach
                <tr style="font-weight: bold; text-align: left;">
            <td>II</td>
            <td colspan="4" style="font-weight: bold; text-align: left;">CẦU LAO ĐỘNG</td>
        </tr>
        @foreach ($model_chitiet->where('phanloai','CAU') as $vitri)
            <tr>
                <td style="text-align: center">{{ $i++ }}</td>
                <td>{{ $vitri->tentgktct2 }}</td>
                <td class="text-center">{{ $a_phanloai[$vitri->phanloai]??'' }}</td>
                <td class="text-center">{{ dinhdangso($vitri->soluong) }}</td>
                <td class="text-center"></td>
            </tr>
        @endforeach
        {{-- <tr>
            <td colspan="2" style="text-align: center">Tổng cộng</td>
            <td class="text-center"></td>
            <td class="text-center">{{ dinhdangso($model_chitiet->sum('soluong')) }}</td>
            <td class="text-center"></td>
        </tr> --}}


    </table>

    <table width="96%" border="0" cellspacing="0" style="text-align: center">
        <tr>
            <td style="width: 50%"></td>
            <td style="width: 50%">…………, Ngày…...tháng …… năm ……</td>
        </tr>
        <tr class="font-weight-bold">
            <td>Người lập biểu</td>
            <td>Giám đốc trung tâm</td>
        </tr>
        <tr class="font-italic">
            <td>(Ký, họ tên)</td>
            <td>(Ký, họ tên, đóng dấu)</td>
        </tr>
        <tr>
            <td style="height: 100px">

            </td>
        <tr>
            <td>{{ $m_donvi->ketoan }}</td>
            <td>{{ $m_donvi->lanhdao }}</td>
        </tr>
    </table>
@stop
