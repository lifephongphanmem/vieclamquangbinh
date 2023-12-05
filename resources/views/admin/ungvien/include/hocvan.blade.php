<div class="form-body">
    <div id="hocvan_danhsach">
        @if (isset($ungvienhocvan))
        <table  class="table  table-bordered table-hover dataTable no-footer">
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
        <button onclick="createhocvan()" class="btn btn-sm btn-success btn-lg pull-right" style="margin-left:2%">
            Thêm mới
        </button>

    </div>
</div>
<br>

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
    <div class="row">
        <button onclick="huyhocvan()" class="btn btn-sm btn-secondary btn-lg pull-right" style="margin-left:2%">
            Hủy</button>
        <button onclick="storehocvan()" class="btn btn-sm btn-info btn-lg pull-right" style="margin-left:1px">
            Lưu</button>
    </div>

</div>

<script>
    //  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    // function createhocvan() {
    //     if ($('#user').val() == '') {
    //         toastr.warning("Vui lòng lưu lại thông tin trước khi cập nhật thông tin này.");
    //     } else {
    //         $.ajax({
    //             url: '/ungvien/createhocvan',
    //             type: 'GET',
    //             data: {
    //                 _token: CSRF_TOKEN,
    //             },
    //             dataType: 'JSON',
    //             success: function(data) {
    //                 console.log(data);
    //                 $('#form_hocvan2').replaceWith(data.content);
    //             }
    //         })
    //     }
    // }

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
                // $('#form_hocvan3').hide();
                $('#hocvan_danhsach').html(data.content);
                $('#hocvan_themmoi').css("display", "none");
                toastr.success('Đã lưu thông tin', "Hoàn thành!");
            }
        })
    }

    function deletehocvan(id,user){
    
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
