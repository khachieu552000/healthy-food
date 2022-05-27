<div class="modal fade" id="modal-edit">
    <div class="modal-dialog">
        <div class="modal-content">
             <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Sửa</h4>
            </div>
            <form role="form" method="POST" action="" id="form-edit">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name-edit">Tên danh mục <span style="color: red">*</span></label>
                        <input class="form-control" name="ten_danh_muc" id="name-edit" require>
                    </div>
                </div>
                <div class="modal-footer">
                    <a type="button" class="btn btn-default" data-dismiss="modal">Huỷ</a>
                    <input type="submit" class="btn btn-primary" value="Lưu">
                </div>
            </form>
        </div>
        <div class="modal-footer">

        </div>
    </div>
</div>
