<head>
    {{-- <title>Ứng viên {{ $ungvien->hoten }}</title> --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="noindex, nofollow">
    <meta charset="UTF-8">
 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700,900&amp;display=swap" rel="stylesheet">
    <link href="{{ url('assets2/css/vensdor/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ url('assets2/css/vensdor/plugin.css') }}" rel="stylesheet">
    <link href="{{ url('assets2/css/vensdor/jquery.fancybox.min.css') }}" rel="stylesheet">
    <script src="{{ url('assets/global/plugins/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ url('assets/global/plugins/jquery-migrate.min.js') }}" type="text/javascript"></script>
    <link href="{{ url('assets2/css/vensdor/slick.css') }}" rel="stylesheet">
    <link href="{{ url('assets2/css/root.css') }}" rel="stylesheet">
    <link href="{{ url('assets2/css/styles.css') }}" rel="stylesheet">
    <link href="{{ url('assets2/css/reponse.css') }}" rel="stylesheet">
    <link href="{{ url('assets2/css/fix.css') }}" rel="stylesheet">
    <link href="{{ url('assets2/css/fix_t.css') }}" rel="stylesheet">

    <style>
        body.alert {
            position: fixed;
            width: calc(100% - 100px);
            padding: 20px;
            margin: 50px;
            font-size: 14px;
            z-index: 9999;
        }
    </style>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=G-HTPQJ1MCPG"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-HTPQJ1MCPG');
    </script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script>
        $(document).on('click', 'body>.alert button', function() {
            $(this).closest('.alert').remove();
        });
    </script>
</head>

<body class="home  style-inpage fixed">
    <h2 style="text-align: center;background-color: #007cbd;color: white;font-size: 20px;height: 35px;">
        <i class="fa fa-fw fa-bank" aria-hidden="true" style="margin-top: 7px;"></i> Kinh nghiệm làm việc
    </h2>
    <div class="form-body" style="margin: 1%;">
        <div id="hocvan_danhsach">
            @if (isset($ungvienhocvan))
                <table class="table  table-bordered table-hover dataTable no-footer">
                    @foreach ($ungvienhocvan as $item)
                        <tr>
                            <td width="80%">
                                <span style="color: ">
                                    {{ $item->truong }} &emsp;&emsp;&emsp;
                                </span>
                                <span >
                                   {{ getDayVn($item->tungay) }} {{isset($item->denngay) ? ' - '.getDayVn($item->denngay) :"" }}
                                </span>

                                <span class="pull-right">
                                    <a class="btn btn-primary edit-inp"><i class="glyphicon glyphicon-pencil"></i> Cật
                                        nhật</a>
                                    <a onclick="deletehocvan('{{ $item->id }}')"
                                        class="btn btn-danger deletedata"><i class="glyphicon glyphicon-remove"></i>
                                        Xóa</a>
                                </span>

                            </td>
                        </tr>
                    @endforeach
                </table>
            @endif

        </div>
        <div class="row">
            <button onclick="createhocvan()" class="btn btn-sm btn-success btn-lg pull-left" style="margin-left: 1%">
                Thêm mới
            </button>

        </div>
    </div>


    <div class="form-body" id="hocvan_themmoi" style="display: none">
        <div class="row col-md-12">
            <div class="col-md-3">
                <div class="form-group">
                    <label class="control-label">Chuyên ngành<span class="require">*</span></label>
                    <input type="text" name="chuyennganh" id="chuyennganh" class="form-control"
                        placeholder="VD: Kinh doanh quốc tế" required>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label class="control-label">Trường <span class="require">*</span></label>
                    <input type="text" name="truong" id="truong" class="form-control"
                        placeholder="VD: Đại học Ngoại Thương" required>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label class="control-label">Bằng cấp <span class="require">*</span></label>
                    <select name="bangcap" id="bangcap" class="form-control" required>
                        <option value="">Chọn bằng cấp</option>
                        @foreach ($dmtrinhdokythuat as $item)
                            <option value="{{ $item->madmtdkt }}">{{ $item->tentdkt }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="row col-md-3">
            <div class="col-md-12">
                <div class="form-group">
                    <label class="control-label">Từ ngày </label>
                    <input type="date" name="tungay" id="tungay" class="form-control" value="" required>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label class="control-label">Đến ngày </label>
                    <input type="date" name="denngay" id="denngay" class="form-control" value="" required>
                </div>
            </div>
        </div>
        <div class="row col-md-9">
            <div class="col-md-12">
                <div class="form-group">
                    <label class="control-label">Thành tựu</label>
                    <textarea type="text" name="thanhtuu" id="thanhtuu" class="form-control" rows="6"></textarea>
                </div>
            </div>
        </div>
        <input type="text" id="user" name="user" value="{{ $user }}" hidden>
        <div class="row col-md-9" style="margin-left: 0%">
            <button onclick="huyhocvan()" class="btn btn-sm btn-secondary btn-lg pull-left">
                Hủy</button>
            <button onclick="storehocvan()" class="btn btn-sm btn-info btn-lg pull-left">
                Lưu</button>
        </div>

    </div>

    <script>
       var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        function createhocvan() {
          
            if ($('#user').val() == '') {
                toastr.warning("Vui lòng lưu lại thông tin trước khi cập nhật thông tin này.");
            } else {
                $('#chuyennganh').val('');
                $('#truong').val('');
                $('#bangcap').val('');
                $('#tungay').val('');
                $('#denngay').val('');
                $('#thanhtuu').val('');
                $("#hocvan_themmoi").css("display", "block");
            }
        }

        function huyhocvan() {
            $("#hocvan_themmoi").css("display", "none");
        }

        function storehocvan() {
            console.log(1);
            $.ajax({
                url: '/ungvien/storehocvan',
                type: 'POST',
                data: {
                    _token: CSRF_TOKEN,
                    user: $('#user').val(),
                    chuyennganh: $('#chuyennganh').val(),
                    truong: $('#truong').val(),
                    bangcap: $('#bangcap').val(),
                    tungay: $('#tungay').val(),
                    denngay: $('#denngay').val(),
                    thanhtuu: $('#thanhtuu').val(),
                },
                dataType: 'JSON',
                success: function(data) {
                    console.log(data);
                    $('#hocvan_danhsach').html(data.content);
                    $('#hocvan_themmoi').css("display", "none");
                    toastr.success('Đã lưu thông tin', "Hoàn thành!");
                }
            })
        }

        function deletehocvan(id, user) {

            $.ajax({
                url: '/ungvien/deletehocvan',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    id: id,
                    user: $('#user').val(),
                },
                dataType: 'JSON',
                success: function(data) {
                    // $('#form_hocvan1').hide();
                    $('#hocvan_danhsach').html(data.content);
                    // $('#hocvan_themmoi').css("display", "none");
                    toastr.success('Đã xóa thông tin', "Hoàn thành!");
                }
            })
        }
    </script>

</body>
