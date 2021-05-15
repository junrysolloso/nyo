<?php if ( ! defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );

class Model_Log extends MY_Model
{

  /**
   * Class properties
   */
  protected $table    = 'tbl_logs';
  protected $user_id  = 'user_id';
  protected $log_date = 'log_date';
  protected $log_task = 'log_task';

  protected $relate_table = 'tbl_user_login';

  function __construct() {
    parent:: __construct();
  }

  /**
   * Add
   */
  public function add_log( $activity = NULL ) {
    if ( ! empty( $activity ) ) {
      $data = array(
        $this->log_date => date( 'Y-m-d H:i:s' ),
        $this->log_task => $activity,
        $this->user_id  => intval( $this->session->userdata( 'user_id' ) ),
      );
      if ( $this->db->insert( $this->table, $data ) ) {
        return true;
      }
    }
  } 

  /**
   * Get logs
   */
  public function get_logs() {

    // Data to view
    $this->db->select( '`log_id`, `login_name`, `log_date`, `log_task`' );
    $this->join( $this->relate_table, '`tbl_user_login`.`user_id`=`tbl_logs`.`user_id`' );
    $this->order_by( '`log_id`', 'DESC' )->limit( 108 );
    $query = $this->db->get( $this->table );

    if ( $query ) {
      return $query->result();
    }
  }

}
