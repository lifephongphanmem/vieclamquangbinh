@extends('main_baocao')
@section('content')

    <p style="text-align: center;font-weight: bold;font-size: 20px; text-transform: uppercase;">BÁO CÁO TỔNG HỢP TÌNH HÌNH NGƯỜI THẤT NGHIỆP </p>
    
    <p style="text-align: center;font-style: italic;">{{ $model->first()->kydieutra }}</p>

    <table cellspacing="0" cellpadding="0" border="1" style="margin: 20px auto; border-collapse: collapse;" id="data">
        <tr>
            <th>Stt</th>
            <th>Nội dung</th>
            <th>Tỷ lệ (%)</th>
            <th>Tổng cộng</th>
        </tr>
        <tr>
            <td></td>
            <td colspan="3" style=" text-transform: uppercase;">Danh mục nguyên nhân thất nghiệp</td>
        </tr>
        @foreach($nguyennhan as $key => $nt)
            <tr>
                <td>{{ ++$key }}</td>
                <td>{{ $nt->tendm }}</td>
                <td>{{ round(count($model->where('nguyennhan',$nt->id))*(100/$count),2) }}%</td>
                <td>{{ count($model->where('nguyennhan',$nt->id)) }}</td>
            </tr>
        @endforeach
        <tr>
            <td></td>
            <td colspan="3" style=" text-transform: uppercase;">Danh mục trình độ chuyên môn</td>
        </tr>
        @foreach($trinhdocmky as $key => $trinhdo)
            <tr>
                <td>{{ ++$key }}</td>
                <td>{{ $trinhdo->tentdkt }}</td>
                <td>{{ round(count($model->where('trinhdocmkt',$trinhdo->stt))*(100/$count),2) }}%</td>
                <td>{{ count($model->where('trinhdocmkt',$trinhdo->stt)) }}</td>
            </tr>
        @endforeach
        
        <tr>
            <td></td>
            <td colspan="3" style=" text-transform: uppercase;">Danh mục nghề nghiệp trước khi mất việc làm</td>
        </tr>
        @foreach($dmchucvu as $key => $chucvu)
            <tr>
                <td>{{ ++$key }}</td>
                <td>{{ $chucvu->tencv }}</td>
                <td>{{round( count($model->where('nghenghiep',$chucvu->id))*(100/$count),2) }}%</td>
                <td>{{ count($model->where('nghenghiep',$chucvu->id)) }}</td>
            </tr>
        @endforeach
        <tr>
            <td></td>
            <td colspan="3" style=" text-transform: uppercase;">Danh mục ngành là việc trước khi mất việc làm</td>
        </tr>
        @foreach($nghecongviec as $key => $congviec)
            <tr>
                <td>{{ ++$key }}</td>
                <td>{{ $congviec->tendm }}</td>
                <td>{{ round(count($model->where('nghecongviec',$congviec->id))*(100/$count),2) }}%</td>
                <td>{{ count($model->where('nghecongviec',$congviec->id)) }}</td>
            </tr>
        @endforeach
    </table>

@stop
