<?=$msg?>
<h3><?=$title1?></h3>
<br>
<div class="row">
	<div class="col-md-6">
		<div class="form-group">
			<label>Title</label>
			<input type="text" class="form-control" name="title">
		</div>
		<div class="form-group">
			<label>Sub Title</label>
			<input type="text" class="form-control" name="sub">
		</div>
		<div class="form-group">
			<label>Gambar Produk</label>
  			<div class="gambar-user">
  			<?php if(!empty($gambar_user)):?>
  				<img src="<?=base_url('assets/upload/'.$gambar_user->nama)?>" alt="" class="img" width="171"><br><br>
  			<?php endif;?>
  			</div>
  			<input type="hidden" class="input-gambar" name="gambar" value="<?=$user->gambar?>">
			<button type="button" class="btn btn-default add-img-user" data-toggle="modal" data-target=".tambah-gambar">Tambah Gambar</button>
		</div>
	</div>
</div>
<div class="modal fade tambah-gambar" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <div class="title-modal"><b>Gambar</b> <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
      </div>
      <div class="modal-body">
      	<a href="<?=site_url('admin/gambar')?>" target="blank" class="btn btn-default">Upload Gambar</a>
      	<div class="row">
			<?php foreach ($gambar as $gambar_item):?>
			<div class="img-user close-modal pointer col-md-3 gambar-item" data-url="<?=base_url('assets/upload/'.$gambar_item->nama)?>" data-dismiss="modal" aria-label="Close">
				<img src="<?=base_url('assets/upload/'.$gambar_item->nama)?>" alt="..." class="img">
				<div class="img-select"></div>
			</div>
			<?php endforeach;?>
			<div class="clearfix"></div>
		</div>
      </div>
    </div>
  </div>
</div>