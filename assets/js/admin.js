$(document).ready(function(){

	var burger = 0;
	$(document).on('click', '.burger', function(){
		if(burger == 0){
			$('.admin-menu').addClass('side-in');
			$('.contents').addClass('content-in');
			burger++;
		}else{
			$('.admin-menu').removeClass('side-in');
			$('.contents').removeClass('content-in');
			burger--;
		}
	});

	$(document).on('change', '.file1', function(){
		$('#upload-file1').submit();
	});

	var adminmenu = $('#data').attr('data-id');
	$(adminmenu+' .submenu').css({'max-height':'initial'});
	$(adminmenu+' .admin-menu-first').removeClass('admin-menu-first').addClass('admin-menu-active');

	$(document).on('click', '.admin-menu-first', function(){
		var panel = this.nextElementSibling;
		$('.admin-menu-active').removeClass('admin-menu-active').addClass('admin-menu-first');
		$('.submenu').css({'max-height':'0px'});
		$(this).removeClass('admin-menu-first').addClass('admin-menu-active');
		panel.style.maxHeight = panel.scrollHeight + "px";
	});
	$(document).on('click', '.admin-menu-active', function(){
		$('.submenu').css({'max-height':'0px'});
		$('.admin-menu-active').removeClass('admin-menu-active').addClass('admin-menu-first');
	});

	var checkid = document.getElementsByClassName('check');

	function check(){
	    for(var i = 0; i < checkid.length; i++){
	    	checkid[i].checked=true
	    }
	}
	
	function uncheck(){
	    for(var i = 0; i < checkid.length; i++){
	    	checkid[i].checked=false
	    }
	}

	var inputChecked = document.getElementsByClassName('in-check');

	function inputCheck(){
		var inc = [];
		for(var i = 0; i < inputChecked.length; i++){
			var sinc = inputChecked[i].checked;
			if(sinc != false){
				inc[i] = inputChecked[i].value;
			}
		}

		return inc;
	}

	$(document).on('click', '.check-true', function(){
		$('.check-true').removeClass('check-true').addClass('check-false');
		check();
		$('.in-del').val(inputCheck());
	});

	$(document).on('click', '.check-false', function(){
		$('.check-false').removeClass('check-false').addClass('check-true');
		uncheck();
		$('.in-del').val(inputCheck());
	});

	$('.check', this).click(function(){
		$('.check-false').removeClass('check-false').addClass('check-true');
		document.getElementById('all-check').checked=false
		$('.in-del').val(inputCheck());
	});

	$('.btn-add').click(function(){
		$('.tambah .modal-title').text('Tambah Kategori Produk');
		$('.id-ktg').val('');
		$('.nama-ktg').val('');
		$('.submit-ktg').attr('name', 'add');
		$('.submit-ktg').text('Tambah');
	});

	$('.btn-edit').click(function(){
		var id = $(this).attr('data-id');
		var nama = $(this).attr('data-name');
		//alert(nama);
		$('.edit .modal-title').text('Edit Kategori Produk');
		$('.id-ktg').val(id);
		$('.nama-ktg').val(nama);
		$('.submit-ktg').attr('name', 'edit');
		$('.submit-ktg').text('Edit');
	});


	//input gambar lebih dari satu
	$('.img-produk').click(function(){
		var id = $(this).attr('data-id');
		var img = $(this).attr('data-url');
		var input = $('.input-gambar').val();
		var input = input != '' ? input+','+id: id;

		$('.gambar-produk').prepend('<div class="col-md-3 col-sm-3 gambar-item img-list" id="'+id+'"><div class="img-screen"><img src="'+img+'" alt="" class="img"><div class="img-select"></div><button type="button" class="delete-gambar btn-unstyle" data-id="#'+id+'"><i class="fas fa-times"></i></button></div></div>');
		$('.input-gambar').val(input);
	});

	$(document).on('click', '.delete-gambar', function(){
		var id = $(this).attr('data-id');
		$(id).remove();
		var item = document.getElementsByClassName('img-list');
		var a = '';
		var b = 0;
		for (var i = 0; i < item.length; i++) {
			a += item[i].getAttribute('id');
			b++;
			if(b < item.length){
				a += ',';
			}
		}
		$('.input-gambar').val(a);
	});

	//input satu gambar
	$('.img-add').click(function(){
		var img = $(this).attr('data-img');
		var url = $(this).attr('data-url');

		$('.gambar-user').html('<img src="'+url+'" alt="" class="img"><br><br>');
		$('.input-gambar').val(img);
		$('.add-img-user').attr('data-target', '');
		$('.add-img-user').text('Hapus Gambar');
		$('.add-img-user').removeClass('btn-secondary').addClass('btn-danger');
		$('.add-img-user').removeClass('add-img-user').addClass('del-img-user');
	});

	$(document).on('click', '.del-img-user', function(){
		$('.gambar-user').html('');
		$('input-gambar').val('');
		$(this).attr('data-target', '.tambah-gambar');
		$(this).text('Tambah Gambar');
		$(this).removeClass('btn-danger').addClass('btn-secondary');
		$(this).removeClass('del-img-user').addClass('add-img-user');
	});
});