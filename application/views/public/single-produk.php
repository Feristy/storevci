<div class="container">
	<div class="row">
		<div class="col-md-6">
			<?php $img = $general->read('gambar', array('id' => $produk->gambar))->nama ?>
			<img src="<?=base_url('assets/upload/'.$img)?>" class="img">
			<div class="tmb-single-produk"></div>
		</div>
		<div class="col-md-6">
			<h1><?=$produk->nama?></h1>
			<div class="detail-single-produk">
				<div class="harga-single-produk"><?=$produk->harga?></div>
				<div class="form-group">
					<
				</div>
			</div>
		</div>
	</div>
</div>