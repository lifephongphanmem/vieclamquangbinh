@extends('main_baocao')

@section('content')
    <p id="data_header" style="text-align: center;font-weight: bold;font-size: 20px; text-transform: uppercase;">
        DANH SÁCH DOANH NGHIỆP 
        @if ($loai == 'kb')
            ĐÃ KHAI BÁO
        @endif
        @if ($loai == 'kkb')
            kHÔNG KHAI BÁO
        @endif
    </p>

    <table id="data_body1" border="1" cellspacing="0" cellpadding="0">
        <thead>
            <tr>
                <td width="5%"> Stt </td>
                <td >Công ty</td>
            </tr>
        </thead>
        <tbody>
            <?php 

foreach ($model as $key=>$rp ){

?>
            <tr>
                <td>{{ ++$key }}</td>
                <td> {{ $rp->name }}</td>

            </tr>
            <?php } ?>
        </tbody>
    </table>
@stop
