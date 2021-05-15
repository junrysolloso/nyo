<!-- start edit user -->
<form action="" method="post" id="form-user-update">
  <?php foreach( $user as $row ): ?>
  <div class="row">
    <div class="col-4">
      <div class="card rounded shadow-sm">
        <div class="card-body">
          <img src="<?php echo base_url(); ?>nyo-uploads/<?php echo $row->user_photo; ?>" id="user_preview" style="height: calc(100vw - 70vw); width: 100%; object-fit: cover; border: 1px solid #cfd5db; border-radius: 6px;" />
        </div>  
      </div>
    </div>
    <div class="col-8">
      <div class="card rounded shadow-sm">
        <div class="card-body">
          <div class="form-group">
            <label for="user_fname">Full Name</label>
            <div class="input-group">
              <input type="hidden" name="user_id" value="<?php echo $row->user_id; ?>">
              <input type="text" name="user_fname" class="form-control" value="<?php echo $row->user_fname; ?>" id="user_fname" required />
              <div class="input-group-append">
                <span class="input-group-text">
                  <i class="mdi mdi-check-circle-outline mdi-18px"></i>
                </span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="user_email">Email Address</label>
            <div class="input-group">
              <input type="text" name="user_email" class="form-control" value="<?php echo $row->user_email; ?>" id="user_email" required />
              <div class="input-group-append">
                <span class="input-group-text">
                  <i class="mdi mdi-check-circle-outline mdi-18px"></i>
                </span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="user_phone">Phone Number</label>
            <div class="input-group">
              <input type="text" name="user_phone" class="form-control" value="<?php echo $row->user_phone; ?>" id="user_phone" required />
              <div class="input-group-append">
                <span class="input-group-text">
                  <i class="mdi mdi-check-circle-outline mdi-18px"></i>
                </span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="user_status">User Status</label>
            <div class="input-group">
              <select type="text" name="user_status" min="6" max="8" class="form-control select2" id="user_status" data-room-select-id="1" tabindex="-1" aria-hidden="true" required>
                <?php if ( $row->user_status == 'active' ): ?>
                  <option value="Active" data-room-select-id="1">Active</option>
                  <option value="Inactive" data-room-select-id="2">Inactive</option>
                <?php else: ?>
                  <option value="Inactive" data-room-select-id="2">Inactive</option>
                  <option value="Active" data-room-select-id="1">Active</option>
                <?php endif; ?>
              </select>
              <div class="input-group-append">
                <span class="input-group-text">
                  <i class="mdi mdi-check-circle-outline mdi-18px"></i>
                </span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="user_name">User Name</label>
            <div class="input-group">
              <input type="hidden" name="user_name" class="form-control" value="<?php echo $row->login_name; ?>" />
              <input type="text" name="username" class="form-control" value="<?php echo $row->login_name; ?>" id="user_name" disabled />
              <div class="input-group-append">
                <span class="input-group-text">
                  <i class="mdi mdi-check-circle-outline mdi-18px"></i>
                </span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="user_pass">Password</label>
            <div class="input-group">
              <input type="password" name="user_pass" class="form-control" id="user_pass" />
              <div class="input-group-append">
                <span class="input-group-text">
                  <i class="mdi mdi-check-circle-outline mdi-18px"></i>
                </span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="user_pcon">Confirm Password</label>
            <div class="input-group">
              <input type="password" name="user_pcon" class="form-control" id="user_pcon" />
              <div class="input-group-append">
                <span class="input-group-text">
                  <i class="mdi mdi-check-circle-outline mdi-18px"></i>
                </span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="user_level">User Level</label>
            <div class="input-group">
              <select type="text" name="user_level" min="6" max="8" class="form-control select2" id="user_level" data-room-select-id="1" tabindex="-1" aria-hidden="true" required>
                <?php if ( $row->login_level == 'user' ): ?> 
                  <option value="User" data-room-select-id="1">User</option>
                  <option value="Administrator" data-room-select-id="2">Administrator</option>
                <?php else: ?>
                  <option value="Administrator" data-room-select-id="2">Administrator</option>
                  <option value="User" data-room-select-id="1">User</option>
                <?php endif; ?>               
              </select>
              <div class="input-group-append">
                <span class="input-group-text">
                  <i class="mdi mdi-check-circle-outline mdi-18px"></i>
                </span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="user_photo">Photo</label>
            <div class="input-group">
              <input type="file" accept=".jpg, .png" name="user_photo" class="form-control file-upload-browse" id="user_photo" required="" style="content-visibility: hidden;">
              <div class="input-group-append">
                <span class="input-group-text">Browse Photo</span>
              </div>
            </div>
          </div>
          <div class="pt-2">
            <input type="submit" name="user_submit" value="Update User" class="btn btn-success submit-btn float-left">
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php endforeach; ?>
</form>
<!-- end edit user -->