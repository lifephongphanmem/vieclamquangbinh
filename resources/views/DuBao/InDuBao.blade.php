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
                báo cáo dự báo nhu cầu tuyển dụng lao động năm {{ $m_dubao->thoigian }}
            </td>
        </tr>

    </table>

    <table cellspacing="0" cellpadding="0" border="1" style="margin: 20px auto; border-collapse: collapse;">
        <thead>
            <tr class="text-center">
                <th rowspan="2" style="width: 5%">STT</th>
                <th rowspan="2">Vị trí việc làm</th>
                <th rowspan="2" style="width: 10%">Số lượng cung</th>
                <th colspan="2">Thông tin cầu</th>
                <th rowspan="2" style="width: 10%">Nhu cầu</th>
                <th rowspan="2" style="width: 10%">Ghi chú</th>
            </tr>
            <tr class="text-center">
                <th style="width: 10%">Số lượng đăng ký</th>
                <th style="width: 10%">Nguồn khác</th>
            </tr>
            <tr class="text-center">
                <td>A</td>
                <td>B</td>
                <td>1</td>
                <td>2</td>
                <td>3</td>
                <td>4</td>
                <td>5</td>
            </tr>
        </thead>
        <?php $i = 1; ?>
        @foreach ($model as $vitri)
            <tr>
                <td style="text-align: center">{{ $i++ }}</td>
                <td>{{ $vitri->tentgktct2 }}</td>
                <td class="text-center">{{ dinhdangso($vitri->soluong_cung) }}</td>
                <td class="text-center">{{ dinhdangso($vitri->soluong_cau) }}</td>
                <td class="text-center">{{ dinhdangso($vitri->soluong_khac) }}</td>
                <td class="text-center">{{ dinhdangso($vitri->chenhlech) }}</td>
                <td class="text-center"></td>
            </tr>
        @endforeach
        <tr>
            <td colspan="2" style="text-align: center">Tổng cộng</td>
            <td class="text-center">{{ dinhdangso($model->sum('soluong_cung')) }}</td>
            <td class="text-center">{{ dinhdangso($model->sum('soluong_cau')) }}</td>
            <td class="text-center">{{ dinhdangso($model->sum('soluong_khac')) }}</td>
            <td class="text-center">{{ dinhdangso($model->sum('chenhlech')) }}</td>
            <td class="text-center"></td>
        </tr>


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
