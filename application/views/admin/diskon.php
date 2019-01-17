<h3>Diskon Produk</h3>
<br>
<form method="post">
<table class="table table-striped table-bordered" id="myTable">
	<thead>
		<tr>
			<th class="tb-check"><input id="all-check" class="check-true" type="checkbox"></th>
			<th>Nama Produk</th>
			<th class="tb-ctg">Diskon</th>
			<th class="tb-act">Action</th>
		</tr>
	</thead>
	<tbody>
	<?php  foreach($produk as $produk_item):
			if($produk_item->diskon != 0):?>
		<tr>
			<td><input class="check in-check" type="checkbox" name="<?=$produk_item->id?>" value="<?=$produk_item->id?>"></td>
			<td><?=$produk_item->nama?></td>
			<td><?=$produk_item->diskon?> %</td>
			<td class="tb-act">
				<div class="btn-group btn-group-xs">
					<a href="edit-produk/<?=$produk_item->id?>" class="btn btn-primary btn-xs" title="Edit">
						<i class="fa fa-pencil fa-fw"></i></a>
					<button type="submit" class="btn btn-danger btn-xs" title="Hapus" name="del" value="<?=$produk_item->id?>">
						<i class="fa fa-times fa-fw"></i></button>
				</div>
			</td>
		</tr>
	<?php endif;
			endforeach;?>
	</tbody>
</table>
<input type="hidden" class="in-del" name="in-del-all">
<input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>">
</form>
