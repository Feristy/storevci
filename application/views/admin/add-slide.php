<?=$msg?>
<h3><?=$title1?></h3>
<br>
<div class="row">
	<div class="col-md-6">
		<div class="form-group">
			<label>Gambar Produk</label>
  			<div class="gambar-user">
  			<?php if(!empty($slide->gambar)):?>
  				<img src="<?=base_url('assets/upload/'.$slide->gambar)?>" alt="" class="img" width="171"><br><br>
  			<?php endif;?>
  			</div>
  			<input type="hidden" class="input-gambar" name="gambar" value="<?=@$slide->gambar?>">
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
		<input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>">
		<button type="submit" class="btn btn-success btn-lg" name="<?=$submit?>" value="1"><?=$title_submit?></button>
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
			<div class="img-add close-modal pointer col-md-3 gambar-item" data-img="<?=$gambar_item->nama?>" data-url="<?=base_url('assets/upload/'.$gambar_item->nama)?>" data-dismiss="modal" aria-label="Close">
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