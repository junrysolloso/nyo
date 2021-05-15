<!-- start of log tab -->
<div class="card rounded">
  <div class="card-body">
    <div class="form-group">
      <div class="input-group">
        <input type="text" name="data_search" class="form-control" id="logs" placeholder="Search anything from the table...">
        <div class="input-group-append">
          <span class="input-group-text">
            <i class="mdi mdi-magnify-plus mdi-18px"></i>
          </span>
        </div>
      </div>
    </div>
    <div class="table-responsive">
      <table class="table table-striped table-bordered" id="logs-table">
        <thead>
          <tr>
            <th>NO.</th>
            <th>USERNAME</th>
            <th>DATE AND TIME</th>
            <th>ACTIVITY</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $count = 1;
            foreach ( $logs as $row ) {
              echo '<tr>';
              echo '<td>'. $count .'</td>';
              echo '<td>'. ucwords( $row->login_name ) .'</td>';
              echo '<td class="text-info">'. date_format( date_create ( $row->log_date ), 'Y-m-d @ H:i:s A' ) .'</td>';
              echo '<td class="text-success">'. ucwords ( $row->log_task ) .'</td>';
              echo '</tr>';
              $count++;
            }
          ?>
        </tbody>
      </table>
    </div> 
  </div>
</div>
<!-- end of log tab -->