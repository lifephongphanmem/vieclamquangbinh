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
                <td >Mã số DKKD</td>
                <td >Công ty</td>
                <td >Loại hình </td>
                <td >Ngành nghề</td>
                <td >Địa chỉ</td>
            </tr>
        </thead>
        <tbody>
            <?php 

foreach ($model as $key=>$rp ){

?>
            <tr>
                <td>{{ ++$key }}</td>
                <td> {{ $rp->dkkd }}</td>
                <td> {{ $rp->name }}</td>
                <td>
                    @foreach ($ctype as $item)
                        @if ($item->id ==  $rp->loaihinh )
                            {{$item->name}}
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach ($cfield as $item)
                        @if ($item->id ==  $rp->nganhnghe )
                            {{$item->name}} 
                        @endif
                    @endforeach
                </td>
                <td> {{ $rp->adress }}</td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
@stop
