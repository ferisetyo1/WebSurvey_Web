<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Tambah Komoditas</h1>
<div class="col-lg-6">
    <?php echo form_open('tambah/input'); ?>
    <?php if($this->session->flashdata('message')!==null){?>
        <div class="alert <?php echo ($this->session->flashdata('error')!==null?'alert-danger':'alert-success');?>" role="alert">
            <?php echo $this->session->flashdata('message'); ?>
        </div>
    <?php } ?>
    <div class="form-group">
        <label for="nama">Nama Komoditas</label>
        <input type="text" class="form-control" id="nama" name="nama"  placeholder="Masukkan nama" required>
    </div>
    <div class="form-group">
        <label for="harga">Harga</label>
        <input type="number" class="form-control" id="harga" name="harga" placeholder="Masukkan harga" required>
    </div>
    <div class="form-group">
        <label for="tanggal">Tanggal</label>
        <input type="date" class="form-control datepicker"  id="tanggal" name="tanggal" value="<?= date("Y-m-d"); ?>" required>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</div>
<!-- /.container-fluid -->