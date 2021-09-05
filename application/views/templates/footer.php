<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Website <?= date('Y'); ?></span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

<script>
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    })


    $('.form-check-input').on('click', function() {
        const menuId = $(this).data('menu');
        const roleId = $(this).data('role');

        $.ajax({
            url: "<?= base_url('admin/changeAccess'); ?>",
            type: 'post',
            data: {
                menuId: menuId,
                roleId: roleId
            },
            success: function() {
                document.location.href = " <?= base_url('admin/roleAccess/'); ?>" + roleId;
            }
        });
    });

    function showEditRoleModal(id, name) {
        // console.log(id)
        // console.log(name)

        $('#edit_role_form #role_id_edit').val(id)
        $('#edit_role_form #role_name_edit').val(name)
        $('#editRoleModal').modal('show')
    }

    function showEditSubMenuModal(id, name) {
        // console.log(id)
        // console.log(name)
        $.ajax({
            url: "<?= base_url('menu/detail_menu_ajax/'); ?>" + id,
            type: 'get',
            data: {},
            success: function(menu) {
                console.log()
                parsedMenu = JSON.parse(menu)
                $('#edit_submenu_form #title').val(parsedMenu.title)
                selectMenuId = '#edit_submenu_form #menu'+parsedMenu.menu_id
                $(selectMenuId).attr('selected', 'true')
                $('#edit_submenu_form #url').val(parsedMenu.url)
                $('#edit_submenu_form #submenu_id').val(parsedMenu.id)
                $('#edit_submenu_form #icon').val(parsedMenu.icon)
                $('#editSubMenuModal').modal('show')
            }
        });

    }
</script>

</body>

</html>