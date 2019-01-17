<h3>Pengguna</h3>
<br>
<form method="post">
<table class="table table-striped table-bordered" id="myTable">
	<thead>
		<tr>
			<th class="tb-check"><input id="all-check" class="check-true" type="checkbox"></th>
			<th>Nama Pengguna</th>
			<th class="tb-act">Action</th>
		</tr>
	</thead>
	<tbody>
	<?php  foreach($user as $user_item): $role = $user_item->role == 1 ? ' disabled="disabled"': '';?>
		<tr>
			<td><input class="check in-check" type="checkbox" name="<?=$user_item->id?>" value="<?=$user_item->id?>"<?=$role?>></td>
			<td><?=$user_item->username?></td>
			<td class="tb-act">
				<div class="btn-group btn-group-xs">
					<a href="edit-pengguna/<?=$user_item->id?>" class="btn btn-primary btn-xs" title="Edit"<?=$role?>>
						<i class="fa fa-pencil fa-fw"></i></a>
					<button type="submit" class="btn btn-danger btn-xs" title="Hapus" name="del" value="<?=$user_item->id?>"<?=$role?>>
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
