<?=$msg?>
<h3><?=$title1?></h3>
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
			<div class="panel panel-default">
  				<div class="panel-body">
					<button type="button" class="btn btn-default" data-toggle="modal" data-target=".tambah-gambar">Tambah Gambar</button>
					<div class="gambar-produk">
						<?php 
						if(!empty($gambar_produk)):
							$pos = 0; 
							foreach ($gambar_produk as $gambar_produk_item):?>
							<div class="col-md-3 gambar-item img-list" id="<?=$gambar_produk_item->id?>">
								<img src="<?=base_url('assets/upload/'.$gambar_produk_item->nama)?>" alt="" class="img">
								<button type="button" class="delete-gambar btn-unstyle" data-id="#<?=$gambar_produk_item->id?>" data-pos="<?=$pos?>"><span aria-hidden="true">&times;</span></button>
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
        <div class="title-modal"><b>Gambar</b> <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
      </div>
      <div class="modal-body">
      	<a href="<?=site_url('admin/gambar')?>" target="blank" class="btn btn-default">Upload Gambar</a>
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
    </div>
  </div>
</div>