<div class="form-body">
    <div id="form_hocvan1">

    </div>
    <div class="row">
        <button onclick="createhocvan()" class="btn btn-sm btn-success btn-lg pull-right" style="margin-left:2%">
            Thêm mới
        </button>
        <br>
    </div>
</div>

<div class="form-body" id="form_hocvan2">

</div>

<script>
    function createhocvan() {
        if ($('#user').val() == '') {
            toastr.warning("Vui lòng lưu lại thông tin trước khi cập nhật thông tin này.");
        } else {
            $.ajax({
                url: '/ungvien/createhocvan',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                },
                dataType: 'JSON',
                success: function(data) {
                    console.log(data);
                    $('#form_hocvan2').replaceWith(data.content);
                }
            })
        }
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
                console.log(data);
                // $('#form_hocvan3').hide();
 
                $('#form_hocvan1').replaceWith(data.content1);
                $('#form_hocvan2').replaceWith(data.content2);
                toastr.success('Đã lưu thông tin', "Hoàn thành!");
            }
        })
    }
</script>
