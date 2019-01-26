<?=$msg?>
<h3>Gambar Produk</h3>
<br>
<form method="post">
<table class="table table-striped table-bordered" id="myTable">
	<thead>
		<tr>
			<th class="tb-check"><input id="all-check" class="check-true" type="checkbox"></th>
			<th>Nama Gambar</th>
			<th class="tb-act">Action</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach($gambar as $gambar_item):?>
		<tr>
			<td><input class="check in-check" type="checkbox" name="<?=$gambar_item->id?>" value="<?=$gambar_item->id?>"></td>
			<td><a href="<?=base_url('assets/upload/'.$gambar_item->nama)?>" target="blank"><?=$gambar_item->nama?></a></td>
			<td class="tb-act">
				<button type="submit" class="btn btn-danger btn-table" title="Hapus" name="del" value="<?=$gambar_item->id?>"><i class="fa fa-times fa-fw"></i></button>
			</td>
		</tr>
	<?php endforeach;?>
	</tbody>
</table>
<input type="hidden" class="in-del" name="in-del-all">
<input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>">
</form>