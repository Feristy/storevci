<!DOCTYPE html>
<html lang="en">
	<head>
    	<meta charset="utf-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
    	<title><?=$title?></title>
    	<link rel="stylesheet" href="<?=base_url('assets/css/bootstrap/css/bootstrap.min.css')?>">
    	<link rel="stylesheet" href="<?=base_url('assets/css/fontawesome/css/all.css')?>">
        <link rel="stylesheet" href="<?=base_url('assets/css/main.css')?>">
		<link rel="stylesheet" href="<?=base_url('assets/css/admin.css')?>">
	</head>
	<body>
		<div class="top-bar">
            <div class="container-fluid">
                <div class="row">
                    <div class="btn-burger burger dib pointer"><i class="fa fa-bars"></i></div>
                    <div class="brands dib"><strong>Administrator</strong></div>
                </div>
            </div>
        </div>
        <div class="admin-menu">
            <ul class="list-unstyled">
                <li id="home">
                    <a href="<?=site_url('admin')?>" class="admin-menu-first" data-id="#home">
                        <i class="fa fa-tachometer-alt fa-fw"></i>
                        <span>Dashbord</span>
                    </a>
                </li>
                <li id="produk">
                    <a class="admin-menu-first" data-id="#produk">
                        <i class="fa fa-cubes fa-fw"></i>
                        <span>Produk</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="<?=site_url('admin/produk')?>">Semua Produk</a></li>
                        <li><a href="<?=site_url('admin/tambah-produk')?>">Tambah Produk</a></li>
                        <li><a href="<?=site_url('admin/diskon')?>">Diskon Produk</a></li>
                        <li><a href="<?=site_url('admin/slide')?>">Slide Produk</a></li>
                    </ul>
                </li>
                <li id="kategori">
                    <a href="<?=site_url('admin/kategori')?>" class="admin-menu-first" data-id="#kategori">
                        <i class="fa fa-tasks fa-fw"></i>
                        <span>Kategori</span>
                    </a>
                </li>
                <li id="gambar">
                    <a href="<?=site_url('admin/gambar')?>" class="admin-menu-first" data-id="#gambar">
                        <i class="fa fa-image fa-fw"></i>
                        <span>Gambar</span>
                    </a>
                </li>
                <li id="pesanan">
                    <a href="<?=site_url('admin/pesanan')?>" class="admin-menu-first" data-id="#pesanan">
                        <i class="fa fa-th-list fa-fw"></i>
                        <span>Pesanan</span>
                    </a>
                </li>
                <li id="user">
                    <a class="admin-menu-first" data-id="#user">
                        <i class="fa fa-users fa-fw"></i>
                        <span>Pengguna</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="<?=site_url('admin/pengguna')?>">Semua Pengguna</a></li>
                        <li><a href="<?=site_url('admin/tambah-pengguna')?>">Tambah Pengguna</a></li>
                    </ul>
                </li>
			</ul>
		</div>
		<div class="contents"><?=$content?></div>
        <div id="data" data-id="#<?=$btn?>"></div>
		<script type="text/javascript" src="<?=base_url('assets/js/jquery.js')?>"></script>
		<script type="text/javascript" src="<?=base_url('assets/js/bootstrap/pooper.js')?>"></script>
        <script type="text/javascript" src="<?=base_url('assets/js/bootstrap/bootstrap.min.js')?>"></script>
        <script type="text/javascript" src="<?=base_url('assets/js/datatables.min.js')?>"></script>
        <script type="text/javascript" src="<?=base_url('assets/js/jquery-sortable.js')?>"></script>
        <?php if(!empty($sortable)):?>
        <script type="text/javascript">
            var adjustment;
            var group = $("ul.menu_drop_targets").sortable({
                group: 'limited_drop_targets',
                onDragStart: function ($item, container, _super) {
                    var offset = $item.offset(),
                    pointer = container.rootGroup.pointer;

                    adjustment = {
                        left: pointer.left - offset.left,
                        top: pointer.top - offset.top
                    };

                    _super($item, container);
                },
                onDrag: function ($item, position) {
                    $item.css(position),
                    $item.css({height: $item.outerHeight('40px')}),
                    $item.css({
                        left: position.left - adjustment.left,
                        top: position.top - adjustment.top
                    });
                },
                onDrop: function ($item, container, _super) {
                    $('#input_position').val(group.sortable("serialize").get().join("\n"));
                    _super($item, container);
                },
                serialize: function (parent, children, isContainer) {
                    return isContainer ? children.join() : parent.attr('data-id');
                },
                tolerance: 6,
                distance: 10
            });
        </script>
        <?php endif;?>
        <?php if(!empty($btn_add)):?>
        <script type="text/javascript">
            $(document).ready(function(){
                var btn = '<button type="button" class="btn btn-success btn-del btn-add" data-toggle="modal" data-target=".tambah">Tambah</button>';
                var alink = '<a href="<?=@$btn_alink?>" class="btn btn-success btn-del">Tambah</a>';
                var btn_del = '<button class="btn btn-danger btn-del" type="submit" name="del-all" value="1">Hapus</button>';
                var file = '<form class="upload dib btn-del" id="upload-file1" method="post" enctype="multipart/form-data"><div class="post-file"><div class="btn btn-success" href="#">Tambah</div><input type="hidden" name="submit_upload" value="1"><input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>"><input id="input-1" type="file" class="file1" name="upload"></div></form>';

                $('#myTable').DataTable();
                $('.dataTables_info').remove();
                $('#myTable_wrapper').prepend(
                        <?php if($btn_add == 'btn'):?>
                        btn+
                        <?php elseif($btn_add == 'alink'):?>
                        alink+
                        <?php elseif($btn_add == 'file'):?>
                        file+
                        <?php endif;?>
                        btn_del
                    );
            });
        </script>
        <?php endif;?>
		<script type="text/javascript" src="<?=base_url('assets/js/admin.js')?>"></script>
	</body>
</html>