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

        label {
            font-size: 12px;
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
        <i class="fa fa-fw fa-bank" aria-hidden="true" style="margin-top: 7px;"></i> Kinh nghiệm việc làm
    </h2>
    <div class="form-body" style="margin: 1%;">
        <div id="kinhnghiem_danhsach">
            @if (isset($ungvienkinhnghiem))
                <table class="table  table-bordered table-hover dataTable no-footer">
                    @foreach ($ungvienkinhnghiem as $item)
                        <tr>
                            <td width="80%">
                                <span style="color: ">
                                    {{ $item->congty }} &emsp;&emsp;&emsp;
                                </span>
                                <span>
                                    {{ getDayVn($item->ngayvao) }}
                                    {{ isset($item->ngaynghi) ? ' - ' . getDayVn($item->ngaynghi) : '' }}
                                </span>

                                <span class="pull-right">
                                    <a onclick="editkinhnghiem('{{ $item->id }}')"
                                        class="btn btn-primary edit-inp"><i class="glyphicon glyphicon-pencil"></i> Cật
                                        nhật</a>

                                    <a href="{{ '/page/ungvien/delete_kinhnghiem?id=' . $item->id }}"
                                        class="btn btn-danger deletedata"><i class="glyphicon glyphicon-remove"></i>
                                        Xóa</a>
                                </span>

                                <div class="panel-collapse collapse in" id="kinhnghiem_chinhsua{{ $item->id }}"
                                    style="display: none">
                                    <form action="{{ '/page/ungvien/update_kinhnghiem' }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf

                                        <div class="panel-body">
                                            <div class="wishlist-table table-responsive wrap-info-education">
                                                <div class="edit-info-education">

                                                    <div class="form-body">
                                                        <div class="row col-md-12">
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label class="control-label">Công ty<span
                                                                            class="require">*</span></label>
                                                                    <input type="text" name="congty" id="congty_edit"
                                                                        class="form-control"
                                                                        placeholder="Ví dụ: Công ty ABC"
                                                                        value="{{ $item->congty }}" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label class="control-label">Quy mô</label>
                                                                    <input type="number" name="quymo" id="quymo_edit"
                                                                        class="form-control" placeholder="Ví dụ: 50"
                                                                        value="{{ $item->quymo }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label class="control-label">Lĩnh vực hoạt động của
                                                                        công ty</span></label>
                                                                    <input type="text" name="linhvuc" id="linhvuc_edit"
                                                                        class="form-control"
                                                                        placeholder="Ví dụ: Lĩnh vực vông nghiệp"
                                                                        value="{{ $item->linhvuc }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label class="control-label">Chức danh<span
                                                                            class="require">*</span></label>
                                                                    <input type="text" name="chucdanh"
                                                                        id="chucdanh_kn_edit" class="form-control"
                                                                        placeholder="Ví dụ: Kinh doanh quốc tế"
                                                                        value="{{ $item->chucdanh }}" required>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="row col-md-12">
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label class="control-label">Ngày vào</label>
                                                                    <input type="date" name="ngayvao_edit"
                                                                        id="ngayvao" class="form-control"
                                                                        value="{{ $item->ngayvao }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label class="control-label">Ngày xin nghỉ</label>
                                                                    <input type="date" name="ngaynghi_edit"
                                                                        id="ngaynghi" class="form-control"
                                                                        value="{{ $item->ngaynghi }}">
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label">Lý do nghỉ</label>
                                                                    <input type="text" name="lydo_edit"
                                                                        id="lydo" class="form-control"
                                                                        value="{{ $item->lydo }}">
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label">Chi tiết công
                                                                        việc</label>
                                                                    <textarea type="text" name="chitiet" id="chitiet_edit" class="form-control" rows="3">{{ $item->chitiet }}</textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label">Mô tả</label>
                                                                    <textarea type="text" name="mota" id="mota_edit" class="form-control" rows="3">{{ $item->mota }}</textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <input type="text" id="user" name="user"
                                                            value="{{ $user }}" hidden>
                                                        <input type="text" id="id" name="id"
                                                            value="{{ $item->id }}" hidden>
                                                        <div class="row col-md-9" style="margin-left: 0%">
                                                            <a onclick="huyedit_hocvan('{{ $item->id }}')"
                                                                class="btn btn-sm btn-secondary btn-lg pull-left"
                                                                style="background-color: rgb(198, 210, 221);color: white">
                                                                Hủy</a>
                                                            <button type="submit"
                                                                class="btn btn-sm btn-info btn-lg pull-left">
                                                                Lưu</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </table>
            @endif

        </div>
        <div class="row">
            <button onclick="createkinhnghiem()" class="btn btn-sm btn-success btn-lg pull-left"
                style="margin-left: 1%">
                Thêm mới
            </button>

        </div>
    </div>


    <div class="form-body" id="kinhnghiem_themmoi" style="display: none">
        <form action="{{ '/page/ungvien/store_kinhnghiem' }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row col-md-12">
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">Công ty<span class="require">*</span></label>
                        <input type="text" name="congty" id="congty" class="form-control"
                            placeholder="Ví dụ: Công ty ABC" required>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">Quy mô</label>
                        <input type="number" name="quymo" id="quymo" class="form-control"
                            placeholder="Ví dụ: 50" >
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">Lĩnh vực hoạt động của công ty</span></label>
                        <input type="text" name="linhvuc" id="linhvuc" class="form-control"
                            placeholder="Ví dụ: Lĩnh vực vông nghiệp">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">Chức danh<span class="require">*</span></label>
                        <input type="text" name="chucdanh" id="chucdanh_kn" class="form-control"
                            placeholder="Ví dụ: Kinh doanh quốc tế" required>
                    </div>
                </div>

            </div>
            <div class="row col-md-12">
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">Ngày vào</label>
                        <input type="date" name="ngayvao" id="ngayvao" class="form-control">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">Ngày xin nghỉ việc</label>
                        <input type="date" name="ngaynghi" id="ngaynghi" class="form-control">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Lý do nghỉ</label>
                        <input type="text" name="lydo" id="lydo" class="form-control">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Chi tiết công việc</label>
                        <textarea type="text" name="chitiet" id="chitiet" class="form-control" rows="3"></textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Mô tả</label>
                        <textarea type="text" name="mota" id="mota" class="form-control" rows="3"></textarea>
                    </div>
                </div>
            </div>
            <input type="text" id="user" name="user" value="{{ $user }}" hidden>
            <div class="row col-md-9" style="margin-left: 0%">
                <a onclick="huythemmoi_kinhnghiem()" class="btn btn-sm btn-secondary btn-lg pull-left"
                    style="background-color: rgb(198, 210, 221);color: white">
                    Hủy</a>

                <button type="submit" class="btn btn-sm btn-info btn-lg pull-left">
                    Lưu</button>
            </div>
        </form>
    </div>

    <script>
        function createkinhnghiem() {
            $('#congty').val('');
            $('#quymo').val('');
            $('#linhvuc').val('');
            $('#chucdanh_kn').val('');
            $('#ngayvao').val('');
            $('#ngaynghi').val('');
            $('#chitiet').val('');
            $('#mota').val('');
            $('#lydo').val('');
            $("#kinhnghiem_themmoi").css("display", "block");
        }

        function huythemmoi_kinhnghiem() {
            $("#kinhnghiem_themmoi").css("display", "none");
        }

        function editkinhnghiem(id) {

            $("#kinhnghiem_chinhsua" + id).css("display", "block");
        }

        function huyedit_kinhnghiem(id) {
            $("#kinhnghiem_chinhsua" + id).css("display", "none");
        }
    </script>

</body>
