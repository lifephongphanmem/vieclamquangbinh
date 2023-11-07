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

        p {
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
        <i class="fa fa-fw fa-bank" aria-hidden="true" style="margin-top: 7px;"></i> Thông tin cơ bản
    </h2>
    @if (isset($success))
        <div style="background-color: #d6e9c6;margin: 1%;width: 98%;height: 8%;border-radius: 5px;" id='success'>
            <button onclick="close_success()" type="button" class="close" aria-hidden="true" style="margin-right:5px">×</button>
            <p style="padding-top: 1%;margin-left: 1%;font-size: 14px;color: #3c7011bb">{{ $success }}</p>
        </div>
    @endif
    <div class="form-body" style="margin: 1%;">
        <form action="{{ '/page/ungvien/update_coban' }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">Ảnh đại diện </label>
                        <input type="file" name="avatar" id="avatar" class="form-control" placeholder="Chọn ảnh"
                            value="">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">Họ tên <span class="require">*</span></label>
                        <input type="text" name="hoten" id="hoten" class="form-control"
                            placeholder="Nhập đầy đủ Họ và Tên"
                            value="{{ isset($ungvien->hoten) ? $ungvien->hoten : '' }}" required>
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="form-group">
                        <label class="control-label">Giới tính <span class="require">*</span></label>
                        <select name="gioitinh" id="gioitinh" class="form-control">
                            <option value="Nữ"
                                {{ isset($ungvien->gioitinh) ? ($ungvien->gioitinh == 'Nữ' ? 'selected' : '') : '' }}>
                                Nữ
                            </option>
                            <option value="Nam"
                                {{ isset($ungvien->gioitinh) ? ($ungvien->gioitinh == 'Nam' ? 'selected' : '') : '' }}>
                                Nam
                            </option>
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label class="control-label">Ngày sinh<span class="require">*</span></label>
                        <input type="date" name="ngaysinh" id="ngaysinh" class="form-control"
                            value="{{ isset($ungvien->ngaysinh) ? $ungvien->ngaysinh : '' }}" required>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">Số điện thoại<span class="require">*</span></label>
                        <input type="number" name="phone" id="phone" class="form-control"
                            value="{{ isset($ungvien->phone) ? $ungvien->phone : '' }}" required>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <?php $danhmuc_tinh = $danhmuc->where('capdo', 'T'); ?>
                        <label class="control-label">Tỉnh<span class="require">*</span></label>
                        <select name="tinh" id="tinh"class="form-control">
                            @foreach ($danhmuc_tinh as $item)
                                <option value="{{ $item->maquocgia }}"
                                    {{ isset($ungvien->tinh) ? ($ungvien->tinh == $item->maquocgia ? 'selected' : '') : '' }}>
                                    {{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <?php $danhmuc_huyen = $danhmuc->where('capdo', 'H'); ?>
                        <label class="control-label">Huyện<span class="require">*</span></label>
                        <select name="huyen" id="huyen" class="form-control select2basic" required>
                            <option value="">Chọn huyện</option>
                            @foreach ($danhmuc_huyen as $item)
                                <option value="{{ $item->maquocgia }}"
                                    {{ isset($ungvien->huyen) ? ($ungvien->huyen == $item->maquocgia ? 'selected' : '') : '' }}>
                                    {{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <?php $danhmuc_xa = $danhmuc->where('capdo', 'X'); ?>
                        <label class="control-label">Xã<span class="require">*</span></label>
                        <select name="xa" id="xa" class="form-control select2basic" required>
                            <option value="">Chọn xã</option>
                            @foreach ($danhmuc_xa as $item)
                                <option value="{{ $item->maquocgia }}"
                                    {{ isset($ungvien->xa) ? ($ungvien->xa == $item->maquocgia ? 'selected' : '') : '' }}>
                                    {{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">address<span class="require">*</span></label>
                        <input type="text" name="address" id="address" class="form-control"
                            placeholder="số nhà-Tên đường/Xóm-Thôn"
                            value="{{ isset($ungvien->address) ? $ungvien->address : '' }}" required>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">Cấp bậc<span class="require">*</span></label>
                        <select name="capbac" id="capbac" class="form-control">
                            <option value="">Chọn cấp bậc</option>
                            @foreach ($capbac as $item)
                                <option value="{{ $item->madm }}">{{ $item->tendm }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">Trạng thái hôn nhân<span class="require">*</span></label>>
                        <select name="honnhan" id="honnhan" class="form-control">
                            <option value="0"
                                {{ isset($ungvien->honnhan) ? ($ungvien->honnhan == '0' ? 'selected' : '') : '' }}>Độc
                                thân
                            </option>
                            <option value="1"
                                {{ isset($ungvien->honnhan) ? ($ungvien->honnhan == '1' ? 'selected' : '') : '' }}>Đã
                                kết hôn
                            </option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">Hình thức làm việc</label>
                        <select class="form-control " name="hinhthuclv" id="hinhthuclv">
                            <option value="Toàn thời gian" selected="">Toàn thời gian</option>
                            <option value="Bán thời gian">Bán thời gian</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">Mức lương mong muốn<span class="require">*</span></label>
                        <input type="number" id="luong" name="luong"
                            class="form-control"value="{{ isset($ungvien->luong) ? $ungvien->luong : '' }}" required
                            placeholder="VD: 8 (8 triệu)">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">Trình độ</label>
                        <select name="trinhdocmkt" id="trinhdocmkt" class="form-control">
                            <option value="">Chọn trình độ</option>
                            @foreach ($dmtrinhdokythuat as $item)
                                <option value="{{ $item->madmtdkt }}"
                                    {{ isset($ungvien->trinhdocmkt) ? ($ungvien->trinhdocmkt == $item->madmtdkt ? 'selected' : '') : '' }}>
                                    {{ $item->tentdkt }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">Word</label>
                        <select name="word" id="word" class="form-control">
                            <option value="1"
                                {{ isset($ungvien->word) ? ($ungvien->word == '1' ? 'selected' : '') : '' }}>1
                                điểm</option>
                            <option value="2"
                                {{ isset($ungvien->word) ? ($ungvien->word == '2' ? 'selected' : '') : '' }}>2
                                điểm</option>
                            <option value="3"
                                {{ isset($ungvien->word) ? ($ungvien->word == '3' ? 'selected' : '') : '' }}>3
                                điểm</option>
                            <option value="4"
                                {{ isset($ungvien->word) ? ($ungvien->word == '4' ? 'selected' : '') : '' }}>4
                                điểm</option>
                            <option value="5"
                                {{ isset($ungvien->word) ? ($ungvien->word == '5' ? 'selected' : '') : '' }}>5
                                điểm</option>
                            <option value="6"
                                {{ isset($ungvien->word) ? ($ungvien->word == '6' ? 'selected' : '') : '' }}>6
                                điểm</option>
                            <option value="7"
                                {{ isset($ungvien->word) ? ($ungvien->word == '7' ? 'selected' : '') : '' }}>7
                                điểm</option>
                            <option value="8"
                                {{ isset($ungvien->word) ? ($ungvien->word == '8' ? 'selected' : '') : '' }}>8
                                điểm</option>
                            <option value="9"
                                {{ isset($ungvien->word) ? ($ungvien->word == '9' ? 'selected' : '') : '' }}>9
                                điểm</option>
                            <option value="10"
                                {{ isset($ungvien->word) ? ($ungvien->word == '10' ? 'selected' : '') : '' }}>
                                10 điểm</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">Excel</label>
                        <select name="excel" id="excel" class="form-control">
                            <option value="1"
                                {{ isset($ungvien->excel) ? ($ungvien->excel == '1' ? 'selected' : '') : '' }}>
                                1 điểm</option>
                            <option value="2"
                                {{ isset($ungvien->excel) ? ($ungvien->excel == '2' ? 'selected' : '') : '' }}>
                                2 điểm</option>
                            <option value="3"
                                {{ isset($ungvien->excel) ? ($ungvien->excel == '3' ? 'selected' : '') : '' }}>
                                3 điểm</option>
                            <option value="4"
                                {{ isset($ungvien->excel) ? ($ungvien->excel == '4' ? 'selected' : '') : '' }}>
                                4 điểm</option>
                            <option value="5"
                                {{ isset($ungvien->excel) ? ($ungvien->excel == '5' ? 'selected' : '') : '' }}>
                                5 điểm</option>
                            <option value="6"
                                {{ isset($ungvien->excel) ? ($ungvien->excel == '6' ? 'selected' : '') : '' }}>
                                6 điểm</option>
                            <option value="7"
                                {{ isset($ungvien->excel) ? ($ungvien->excel == '7' ? 'selected' : '') : '' }}>
                                7 điểm</option>
                            <option value="8"
                                {{ isset($ungvien->excel) ? ($ungvien->excel == '8' ? 'selected' : '') : '' }}>
                                8 điểm</option>
                            <option value="9"
                                {{ isset($ungvien->excel) ? ($ungvien->excel == '9' ? 'selected' : '') : '' }}>
                                9 điểm</option>
                            <option value="10"
                                {{ isset($ungvien->excel) ? ($ungvien->excel == '10' ? 'selected' : '') : '' }}>10 điểm
                            </option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">powerpoint</label>
                        <select name="powerpoint" id="powerpoint" class="form-control">
                            <option value="1"
                                {{ isset($ungvien->powerpoint) ? ($ungvien->powerpoint == '1' ? 'selected' : '') : '' }}>
                                1 điểm
                            </option>
                            <option value="2"
                                {{ isset($ungvien->powerpoint) ? ($ungvien->powerpoint == '2' ? 'selected' : '') : '' }}>
                                2 điểm
                            </option>
                            <option value="3"
                                {{ isset($ungvien->powerpoint) ? ($ungvien->powerpoint == '3' ? 'selected' : '') : '' }}>
                                3 điểm
                            </option>
                            <option value="4"
                                {{ isset($ungvien->powerpoint) ? ($ungvien->powerpoint == '4' ? 'selected' : '') : '' }}>
                                4 điểm
                            </option>
                            <option value="5"
                                {{ isset($ungvien->powerpoint) ? ($ungvien->powerpoint == '5' ? 'selected' : '') : '' }}>
                                5 điểm
                            </option>
                            <option value="6"
                                {{ isset($ungvien->powerpoint) ? ($ungvien->powerpoint == '6' ? 'selected' : '') : '' }}>
                                6 điểm
                            </option>
                            <option value="7"
                                {{ isset($ungvien->powerpoint) ? ($ungvien->powerpoint == '7' ? 'selected' : '') : '' }}>
                                7 điểm
                            </option>
                            <option value="8"
                                {{ isset($ungvien->powerpoint) ? ($ungvien->powerpoint == '8' ? 'selected' : '') : '' }}>
                                8 điểm
                            </option>
                            <option value="9"
                                {{ isset($ungvien->powerpoint) ? ($ungvien->powerpoint == '9' ? 'selected' : '') : '' }}>
                                9 điểm
                            </option>
                            <option value="10"
                                {{ isset($ungvien->powerpoint) ? ($ungvien->powerpoint == '10' ? 'selected' : '') : '' }}>
                                10
                                điểm
                            </option>
                        </select>
                    </div>
                </div>
            </div>
            <input type="text" id="id" name="id" value="{{ $ungvien->id }}" hidden>
            <input type="text" id="user" name="user" value="{{ $ungvien->user }}" hidden>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Giới thiệu bản thân</label>
                        <textarea name="gioithieu" id="gioithieu" class="form-control" rows="3">{{ isset($ungvien->gioithieu) ? $ungvien->gioithieu : '' }}</textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Mục tiêu nghề nghiệp</label>
                        <textarea name="muctieu" id="muctieu" class="form-control" rows="3">{{ isset($ungvien->muctieu) ? $ungvien->muctieu : '' }}</textarea>
                    </div>
                </div>
            </div>
            <div class="row col-md-9">
                <button type="submit" class="btn btn-sm btn-info btn-lg pull-left" onclick="close_coban()">
                    Lưu</button>

            </div>



        </form>
    </div>

<script>
    function close_success() {
        $('#success').css('display','none')
    }
</script>
</body>
