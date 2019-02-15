<?=$msg?>
<h3 class="dib"><?=$title1?></h3>
<a href="<?=site_url('admin/tambah-produk/')?>" class="btn btn-success">Tambah</a>
<br>
<br>
<form method="post">
<div class="row">
	<div class="col-md-8">
		<div class="form-group">
			<label>Nama Produk</label>
			<input type="text" class="form-control" name="name" value="<?=@$produk->nama?>">
		</div>
		<div class="form-group">
			<label>Deskripsi Produk</label>
			<textarea class="form-control" name="tentang" rows="10" style="resize:vertical;"><?=@$produk->deskripsi?></textarea>
		</div>
		<div class="form-group">
			<label>Gambar Produk</label>
			<button type="button" class="btn btn-secondary" data-toggle="modal" data-target=".tambah-gambar">Tambah Gambar</button>
				
				<div class="gambar-produk">
					<?php 
					if(!empty($gambar_produk)):
						$pos = 0; 
						foreach ($gambar_produk as $gambar_produk_item):?>
						<div class="col-md-3 col-sm-3 gambar-item img-list" id="<?=$gambar_produk_item->id?>">
							<img src="<?=base_url('assets/upload/'.$gambar_produk_item->nama)?>" alt="" class="img">
							<div class="img-select"></div>
							<button type="button" class="delete-gambar btn-unstyle" data-id="#<?=$gambar_produk_item->id?>" data-pos="<?=$pos?>"><i class="fas fa-times"></i></button>
						</div>
					<?php 
						$pos++;
						endforeach;
					endif;
					?>
					<div class="clearfix"></div>
				</div>
				<input type="hidden" class="img-pos">
				<input type="hidden" name="gambar" class="input-gambar" value="<?=@$produk->gambar?>">
			
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group">
			<label>Kategori Produk</label>
			<select class="form-control" name="kategori">
				<?php foreach ($kategori as $kategori_item){
						$select = $kategori_item->nama == $produk->kategori ? 'selected="selected"': '';
						echo '<option '.$select.'>'.$kategori_item->nama.'</option>';
					}?>
			</select>
		</div>
		<div class="form-group">
			<label>Harga Produk</label>
			<input type="number" class="form-control" name="harga" value="<?=@$produk->harga?>">
		</div>
		<div class="form-group">
			<label>Stok Produk</label>
			<input type="number" class="form-control" name="stok" value="<?=@$produk->stok?>">
		</div>
		<div class="form-group">
			<label>Berat Produk</label>
			<input type="number" class="form-control" name="berat" title="gram" value="<?=@$produk->berat?>">
		</div>
		<div class="form-group">
			<label>Ukuran</label>
			<div class="input-group mb-3">
			  <input type="text" class="form-control input-tag-size" aria-describedby="button-addon2">
			  <div class="input-group-append">
			    <button class="btn btn-outline-secondary btn-tag-size" type="button" id="button-addon2">Submit</button>
			  </div>
			</div>
			<div class="form-tag-size"></div>
			<input type="hidden" class="input-size" name="ukuran">
		</div>
		<div class="form-group">
			<label>Warna</label>
			<div class="form-group">
				<input type="color" class="form-input-color">
			</div>
			<div class="form-tag-color"></div>
			<input type="hidden" name="warna" class="input-color">
		</div>
		<div class="form-group">
			<label>Diskon Produk</label>
			<input type="number" class="form-control" name="diskon" title="persen" value="<?=@$produk->diskon?>">
		</div>
		<div class="form-group">
			<label>Action</label>
			<br>
			<input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>">
			<button type="submit" class="btn btn-success btn-lg" name="<?=$submit?>" value="1"><?=$title_submit?></button>
			<a href="<?=site_url('admin/produk')?>" class="btn btn-danger btn-lg">Batal</a>
		</div>
	</div>
</div>
</form>
<div class="modal fade tambah-gambar" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <div class="modal-title"><b>Gambar</b> <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button></div>
      </div>
      <div class="modal-body">
      	<div class="row">
			<?php foreach ($gambar as $gambar_item):?>
			<div class="img-produk close-modal pointer col-md-3 gambar-item" data-id="<?=$gambar_item->id?>" data-url="<?=base_url('assets/upload/'.$gambar_item->nama)?>" data-dismiss="modal" aria-label="Close">
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