<!-- start of user tab -->
<form action="#" method="post" id="form-user-add">
  <div class="row">
    <div class="col-6">
      <div class="form-group">
        <label for="user_fname">Full Name</label>
        <div class="input-group">
          <input type="hidden" name="user_id">
          <input type="text" name="user_fname" class="form-control" id="user_fname" required="">
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
          <input type="text" name="user_email" class="form-control" id="user_email" required="">
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
          <input type="text" name="user_phone" class="form-control" id="user_phone" required="">
          <div class="input-group-append">
            <span class="input-group-text">
              <i class="mdi mdi-check-circle-outline mdi-18px"></i>
            </span>
          </div>
        </div>
      </div>
    </div>
    <div class="col-6">
      <div class="form-group">
        <label for="user_name">User Name</label>
        <div class="input-group">
          <input type="text" name="user_name" class="form-control" id="user_name" required="">
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
          <input type="password" name="user_pass" min="6" max="8" class="form-control" id="user_pass" required="">
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
          <input type="password" name="user_pcon" min="6" max="8" class="form-control" id="user_pcon" required="">
          <div class="input-group-append">
            <span class="input-group-text">
              <i class="mdi mdi-check-circle-outline mdi-18px"></i>
            </span>
          </div>
        </div>
      </div>
    </div>
    <div class="col-12">
      <div class="form-group">
        <label for="user_level">User Level</label>
        <div class="input-group">
          <select type="text" name="user_level" class="form-control select2" id="user_level" data-room-select-id="1"
            tabindex="-1" aria-hidden="true" required>
            <option value="" data-room-select-id="0">Select</option>
            <option value="User" data-room-select-id="1">User</option>
            <option value="Administrator" data-room-select-id="2">Administrator</option>
          </select>
          <div class="input-group-append">
            <span class="input-group-text">
              <i class="mdi mdi-check-circle-outline mdi-18px"></i>
            </span>
          </div>
        </div>
      </div>
    </div>
    <div class="col-12 pt-2">
      <input type="submit" name="user_submit" value="Add User" class="btn btn-success submit-btn float-right">
    </div>
  </div>
</form>

<div class="table-responsive mt-4">
  <table class="table table-striped table-bordered" id="user-table">
    <thead>
      <tr>
        <th>FULL NAME</th>
        <th>PHONE</th>
        <th>USER LEVEL</th>
        <th>USERNAME</th>
        <th>VIEW</th>
      </tr>
    </thead>
    <tbody>
      <?php
          foreach ( $users as $row ) {
            echo '<tr>';
            echo '<td><img class="profile-image rounded-circle img-sm" src="'. base_url() .'nyo-uploads/'. $row->user_photo .'"> '. ucwords( $row->user_fname ) .'</td>';
            echo '<td>'. $row->user_phone .'</td>';
            echo '<td class="text-warning">'. $row->login_level .'</td>';
            echo '<td class="text-info">'. ucwords( $row->login_name ) .'</td>';
            echo '<td><span class="user-details" u-id="'. $row->user_id .'" u-fname="'. ucwords( $row->user_fname ) .'" u-phone="'. $row->user_phone .'" u-email="'. $row->user_email .'" u-name="'. ucfirst( $row->login_name ) .'" u-status="'. ucwords( $row->user_status ) .'" u-level="'. ucwords( $row->login_level ) .'" ><i class="mdi mdi-eye mdi-18px"></i> View</span></td>';
            echo '</tr>';
          }
        ?>
    </tbody>
  </table>
</div>
<!-- end of user tab -->
