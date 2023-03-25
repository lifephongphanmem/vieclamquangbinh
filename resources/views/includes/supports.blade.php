<div class="row">
    <div class="col-sm-12">
        <div class="portlet light ">
            <div class="portlet-title">
                <div class="caption caption-md">
                    <i class="icon-bar-chart theme-font-color hide"></i>
                    <span class="caption-subject theme-font-color bold uppercase">Thông tin hỗ trợ</span>
                </div>
                <div class="actions">

                </div>
            </div>
            <div class="portlet-body">

                <p>Công ty LifeSoft chân thành cảm ơn quý khách hàng đã tin tưởng sử dụng phần mềm của công ty.
                    Thay mặt toàn bộ cán bộ nhân viên trong công ty gửi đến khách hàng lời chúc sức khỏe- thành công</p>
                <p>Nhằm chăm sóc, hỗ trợ khách hàng nhanh chóng và tiện dụng nhất công ty xin cung cấp thông tin các cán
                    bộ hỗ trợ khách hàng trong quá trình sử dụng.
                    Mọi vấn đề khúc mắc khách hàng có thể gọi điện thoại trực tiếp cho cán bộ để được hỗ trợ nhanh nhất
                    có thể!</p>
                <p>Số điện thoại công ty: <b>0243.6343.951</b></p>
                <p>Phụ trách khối kỹ thuật:<b> Phó giám đốc: Trần Ngọc Hiếu </b>- tel: <b>0968.206.844</b></p>

            </div>
        </div>
    </div>
</div>

<div class="row">
    @foreach ($a_vp as $vp)
        <?php $vanphong = $model_vp->where('vanphong', $vp); ?>
        <div class="col-md-{{ $col }}">
            <!-- BEGIN PORTLET -->
            <div class="portlet light" minlength="350px">
                <div class="portlet-title">
                    <div class="caption caption-md">
                        <i class="icon-bar-chart theme-font hide"></i>
                        <span class="caption-subject font-blue-madison bold uppercase">{{ $vp }}</span>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="table-scrollable table-scrollable-borderless">
                        <table class="table table-hover table-light">
                            <thead>
                                <tr class="uppercase">
                                    <th class="text-center" colspan="2">
                                        Cán bộ hỗ trợ
                                    </th>
                                    <th class="text-center">
                                        Số điện thoại
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($vanphong as $ct)
                                    <tr>
                                        <td class="fit">
                                            <img class="user-pic" src="{{ url('images/avatar/default-user.png') }}">
                                        </td>
                                        <td>{{ $ct->hoten }}</td>
                                        <td style="text-align: center">{{ $ct->sdt }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- END PORTLET -->
        </div>
    @endforeach

</div>
