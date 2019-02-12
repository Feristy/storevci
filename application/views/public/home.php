<div class="home-slide">
	<?php foreach($slide as $slide_item):?>
		<div class="li-slide mySlides fades" style="background:url('<?=base_url('assets/upload/'.$slide_item->img)?>');">
			<div class="slide-content">
				<h1><?=$slide_item->title?></h1>
				<h5><?=$slide_item->sub_title?></h5>
				<a href="#" class="btn btn-success"><?=$slide_item->btn_text?></a>
			</div>
		</div>
	<?php endforeach;?>
</div>
<div class="home-ctg container">
	<div class="row">
			<div class="col-md-4 li-home-ctg">
				<div class="li-ctg" style="background:url('<?=base_url('assets/upload/item-2.jpg')?>');">
					<h3>Fashion</h3>
				</div>
			</div>
			<div class="col-md-4 li-home-ctg">
				<div class="li-ctg" style="background:url('<?=base_url('assets/upload/item-3.jpg')?>');">
					<h3>Fashion</h3>
				</div>
			</div>
			<div class="col-md-4 li-home-ctg">
				<div class="li-ctg" style="background:url('<?=base_url('assets/upload/item-4.jpg')?>');">
					<h3>Fashion</h3>
				</div>
			</div>
	</div>
</div>
<div class="home-product container">
	<div class="row">
	<?php foreach($produk as $produk_item):
		$gambar = explode(',', $produk_item->gambar);
		$gambar = $general->read('gambar', array('id' => $gambar[0]))->nama;
		?>
		<div class="col-md-3 h-product">
			<a href="<?=site_url('cart/'.$produk_item->id)?>">
				<div class="h-product-img"><img src="<?=base_url('assets/upload/'.$gambar)?>" class="img" alt=""></div>
				<div class="h-product-text">
					<p><strong><?=$produk_item->nama?></strong></p>
					<p>Rp. <?=number_format($produk_item->harga)?></p>
				</div>
			</a>
		</div>
	<?php endforeach;?>
	</div>
</div>