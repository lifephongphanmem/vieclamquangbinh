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
                        <a href="{{url('/Mẫu số 01 - TT11_2022.docx')}}" class="btn btn-success"><i class="fa fa-download"></i> Mẫu giấy đăng ký tuyển dụng</a>
                    </div>

                </div>
                <div class="card-body">
                    <form role="form" method="POST" action="{{ URL::to('tuyendung-fs') }}"
                        enctype='multipart/form-data' id="form_td">
                        {{ csrf_field() }}


                        <div class="row">
                            <div class="col-sm-12 col-sm-offset-1 ">
                                <fieldset class="scheduler-border">
                                    <legend class="scheduler-border text-info">Thông tin chung</legend>
                                    <div class="row">
                                        <div class="col-sm-5 col-sm-offset-0 ">

                                            <div class="form-group required">
                                                <label>Nội dung tuyển dụng (*) </label>
                                                <textarea name="noidung" rows=10 required class="form-control"></textarea>
                                            </div>

                                            <div class="form-group required">
                                                <label>Thời hạn tuyển dụng (*)</label>
                                                <input type='date' name="thoihan" class="form-control" required>
                                            </div>

                                        </div>
                                        <div class="col-sm-5 row">
                                                <div class="form-group required col-sm-6">
                                                    <label> Họ và tên người liên hệ (*)</label>
                                                    <input type="text" size=40 name="contact"class="form-control" required>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label>Người đăng</label>
                                                    <input type="text" name="username" class="form-control" readonly
                                                        value="{{ session('admin')->name }}">
                                                </div>
                                                <div class="form-group required col-sm-6">
                                                    <label> Điện thoại (*)</label>
                                                    <input type="text" size=40 name="phonetd" class="form-control" required>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label>Ngày đăng</label>
                                                    <input type="text" name="date_create" class="form-control" readonly
                                                        value="{{ date('d/m/Y') }}">
                                                </div>
                                                <div class="form-group required col-sm-6">
                                                    <label>Email (*)</label>
                                                    <input type="email" size=40 name="emailtd" class="form-control"required>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label>Số lượng vị trí</label>
                                                    <input type="text" name="quantity" id="quantity" class="form-control"
                                                        readonly value="1">
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label> Yêu cầu TTDVVL</label>
                                                    <select class="form-control " name="yeucau">
                                                        <option value='Tư vấn' selected>Tư vấn</option>
                                                        <option value='Giới thiệu việc làm'>Giới thiệu việc làm</option>
                                                        <option value='Cung ứng lao động'>Cung ứng lao động</option>
                                                    </select>
                                                </div>                                           
                                        </div>
                                        <div class="col-sm-2 ">

                                            <div class="row">
                                                <label class="col-xl-12"></label>
                                                <div class="col-lg-9 col-xl-12">
                                                    <h5 class="font-weight-bold mb-6">Ảnh giấy đăng ký tuyển dụng</h5>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                {{-- <label class="col-xl-3 col-lg-3 col-form-label">Avatar</label> --}}
                                                <div class="col-lg-9 col-xl-12">
                                                    <div class="image-input image-input-outline" id="kt_profile_avatar" style="background-image: url({{url('assets/media/users/no-image.jpg')}})">
                                                        <div class="image-input-wrapper" style="width:270px; height:255px;"></div>
                                                        <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change image">
                                                            <i class="fa fa-pen icon-sm text-muted"></i>
                                                            <input type="file" name="anhtuyendung" accept=".png, .jpg, .jpeg" />
                                                            <input type="hidden" name="profile_avatar_remove" />
                                                        </label>
                                                        <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel image">
                                                            <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                        </span>
                                                        <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="Remove image">
                                                            <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                        </span>
                                                    </div>
                                                    <span class="form-text text-muted text-center">Loại tệp: png, jpg, jpeg.</span>
                                                </div>
                                            </div>
                                        </div>

                                </fieldset>


                            </div>
                        </div>

                        <div class="vitri" id='dynamicTable'>
                            <div class="row" id="1stld">
                                    <legend class="col-sm-12 ">
                                        <button type="button" class="btn btn-success">Vị trí tuyển dụng</button>
                                    </legend>
                                    <div class="col-sm-6 ">
                                        <table class="table border" >
                                            <tr>
                                                <td style="color: #313444;" width="30%" >Tên công việc (*)</td>
                                                <td>
                                                    <input class="form-control" type="text" name="name[]"  required>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="color: #313444;">Số lượng tuyển (*)</td>
                                                <td><input class="form-control" type="number" name="soluong[]" required></td>
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
                                                <td >
                                                     <div class="row" >
                                                        <div class="col-sm-5" style=" margin-right: 5%;">
                                                        <span >ngại ngữ 1 </span>
                                                        <input type="text"  class="form-control"name="ngoaingu1[]" style="width: 100%;">
                                                        </div>
                                                        <div class="col-sm-5">
                                                        <span > Chứng chỉ</span> 
                                                        <input type="text" name="chungchinn1[]" class="form-control" style="width: 100%;">
                                                        </div>
                                                        </div>
                                                    <select class="form-control " name="xeploainn1[]" style="margin-top: 0.3rem">
                                                        <option value='Trung bình'>Trung bình</option>
                                                        <option value='Khá' selected>Khá</option>
                                                        <option value='Tốt'>Tốt</option>
                                                    </select>
                                                    <br>
                                                        <div class="row" >
                                                        <div class="col-sm-5" style=" margin-right: 5%;">
                                                        <span >ngại ngữ 2 </span>
                                                        <input type="text"  class="form-control"name="ngoaingu2[]" style="width: 100%;">
                                                        </div>
                                                        <div class="col-sm-5">
                                                        <span > Chứng chỉ</span> 
                                                        <input type="text" name="chungchinn2[]" class="form-control" style="width: 100%;">
                                                        </div>
                                                        </div>
                                                        <select class="form-control " name="xeploainn2[]" style="margin-top: 0.3rem" >
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
                                                    <div>
                                                        Khác <input type="text" class="form-control" name="tinhockhac[]" style="width: 100%;" >
                                                        <select class="form-control " name="loaithk[]" style="margin-top: 0.3rem">
                                                            <option value='Trung bình'>Trung bình</option>
                                                            <option value='Khá' selected>Khá</option>
                                                        <option value='Tốt'>Tốt</option>
                                                        </select>
                                                    </div>
                                                </td>
                                            </tr>


                                        </table>

                                    </div>


                                    <div class="col-sm-6">
                                        <table class="table border ">
                                            <tr>
                                                <td style="color: #313444;">Kỹ năng mềm</td>
                                                <td>
                                                    {{-- <select class="form-control select2basic" style="width: 100%;"  multiple  name="kynangmem[]" >
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
                                                    </select> --}}

                                                    <input type="hidden" name="kynangmem[]" class="kynangmemval" value="">
                                                    <input type="checkbox" class="kynangmem" value="Giao tiếp" >Giao tiếp
                                                    <input type="checkbox" class="kynangmem" value="Thuyết trình" >Thuyết trình
                                                    <input type="checkbox" class="kynangmem" value="Quản lý thời gian" >Quản lý thời gian
                                                    <input type="checkbox" class="kynangmem" value="Quản lý nhân sự" >Quản lý nhân sự
                                                    <input type="checkbox" class="kynangmem" value="Tổng hợp báo cáo" >Tổng hợp báo cáo
                                                    <input type="checkbox" class="kynangmem" value="Thích ứng" >Thích ứng <br>
                                                    <input type="checkbox" class="kynangmem" value="Làm việc nhóm" >Làm việc nhóm
                                                    <input type="checkbox" class="kynangmem" value="Làm việc độc lập" >Làm việc độc lập
                                                    <input type="checkbox" class="kynangmem" value="Chịu áp lực" >Chịu áp lực
                                                    <input type="checkbox" class="kynangmem" value="Theo dõi giám sát" >Theo dõi giám sát
                                                    <input type="checkbox" class="kynangmem" value="Tư duy phản biện" >Tư duy phản biện
                                                     <br>
                                                    <input type="checkbox" id="checkkynangmemkhac"> Khác <input
                                                    class="form-control "  type="text" id="kynangmemkhac" value="" size=30 >
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
                                                    <input type="hidden" name="phucloi[]" class="phucloival" value="">
                                                    <input type="checkbox" class="phucloi" value="Đóng BHXH, BHYT, BHTN"  >
                                                    Đóng BHXH, BHYT, BHTN
                                                    <input type="checkbox" class="phucloi" value="Đóng BHNT"  > Đóng BHNT
                                                    <input type="checkbox" class="phucloi" value="Trợ cấp thôi việc"  > Trợ
                                                    cấp thôi việc
                                                    <input type="checkbox" class="phucloi" value="Nhà trẻ"  > Nhà trẻ
                                                    <input type="checkbox" class="phucloi" value="Xe đưa đón"  > Xe đưa đón
                                                    <input type="checkbox" class="phucloi" value="Hỗ trợ đi lại"  > Hỗ trợ
                                                    đi lại &emsp; 
                                                    <input type="checkbox" class="phucloi" value="Hỗ trợ nhà ở"  > Hỗ trợ
                                                    nhà ở
                                                    <input type="checkbox" class="phucloi" value="Ký túc xá"  > Ký túc xá
                                                    <input type="checkbox" class="phucloi" value="Đào tạo"  > Đào tạo
                                                    <input type="checkbox" class="phucloi"
                                                        value="Lối đi người khuyết tật"  > Lối đi người khuyết tật
                                                    <input type="checkbox" class="phucloi" value="Cơ hội thăng tiến"  > Cơ
                                                    hội thăng tiến
                                                    <br>
                                                    <input type="checkbox" id="checkphucloikhac"> Khác <input
                                                    class="form-control "   type="text" id="phucloikhac" value="" size=30 >


                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                            </div>
                        </div>

                </div>
                <hr>
             <legend class="col-sm-12 ">
                <div class=" col-sm-12" >
                    <button type="button" name="add" id="add" class="btn btn-success"> Thêm vị trí</button>
                    <button type="button" class="btn btn-danger" id='remove'>Giảm vị trí</button>
                </div>
                    <div class=" col-sm-12" style="text-align: center;margin-bottom: 1%">
                    {{-- <button   class="btn btn-warning btn-lg pull-right" >Đăng tuyển dụng</button> --}}
                     <input onclick="submit_td()" type="submit"  class="btn btn-warning btn-lg pull-right" value="Đăng tuyển dụng">
                </div>
            </legend>
     
            </form>
        </div>
    </div>        
      </div>     
                <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

                <script src="{{url('assets/js/pages/custom/profile/profile.js')}}"></script>
                <script type="text/javascript">
                    var i = 0;

                    $("#add").click(function() {
                        console.log("#row" + 1);
                        document.getElementById("quantity").value = parseInt(document.getElementById("quantity").value, 10) + 1;
                        ++i;
                        firstld = document.getElementById("1stld").innerHTML + '';
                        nextld = "<div class='row' id ='row" + i + "' >" + firstld + "</div>"
                        $("#dynamicTable").append(nextld);

                        // $("#row" + i).find(".phucloi").checked = false;
                    });
                    $("#remove").click(function() {
                        if($("#quantity").val() >1 ){
                        document.getElementById("quantity").value = parseInt(document.getElementById("quantity").value, 10) - 1;
                        delrowid = "row" + i;
                        document.getElementById(delrowid).remove();
                        --i;
                        }

                    });
                  
                    function submit_td() {

                    // $(document).on('click', 'form input[type=submit]', function(e) {
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

                            // combine data - ky nang mem-
                            var varskynangmem = $('.kynangmem:checked').map(function() {
                                if ($(this).parents(rowid).length == 1) {
                                    return $(this).val();
                                }
                            }).get().join("; ");
                            if ($(rowid).find("#checkkynangmemkhac").first().prop('checked') == true) {
                                varskynangmem = varskynangmem.concat("; ", $(rowid).find("#kynangmemkhac").first().val());
                            };
                            $(rowid).find(".kynangmemval").first().val(varskynangmem);
                            // var phuclois = document.getElementsByName('phucloi');
                            //     var phucloi = '';
                            //     for (let i = 0; i < phuclois.length; i++) {
                            //         if (phuclois[i].checked == true) {
                            //         phucloi += phuclois[i].value + '; ';
                            //         } 
                            //     }

                            // // combine data - uu tien-
                            // var varsuutien = $('.uutien:checked').map(function() {
                            //     if ($(this).parents(rowid).length == 1) {
                            //         return $(this).val();
                            //     }
                            // }).get().join("; ");
                            // if ($(rowid).find("#checkuutienkhac").first().prop('checked') == true) {
                            //     varsuutien = varsuutien.concat("; ", $(rowid).find("#uutienkhac").first().val());
                            // };
                            // $(rowid).find(".uutienval").first().val(varsuutien);

                            // // combine data - kynangmem- 
                            // var varskn = $(rowid).find('select.kynang option:selected').map(function() {
                            //     return $(this).val();
                            // }).get().join("; ");
                            // $(rowid).find(".kynangmem").first().val(varskn);
                        }

                    // });
                    //  $('#form_td').submit();
                    }
                </script>
            @endsection
