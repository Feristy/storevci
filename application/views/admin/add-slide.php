<?=$msg?>
<h3 class="dib"><?=$title1?></h3>
<a href="<?=site_url('admin/tambah-slide/')?>" class="btn btn-success">Tambah</a>
<br>
<br>
<div class="row">
	<div class="col-md-6">
		<form method="post">
			<div class="form-group">
				<label>Gambar Produk</label>
	  			<div class="gambar-user">
	  			<?php if(!empty($slide->img)):?>
	  				<img src="<?=base_url('assets/upload/'.$slide->img)?>" alt="" class="img"><br><br>
	  			<?php endif;?>
	  			</div>
	  			<input type="hidden" class="input-gambar" name="gambar" value="<?=@$slide->img?>">
	  			<button type="button" class="btn btn-secondary add-img-user" data-toggle="modal" data-target=".tambah-gambar">Tambah Gambar</button>
			</div>
			<div class="form-group">
				<label>Title</label>
				<input type="text" class="form-control" name="title" value="<?=@$slide->title?>">
			</div>
			<div class="form-group">
				<label>Sub Title</label>
				<input type="text" class="form-control" name="sub" value="<?=@$slide->sub_title?>">
			</div>
			<div class="form-group">
				<label>Button Text</label>
				<input type="text" class="form-control" name="btn" value="<?=@$slide->btn_text?>">
			</div>
			<input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>">
			<button type="submit" class="btn btn-success btn-lg" name="<?=$submit?>" value="1"><?=$title_submit?></button>
		</div>
	</form>
</div>
<div class="modal fade tambah-gambar" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <div class="modal-title"><b>Gambar</b> <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button></div>
      </div>
      <div class="modal-body">
      	<div class="row">
			<?php foreach ($gambar as $gambar_item):?>
			<div class="img-add close-modal pointer col-md-3 gambar-item" data-img="<?=$gambar_item->nama?>" data-url="<?=base_url('assets/upload/'.$gambar_item->nama)?>" data-dismiss="modal" aria-label="Close">
				<img src="<?=base_url('assets/upload/'.$gambar_item->nama)?>" alt="..." class="img">
				<div class="img-select"></div>
			</div>
			<?php endforeach;?>
			<div class="clearfix"></div>
		</div>
      </div>
      <div class="modal-footer">
      	<a href="<?=site_url('admin/gambar')?>" target="blank" class="btn btn-secondary">Upload Gambar</a>
        <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>