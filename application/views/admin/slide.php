<h3>Slide Produk</h3>
<br>
<form method="post">
<table class="table table-striped table-bordered" id="myTable">
	<thead>
		<tr>
			<th class="tb-check"><input id="all-check" class="check-true" type="checkbox"></th>
			<th>Slide</th>
			<th class="tb-act">Action</th>
		</tr>
	</thead>
	<tbody>
	<?php  foreach($slide as $slide_item):?>
		<tr>
			<td><input class="check in-check" type="checkbox" name="<?=$slide_item->id?>" value="<?=$slide_item->id?>"></td>
			<td><?=$slide_item->nama?></td>
			<td class="tb-act">
				<div class="btn-group btn-group-xs">
					<a href="edit-slide/<?=$slide_item->id?>" class="btn btn-primary btn-xs" title="Edit">
						<i class="fa fa-pencil fa-fw"></i></a>
					<button type="submit" class="btn btn-danger btn-xs" title="Hapus" name="del" value="<?=$slide_item->id?>">
						<i class="fa fa-times fa-fw"></i></button>
				</div>
			</td>
		</tr>
	<?php endforeach;?>
	</tbody>
</table>
<input type="hidden" class="in-del" name="in-del-all">
<input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>">
</form>
