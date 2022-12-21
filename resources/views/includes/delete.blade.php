<script>
    function cfDel(url){
        $('#frmDelete').attr('action', url);
    }

    function subDel(){
        $('#frmDelete').submit();
    }
</script>

<div id="delete-modal-confirm" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
    <form id="frmDelete" method="GET" action="#" accept-charset="UTF-8">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-header-primary">
                    <h4 id="modal-header-primary-label" class="modal-title">Đồng ý xoá?</h4>
                    <button type="button" data-dismiss="modal" aria-hidden="true"
                            class="close">&times;</button>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-secondary">Hủy thao tác</button>
                    <button type="submit" onclick="subDel()" data-dismiss="modal" class="btn btn-primary">Đồng ý</button>
                </div>
            </div>
        </div>
    </form>
</div>