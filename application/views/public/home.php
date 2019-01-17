<div class="container" style="margin-top:100px; margin-bottom:50px;">
<?php foreach ($produk as $produk_item):
		$gambar_produk = explode(',', $produk_item->gambar);
		$gambar_produk = $this->general->read('gambar', array('id' => $gambar_produk[0]));
?>
	<div class="col-md-3">
		<div class="img-produk-o">
			<img src="assets/upload/<?=$gambar_produk->nama?>" alt="" class="img">
		</div>
		<div class="detail-produk-o">
			<h4><?=$produk_item->nama?></h4>
			<p>Rp. <?=number_format($produk_item->harga)?></p>
			<a href="shopping-cart/<?=$produk_item->id?>">Beli</a>
		</div>
	</div>
<?php endforeach;?>
</div>