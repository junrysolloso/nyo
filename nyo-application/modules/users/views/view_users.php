<!-- start of user tab -->
<div class="card rounded shadow-sm">
  <div class="card-body">
    <div class="table-responsive">
      <table class="table" id="user-table">
        <thead>
          <tr>
            <th>FULL NAME</th>
            <th>PHONE</th>
            <th>EMAIL</th>
            <th>USER LEVEL</th>
            <th>USERNAME</th>
            <th>SETTINGS</th>
          </tr>
        </thead>
        <tbody>
          <?php
              foreach ( $users as $row ) {
                echo '<tr>';
                echo '<td><img class="profile-image rounded-circle img-sm" src="'. base_url() .'nyo-uploads/'. $row->user_photo .'"> '. ucwords( $row->user_fname ) .'</td>';
                echo '<td>'. $row->user_phone .'</td>';
                echo '<td>'. $row->user_email .'</td>';
                echo '<td class="text-warning">'. $row->login_level .'</td>';
                echo '<td class="text-info">'. ucwords( $row->login_name ) .'</td>';
                echo '<td>';
                echo '<a class="btn btn-default icon-btn dropdown-toggle user-settings" id="user-settings-'. $row->user_id .'" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><i class="mdi mdi-settings"></i></a>';
                echo '<div class="dropdown-menu" aria-labelledby="user-settings-'. $row->user_id .'" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 34px, 0px);">';
                echo '<a class="dropdown-item pt-2" href="users/edit/?id='. $row->user_id .'"><i class="mdi mdi-pencil"></i> Update</a>';
                
                if ( $row->user_id != 1 ) {
                  echo '<a class="dropdown-item pb-2" href="users/delete/?id='. $row->user_id .'"><i class="mdi mdi-trash-can"></i> Delete</a>';
                }

                echo '</div>';
                echo '</td>';
                echo '</tr>';
              }
            ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<!-- end of user tab -->
