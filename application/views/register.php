<div class="container">

  <div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
      <!-- Nested Row within Card Body -->
      <div class="row">
        <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
        <div class="col-lg-7">
          <div class="p-5">
          <a href="<?=site_url('home')?>">&larr; Back to Dashboard</a>
            <div class="text-center">
              <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
            </div>
            <?php echo form_open('register/create'); ?>
              <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="nama" value="<?php echo set_value('name');?>" name="nama" placeholder="FullName" required>
              </div>
              <div class="form-group">
                <input type="email" class="form-control form-control-user" id="email" name="email" value="<?php echo set_value('email');?>" placeholder="Email Address" required>
                <span class="text text-danger"><?php echo form_error('email'); ?></span>
              </div>
              <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" id="password" name="password" value="<?php echo set_value('password');?>" placeholder="Password" required>
                    <span class="text text-danger"><?php echo form_error('password'); ?></span>
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" id="re_password" name="repassword" value="<?php echo set_value('repassword');?>" placeholder="Repeat Password" required>
                    <span class="text text-danger"><?php echo form_error('repassword'); ?></span>
                  </div>
              </div>
              <button type="submit" class="btn btn-primary btn-user btn-block">
                Register Account
              </button>
            </form>
            <hr>
            <div class="text-center">
              <a class="small" href="<?=base_url('index.php/login')?>">Already have an account? Login!</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
