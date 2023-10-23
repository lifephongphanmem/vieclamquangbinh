<div class="form-body">
    <div id="kinhnghiem_danhsach">
        @if (isset($ungvienkinhnghiem))
            <table class="table  table-bordered table-hover dataTable no-footer">
                @foreach ($ungvienkinhnghiem as $item)
                    <tr>
                        <td width="80%">
                            {{ $item->congty }} ----- {{ $item->ngayvao }} - {{ $item->ngaynghi }}
                        </td>
                        <td width="20%">
                            <a onclick="deletekinhnghiem('{{ $item->id }}')"class="btn btn-sm btn-clean btn-icon"><i
                                    class="icon-lg flaticon-delete text-danger"></i></a>
                        </td>
                    </tr>
                @endforeach
            </table>
        @endif
    </div>
    <div class="row">
        <button onclick="createkhinhnghiem()" class="btn btn-sm btn-success btn-lg pull-right" style="margin-left:2%">
            Thêm mới
        </button>

    </div>
</div>
<br>

<div class="form-body" id="kinhnghiem_themmoi" style="display: none">
    <div class="row col-md-12">
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">Công ty<span class="require">*</span></label>
                <input type="text" name="congty" id="congty" class="form-control"
                    placeholder="Ví dụ: Công ty ABC" value="">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">Quy mô</label>
                <input type="number" name="quymo" id="quymo" class="form-control" placeholder="Ví dụ: 50"
                    value="">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">Lĩnh vực hoạt động của công ty</span></label>
                <input type="text" name="linhvuc" id="linhvuc" class="form-control"
                    placeholder="Ví dụ: Lĩnh vực vông nghiệp" value="">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">Chức danh<span class="require">*</span></label>
                <input type="text" name="chucdanh" id="chucdanh_kn" class="form-control"
                    placeholder="Ví dụ: Kinh doanh quốc tế" value="">
            </div>
        </div>

    </div>
    <div class="row col-md-12">
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">Ngày vào<span class="require">*</span></label>
                <input type="date" name="ngayvao" id="ngayvao" class="form-control">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">Ngày xin nghỉ việc<span class="require">*</span></label>
                <input type="date" name="ngaynghi" id="ngaynghi" class="form-control">
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Lý do nghỉ</label>
                <input type="text" name="lydo" id="lydo" class="form-control" >
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
    <div class="row">
        <button onclick="huykinhnghiem()" class="btn btn-sm btn-secondary btn-lg pull-right" style="margin-left:2%">
            Hủy</button>
        <button onclick="storekhinhnghiem()" class="btn btn-sm btn-info btn-lg pull-right" style="margin-left:1px">
            Lưu</button>
    </div>

</div>



<script>
    function createkhinhnghiem() {
        if ($('#user').val() == '') {
            toastr.warning("Vui lòng lưu lại thông tin trước khi cập nhật thông tin này.");
        } else {
            $('#congty').val('');
            $('#quymo').val('');
            $('#linhvuc').val('');
            $('#chucdanh_kn').val('');
            $('#ngayvao').val('');
            $('#ngaynghi').val('');
            $('#chitiet').val('');
            $('#mota').val('');
            $('#lydo').val('');
            $("#kinhnghiem_danhsach").css("display", "block");
        }
    }

    function huykinhnghiem() {
        $("#kinhnghiem_danhsach").css("display", "none");
    }

    function storekhinhnghiem() {

        $.ajax({
            url: '/ungvien/storekinhnghiem',
            type: 'POST',
            data: {
                _token: CSRF_TOKEN,
                user: $('#user').val(),
                congty: $('#congty').val(),
                quymo: $('#quymo').val(),
                linhvuc: $('#linhvuc').val(),
                chucdanh: $('#chucdanh_kn').val(),
                ngayvao: $('#ngayvao').val(),
                ngaynghi: $('#ngaynghi').val(),
                chitiet: $('#chitiet').val(),
                mota: $('#mota').val(),
                lydo: $('#lydo').val(),
            },
            dataType: 'JSON',
            success: function(data) {
                console.log(data);
                $('#kinhnghiem_danhsach').html(data.content);
                $('#kinhnghiem_themmoi').css("display", "none");
                toastr.success('Đã lưu thông tin', "Hoàn thành!");
            }
        })
    }

    function deletekinhnghiem(id,user){
    
    $.ajax({
        url: '/ungvien/deletekinhnghiem',
        type: 'GET',
        data: {
            _token: CSRF_TOKEN,
            id: id,
            user: $('#user').val(),
        },
        dataType: 'JSON',
        success: function(data) {
            $('#kinhnghiem_danhsach').html(data.content);
            $('#kinhnghiem_themmoi').css("display", "none");
            toastr.success('Đã xóa thông tin', "Hoàn thành!");
        }
    })
}
</script>
