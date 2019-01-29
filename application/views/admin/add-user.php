<?=$msg?>
<h3><?=$title1?></h3>
<br>
<form method="post">
<div class="row">
	<div class="col-md-6">
		<h4>Informasi Pribadi</h4>
		<div class="form-group">
			<label>Nama Pengguna</label>
			<input type="text" class="form-control" name="name" value="<?=@$user->username?>">
		</div>
		<div class="form-group">
			<label>email</label>
			<input type="text" class="form-control" name="email" value="<?=@$user->email?>">
		</div>
		<div class="form-group">
			<label>Phone</label>
			<input type="text" class="form-control" name="phone" value="<?=@$user->phone?>">
		</div>
		<div class="form-group">
			<label>Gender</label>
			<select class="form-control" name="gender">
				<option <?=$gender?>>Laki - Laki</option>
				<option <?=$gender1?>>Perempuan</option>
			</select>
		</div>
		<div class="form-group">
			<label>Alamat</label>
			<input type="text" class="form-control" name="alamat" value="<?=@$user->alamat?>">
		</div>
		<div class="form-group">
			<label>Gambar Produk</label>
  			<div class="gambar-user">
  			<?php if(!empty($gambar_user)):?>
  				<img src="<?=base_url('assets/upload/'.$gambar_user->nama)?>" alt="" class="img" width="171"><br><br>
  			<?php endif;?>
  			</div>
  			<input type="hidden" class="input-gambar" name="gambar" value="<?=@$user->gambar?>">
			<button type="button" class="btn btn-default add-img-user" data-toggle="modal" data-target=".tambah-gambar">Tambah Gambar</button>
		</div>
		<div class="form-group">
			<label>Tentang</label>
			<textarea class="form-control" rows="3" name="about"><?=@$user->about?></textarea>
		</div>
		<br>
		<h4>Password</h4>
		<?php if(!empty($id)):?>
		<div class="form-group">
			<label>Password Lama</label>
			<input type="password" class="form-control" name="last">
		</div>
		<?php endif;?>
		<div class="form-group">
			<label>Password</label>
			<input type="password" class="form-control" name="pass">
		</div>
		<div class="form-group">
			<label>Konfrimasi Password</label>
			<input type="password" class="form-control" name="confirm">
		</div>
		<input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>">
		<button type="submit" class="btn btn-success btn-lg" name="<?=$submit?>" value="1"><?=$title_submit?></button>
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
			<div class="img-user close-modal pointer col-md-3 gambar-item" data-url="<?=base_url('assets/upload/'.$gambar_item->nama)?>" data-dismiss="modal" aria-label="Close">
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