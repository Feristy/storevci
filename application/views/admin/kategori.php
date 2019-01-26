<h3>Kategori</h3>
<br>
<div class="row">
	<div class="col-md-8">
		<div class="panel panel-default">
			<div class="panel-heading">Structure</div>
			<div class="panel-body">
				<form method="post">
					<div class="form-group">
						<ul class="menu_drop_targets p menu-list list-unstyled">
						<?php foreach ($kategori as $kategori_item):?>
							<li class="btn btn-default btn-lg btn-block" data-id="<?=$kategori_item->id?>">
								<span><?=$kategori_item->nama?></span>
								<div class="set-position btn-group btn-group-xs">
									<button type="button" class="btn btn-primary btn-table btn-edit" data-toggle="modal" data-target=".edit" data-id="<?=$kategori_item->id?>" data-name="<?=$kategori_item->nama?>"><i class="fa fa-pencil-alt"></i></button>
									<button type="submit" class="btn btn-danger btn-table" name="del" value="<?=$kategori_item->id?>"><i class="fa fa-times"></i></button>
								</div>
							</li>
						<?php endforeach;?>
							<input type="hidden" id="input_position" name="position">
						</ul>
					</div>
					<input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>">
					<button class="btn btn-primary" name="up" value="up">Update Position</button>
					<button type="button" class="btn btn-success btn-add" data-toggle="modal" data-target=".tambah">Tambah</button>
				</form>
			</div>
		</div>
	</div>
</div>
<div class="modal fade tambah edit">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <p class="modal-title"></p>
      </div>
      <div class="modal-body">
        <form method="post">
        	<div class="form-group">
        		<input type="text" class="form-control nama-ktg" name="nama">
        	</div>
        	<input type="hidden" class="id-ktg" name="id">
        	<input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>">
        	<button type="submit" class="btn btn-success submit-ktg btn-block" value="1"></button>
        </form>
      </div>
    </div>
  </div>
</div>