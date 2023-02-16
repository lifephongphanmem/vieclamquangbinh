@extends('main_baocao')

@section('content')
    <p id="data_header" style="text-align: center;font-weight: bold;font-size: 20px; text-transform: uppercase;">
        DANH SÁCH
        @if ($loaikhaibao == 'baotang')
            BÁO TĂNG
        @endif
        @if ($loaikhaibao == 'baogiam')
            BÁO GIẢM
        @endif
        @if ($loaikhaibao == 'tamdung')
            TẠM DỪNG
        @endif
        @if ($loaikhaibao == 'ketthuctamdung')
            KẾT THÚC TẠM DỪNG
        @endif
        @if ($loaikhaibao == 'khaibao')
            KHAI BÁO
        @endif
        <br>
        {{ $tencty != '' ? $tencty->name : '' }}
    </p>

    <table id="data_body1" border="1" cellspacing="0" cellpadding="0">
        <thead>
            <tr>
                <td width="5%"> Stt </td>
                <td width="10%"> Đối tượng</td>
                <td width="5%"> Số lượng</td>
                <td width="30%"> Mô tả</td>
                <td width="20%"> Thời gian</td>
            </tr>
        </thead>


        <tbody>
            <?php 

foreach ($model as $key=>$rp ){

?>
            <tr>
                <td>{{ ++$key }}</td>

                <td>
                    <?php if ($rp->datatable == 'company') {
                        echo 'Thông tin doanh nghiệp';
                    } elseif ($rp->datatable == 'nguoilaodong') {
                        echo 'Người lao động';
                    }
                    ?>
                </td>
                <td> {{ $rp->numrow }}</td>
                <td> {{ $rp->note }}</td>
                <td> {{ $rp->time }}</td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
@stop
