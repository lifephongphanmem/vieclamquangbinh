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
        td.input{
            color: #313444;
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
        });
    </script>
@stop
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card card-custom">
                <div class="card-header card-header-tabs-line">
                    <div class="card-title">
                        <h3 class="card-label text-uppercase">Đăng tin tuyển dụng</h3>
                    </div>
                    <div class="card-toolbar">
                    </div>

                </div>
                <div class="card-body">
                    <form role="form" method="POST" action="{{ URL::to('tuyendung-fs') }}"
                        enctype='multipart/form-data'>
                        {{ csrf_field() }}


                        <div class="row">
                            <div class="col-sm-10 col-sm-offset-1 ">
                                <fieldset class="scheduler-border">
                                    <legend class="scheduler-border text-info">Thông tin chung</legend>
                                    <div class="row">
                                        <div class="col-sm-5 col-sm-offset-0 ">

                                            <div class="form-group required">
                                                <label>Nội dung tuyển dụng (*) </label>
                                                <textarea name="noidung" rows=5 required class="form-control"></textarea>
                                            </div>

                                            <div class="form-group required">
                                                <label>Thời hạn tuyển dụng (*)</label>
                                                <input type='date' name="thoihan" class="form-control" required>
                                            </div>

                                        </div>
                                        <div class="col-sm-5 ">

                                            <div class="form-group required">
                                                <label> Họ và tên người liên hệ (*)</label>
                                                <input type="text" size=40 name="contact"class="form-control" required>

                                            </div>

                                            <div class="form-group required">
                                                <label> Điện thoại (*)</label>
                                                <input type="text" size=40 name="phonetd" class="form-control" required>
                                            </div>
                                            <div class="form-group required">
                                                <label>Email (*)</label>
                                                <input type="email" size=40 name="emailtd" class="form-control"required>
                                            </div>

                                            <div class="form-group">
                                                <label> Yêu cầu TTDVVL</label>
                                                <select class="form-control " name="yeucau">
                                                    <option value='Tư vấn' selected>Tư vấn</option>
                                                    <option value='Giới thiệu việc làm'>Giới thiệu việc làm</option>
                                                    <option value='Cung ứng lao động'>Cung ứng lao động</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-2 text-right">
                                            <div class="form-group">
                                                <label>Người đăng</label>
                                                <input type="text" name="username" class="form-control" readonly
                                                    value="{{ session('admin')->name }}">
                                            </div>
                                            <div class="form-group">
                                                <label>Ngày đăng</label>
                                                <input type="text" name="date_create" class="form-control" readonly
                                                    value="{{ date('d/m/Y') }}">
                                            </div>
                                            <div class="form-group">
                                                <label>Số lượng vị trí</label>
                                                <input type="text" name="quantity" id="quantity" class="form-control"
                                                    readonly value="1">
                                            </div>
                                        </div>

                                </fieldset>


                            </div>
                        </div>

                        <div class="vitri" id='dynamicTable'>
                            <div class="row" id="1stld">
                                    <legend>
                                        <button type="button" class="btn btn-success">Vị trí tuyển dụng</button>
                                    </legend>
                                    <div class="col-sm-6 ">
                                        <table class="table table-bordered " >
                                            <tr>
                                                <td style="color: #313444;" width="30%" >Tên công việc (*)</td>
                                                <td>
                                                    <input class="form-control" type="text" name="name[]"  required>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="color: #313444;">Số lượng tuyển (*)</td>
                                                <td><input class="form-control" type="text" name="soluong[]" required></td>
                                            </tr>
                                            <tr>
                                                <td style="color: #313444;">Mô tả công việc (*)</td>
                                                <td>
                                                    <textarea class="form-control" rows=6 cols=30 name="description[]" required></textarea>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td style="color: #313444;">Trình độ văn hóa</td>
                                                <td>
                                                    <select class="form-control " name="tdgd[]">
                                                        <?php foreach ( $list_tdgd as $td){ ?>
                                                        <option value='{{ $td->name }}'>{{ $td->name }}</option>
                                                        <?php } ?>

                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="color: #313444;">Trình độ CMKT</td>
                                                <td>
                                                    <select class="form-control " name="tdcmkt[]">
                                                        <?php foreach ( $list_cmkt as $td){ ?>
                                                        <option value='{{ $td->name }}'>{{ $td->name }}</option>
                                                        <?php } ?>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="color: #313444;">Chuyên ngành đào tạo</td>
                                                <td>
                                                    <select class="form-control " name="chuyennganh[]">

                                                        <?php foreach ( $list_linhvuc as $td){ ?>
                                                        <option value='{{ $td->name }}'>{{ $td->name }}</option>
                                                        <?php } ?>
                                                    </select>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td style="color: #313444;">Trình độ ngoại ngữ</td>
                                                <td>
                                                   <span style="color: #313444;">Ngoại ngữ 1 </span>
                                                    <input type="text" name="ngoaingu1[]" value="" style="width: 30%;height: 2.5rem;
                                                     margin-right: 2%;border:1px solid #E4E6EF;" >
                                                    <span style="color: #313444;"> Chứng chỉ</span>
                                                    <input type="text" size=2 name="chungchinn1[]" value=" "  style="width: 30%;height: 2.5rem;border:1px solid #E4E6EF" ><br>
                                                    <select class="form-control " name="xeploainn1[]" style="margin-top: 0.3rem">
                                                        <option value='Trung bình'>Trung bình</option>
                                                        <option value='Khá' selected>Khá</option>
                                                        <option value='Tốt'>Tốt</option>
                                                    </select>
                                                    <br>
                                                    <span style="color: #313444;">ngại ngữ 2 </span>
                                                    <input type="text"  value=" " name="ngoaingu2[]" style="width: 30%;height: 2.5rem;margin-right: 2%;border:1px solid #E4E6EF">
                                                    <span style="color: #313444;"> Chứng chỉ</span> 
                                                    <input type="text" size=2 name="chungchinn2[]"value=" " style="width: 30%;height: 2.5rem;border:1px solid #E4E6EF">
                                                    <select class="form-control " name="xeploainn1[]" style="margin-top: 0.3rem">
                                                        <option value='Trung bình'>Trung bình</option>
                                                        <option value='Khá' selected>Khá</option>
                                                        <option value='Tốt'>Tốt</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="color: #313444;">Trình độ tin học</td>
                                                <td style="color: #313444;">Tin học văn phòng
                                                    <select class="form-control " name="loaithvp[]" style="margin-bottom: 1.5rem">
                                                        <option value='Trung bình'>Trung bình</option>
                                                        <option value='Khá' selected>Khá</option>
                                                        <option value='Tốt'>Tốt</option>
                                                    </select>
                                                    Khác <input type="text"  value=" " name="tinhockhac[]" style="width: 90%;height: 2.5rem;border:1px solid #E4E6EF;" >
                                                    <select class="form-control " name="loaithk[]" style="margin-top: 0.3rem">
                                                        <option value='Trung bình'>Trung bình</option>
                                                        <option value='Khá' selected>Khá</option>
                                                        <option value='Tốt'>Tốt</option>
                                                    </select>

                                                </td>
                                            </tr>


                                        </table>

                                    </div>


                                    <div class="col-sm-6">
                                        <table class="table table-bordered ">
                                            <tr>
                                                <td style="color: #313444;">Kỹ năng mềm</td>
                                                <td>

                                                    <select class="form-control select2basic"  multiple  name="kynangmem[]" >
                                                        <option value='Giao tiếp' >Giao tiếp</option>
                                                        <option value='Thuyết trình'>Thuyết trình</option>
                                                        <option value='Quản lý thời gian'>Quản lý thời gian</option>
                                                        <option value='Quản lý nhân sự'>Quản lý nhân sự</option>
                                                        <option value='Tổng hợp báo cáo'>Tổng hợp báo cáo</option>
                                                        <option value='Thích ứng'>Thích ứng</option>
                                                        <option value='Làm việc nhóm'>Làm việc nhóm</option>
                                                        <option value='Làm việc độc lập'>Làm việc độc lập</option>
                                                        <option value='Chịu áp lực'>Chịu áp lực </option>
                                                        <option value='Theo dõi giám sát'>Theo dõi giám sát</option>
                                                        <option value='Tư duy phản biện'>Tư duy phản biện</option>
                                                        <option value='Khác'>Khác</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="color: #313444;">Yêu cầu kinh nghiệm</td>
                                                <td>
                                                    <select class="form-control " name="yeucaukn[]">
                                                        <option value='Không yêu cầu' selected>Không yêu cầu</option>
                                                        <option value='Dưới 1 năm'>Dưới 1 năm</option>
                                                        <option value='1 đến 2 năm'>1 đến 2 năm</option>
                                                        <option value='2 đên 5 năm'>2 đên 5 năm</option>
                                                        <option value='Trên 5 năm'>Trên 5 năm</option>

                                                    </select>

                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="color: #313444;">Nơi làm việc dự kiến (*)</td>
                                                <td>

                                                    <input class="form-control "  type="text" size=40 name="diadiem[]" required>
                                                </td>
                                            </tr>


                                            <tr>
                                                <td style="color: #313444;">Hình thức làm việc</td>
                                                <td>
                                                    <select class="form-control " name="hinhthuclv[]">
                                                        <option value='Toàn thời gian' selected>Toàn thời gian</option>
                                                        <option value='Bán thời gian'>Bán thời gian</option>

                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="color: #313444;">Mục đích làm việc</td>
                                                <td>
                                                    <select class="form-control " name="mucdichlv[]">
                                                        <option value='Làm lâu dài' selected>Làm lâu dài</option>
                                                        <option value='Làm tạm thời'>Làm tạm thời</option>
                                                        <option value='Làm thêm'>Làm thêm</option>

                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="color: #313444;">Mức lương (*)</td>
                                                <td>
                                                    <select class="form-control" name="mucluong[]">
                                                        <option value='Dưới 5 triệu' selected> Dưới 5 triệu </option>
                                                        <option value='5 - 10 triệu'>5 - 10 triệu </option>
                                                        <option value='10 - 20 triệu'>10 - 20 triệu </option>
                                                        <option value='20 - 50 triệu'>20 - 50 triệu </option>
                                                        <option value='trên 50 triệu'> trên 50 triệu </option>
                                                        <option value='Thỏa thuận'>Thỏa thuận</option>
                                                        <option value='Hoa hồng'>Hoa hồng</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="color: #313444;">Hỗ trợ ăn uống </td>
                                                <td>
                                                    <select class="form-control " name="hotroan[]">
                                                        <option value='Không' selected> Không</option>
                                                        <option value='1 Bữa'>1 Bữa</option>
                                                        <option value='2 Bữa'>2 Bữa</option>
                                                        <option value='3 Bữa'>3 Bữa</option>
                                                        <option value='Bằng tiền'>Bằng tiền</option>

                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="color: #313444;">Phúc lợi khác</td>
                                                <td>
                                                    <input type="hidden" name="phucloi[]" class="phucloival"
                                                        value="">
                                                    <input type="checkbox" class="phucloi" value="Đóng BHXH, BHYT, BHTN">
                                                    Đóng BHXH, BHYT, BHTN
                                                    <input type="checkbox" class="phucloi" value="Đóng BHNT"> Đóng BHNT
                                                    <input type="checkbox" class="phucloi" value="Trợ cấp thôi việc"> Trợ
                                                    cấp thôi việc
                                                    <input type="checkbox" class="phucloi" value="Nhà trẻ"> Nhà trẻ
                                                    <input type="checkbox" class="phucloi" value="Xe đưa đón"> Xe đưa đón
                                                    <input type="checkbox" class="phucloi" value="Hỗ trợ đi lại"> Hỗ trợ
                                                    đi lại
                                                    <input type="checkbox" class="phucloi" value="Hỗ trợ nhà ở"> Hỗ trợ
                                                    nhà ở
                                                    <input type="checkbox" class="phucloi" value="Ký túc xá"> Ký túc xá
                                                    <input type="checkbox" class="phucloi" value="Đào tạo"> Đào tạo
                                                    <input type="checkbox" class="phucloi"
                                                        value="Lối đi người khuyết tật"> Lối đi người khuyết tật
                                                    <input type="checkbox" class="phucloi" value="Cơ hội thăng tiến"> Cơ
                                                    hội thăng tiến
                                                    <br>
                                                    <input type="checkbox" id="checkphucloikhac"> Khác <input
                                                    class="form-control "   type="text" id="phucloikhac" value="" size=30>


                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                            </div>
                        </div>

                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1 ">

                        <button type="button" name="add" id="add" class="btn btn-success"> Thêm vị
                            trí</button>
                        <button type="button" class="btn btn-danger" id='remove'>Giảm vị trí</button>
                        <button type='submit' class="btn btn-warning btn-lg pull-right"> Đăng tuyển dụng </button>

                    </div>
                </div>
                </form>
                <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>


                <script type="text/javascript">
                    var i = 0;

                    $("#add").click(function() {
                        document.getElementById("quantity").value = parseInt(document.getElementById("quantity").value, 10) + 1;
                        ++i;
                        firstld = document.getElementById("1stld").innerHTML + '';
                        nextld = "<div class='row' id ='row" + i + "' >" + firstld + "</div>"
                        $("#dynamicTable").append(nextld);
                    });
                    $("#remove").click(function() {
                        document.getElementById("quantity").value = parseInt(document.getElementById("quantity").value, 10) - 1;

                        delrowid = "row" + i;
                        document.getElementById(delrowid).remove();
                        --i;
                    });

                    $(document).on('click', 'form input[type=submit]', function(e) {
                        var quantity = $("#quantity").val();
                        for (i = 0; i < quantity; i++) {

                            if (i == 0) {
                                rowid = "#1stld";
                            } else {

                                rowid = "#row" + i;
                            }
                            // combine data - phuc loi-
                            var varsphucloi = $('.phucloi:checked').map(function() {
                                if ($(this).parents(rowid).length == 1) {
                                    return $(this).val();
                                }
                            }).get().join("; ");

                            if ($(rowid).find("#checkphucloikhac").first().prop('checked') == true) {

                                varsphucloi = varsphucloi.concat("; ", $(rowid).find("#phucloikhac").first().val());

                            };

                            $(rowid).find(".phucloival").first().val(varsphucloi);

                            // combine data - uu tien-
                            var varsuutien = $('.uutien:checked').map(function() {
                                if ($(this).parents(rowid).length == 1) {
                                    return $(this).val();
                                }
                            }).get().join("; ");

                            if ($(rowid).find("#checkuutienkhac").first().prop('checked') == true) {

                                varsuutien = varsuutien.concat("; ", $(rowid).find("#uutienkhac").first().val());

                            };
                            $(rowid).find(".uutienval").first().val(varsuutien);

                            // combine data - kynangmem- 
                            var varskn = $(rowid).find('select.kynang option:selected').map(function() {

                                return $(this).val();

                            }).get().join("; ");

                            $(rowid).find(".kynangmem").first().val(varskn);


                        }
                    });
                </script>
            @endsection
