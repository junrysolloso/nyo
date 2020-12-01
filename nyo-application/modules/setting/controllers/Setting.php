<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Setting extends MY_Controller
{

  function __construct() {
    parent:: __construct();
    $this->load->model( 'Model_User_Meta' );
    $this->load->model( 'Model_User_Login' );
  }

  /**
   * USER REQUEST HANDLER
   */
  public function user() {

    // Sess::admin();
    
    // Check Server Request
    if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {

      // User Add
      if ( $this->input->post( 'user_add' ) ) {

        // Data for user meta
        $meta = array (
          'user_fname'  => strtolower( $this->input->post( 'user_fname' ) ),
          'user_email'  => $this->input->post( 'user_email' ),
          'user_phone'  => $this->input->post( 'user_phone' ),
          'user_photo'  => 'avatar.jpg',
          'user_add'    => strtolower( 'dinagat islands' ),
          'user_status' => strtolower( 'active' ),
        );

        // Data for user login
        $login = array(
          'login_name'  => strtolower( $this->input->post( 'user_name' ) ),
          'login_pass'  => $this->input->post( 'user_pass' ),
          'login_level' => strtolower( $this->input->post( 'user_level' ) ),
        );

        // Clean empty array
        $meta  = clean_array( $meta );
        $login = clean_array( $login );

        // Add user and return the save data
        if ( $this->Model_User_Meta->user_meta_add( $meta ) ) {
          $response = $this->Model_User_Login->user_login_add( $login );
          if ( $response ) {
          
            // Send Response and exit
            $this->_response( $response );
          }
        }
      }

      // User Update
      if ( $this->input->post( 'user_update' ) ) {

        // Check user address
        if ( empty( $this->input->post( 'u_user_add' ) ) ) {
          $address = 'dinagat islands';
        } else {
          $address = $this->input->post( 'u_user_add' );
        }

        // Check user status
        if ( empty( $this->input->post( 'u_user_status' ) ) ) {
          $status = 'pending';
        } else {
          $status = $this->input->post( 'u_user_status' );
        }

        // Data for user meta
        $meta = array (
          'user_id'     => $this->input->post( 'u_user_id' ),
          'user_email'  => $this->input->post( 'u_user_email' ),
          'user_phone'  => $this->input->post( 'u_user_phone' ),
          'user_fname'  => strtolower( $this->input->post( 'u_user_fname' ) ),
          'user_status' => strtolower( $status ),
          'user_add'    => strtolower( $address ),
        );

        // Data for user login
        $login = array(
          'user_id'     => $this->input->post( 'u_user_id' ),
          'login_name'  => strtolower( $this->input->post( 'u_user_name' ) ),
          'login_pass'  => $this->input->post( 'u_user_pass' ),
          'login_level' => strtolower( $this->input->post( 'u_user_level' ) ),
        );

        // Clean empty array
        $meta  = clean_array( $meta );
        $login = clean_array( $login );

        // Add user and return the save data
        if ( $this->Model_User_Meta->user_meta_update( $meta ) ) {
          $response = $this->Model_User_Login->user_login_update( $login );
          if ( $response ) {
          
            // Send Response and exit
            $this->_response( $response );
          }
        }
      }
      
      // Delete User
      if ( $this->input->post( 'user_delete' ) ) {
        $data = array (
          'user_id' => $this->input->post( 'user_id' ),
        );

        // Clean empty array
        $data = clean_array( $data );

        // Delete user data
        if ( $this->Model_User_Meta->user_meta_delete( $data ) ) {
          $response = $this->Model_User_Login->user_login_delete( $data );
          if ( $response ) {
          
            // Send Response and exit
            $this->_response( $response );
          }
        }
      }

      // Check User
      if ( $this->input->post( 'user_check' ) ) {
        $data = array (
          'value' => strtolower( $this->input->post( 'value' ) ),
        );
        
        // Clean empty array
        $data = clean_array( $data );

        // If user
        if ( strtolower( $this->input->post( 'user_check' ) == 'user' ) ) {
          
          // Check username if already exist
          if ( ! $this->Model_User_Login->user_check( $data ) ) {
            $data = array(
              'msg' => 'none',
            );

            // Send response
            $this->_response( $data );
          }
        } else {

          // Check email if already exist
          if ( ! $this->Model_User_Meta->email_check( $data ) ) {
            $data = array(
              'msg' => 'none',
            );

            // Send response
            $this->_response( $data );
          }
        }
      }

      // Update user status
      if ( $this->input->post( 'mark_uid' ) ) {
        if ( ! empty( $this->input->post( 'mark_uid' ) ) ) {

          // Update user status
          $this->Model_User_Meta->update_status( $this->input->post( 'mark_uid' ), 'complete' );
          if ( ! empty( $this->input->post( 'mark_bid' ) ) ) {

            // Update booking status
            if ( $this->Model_Booking->update_status( $this->input->post( 'mark_bid' ), 'complete' ) ) {
              $this->_response( array( 'msg' => 'success' ) );
            }
          }
        }
      }
    } 

    // Data to pass to view
    $data['title'] = 'Users';
    $data['class'] = 'users';
    $data['users'] = $this->Model_User_Login->user_get();
  
    // Load template parts
    $this->template->set_master_template( 'layouts/layout_admin' );
    $this->template->write( 'title', $data['title'] );
    $this->template->write( 'body_class', $data['class'] );

    $this->template->write_view( 'content', 'templates/template_topbar', $data );
    $this->template->write_view( 'content', 'templates/template_left_side' );
    $this->template->write_view( 'content', 'view_user' );
    $this->template->write_view( 'content', 'templates/template_footer' );
    $this->template->write_view( 'content', 'modals/modal_user' );

    // Additional JS
    $this->template->add_js( 'nyo-assets/js/pages/page_user.js' );
    $this->template->render();

  }

  /**
   * LOGS PAGE
   */
  public function log() {

    // Sess::admin();

    // Data to pass to view
    $data['title'] = 'Logs';
    $data['class'] = 'logs';
    $data['logs']  = $this->Model_Log->get_logs();
  
    // Load template parts
    $this->template->set_master_template( 'layouts/layout_admin' );
    $this->template->write( 'title', $data['title'] );
    $this->template->write( 'body_class', $data['class'] );

    $this->template->write_view( 'content', 'templates/template_topbar', $data );
    $this->template->write_view( 'content', 'templates/template_left_side' );
    $this->template->write_view( 'content', 'view_log' );
    $this->template->write_view( 'content', 'templates/template_footer' );
    $this->template->render();
    
  }

  /**
   * SERVER RESPONSE
   * @param array $data
   */
  private function _response( $data ) {
    
    // Response with JSON format data
    header( 'content-type: application/json' );
    exit( json_encode( $data ) );
  }

}

/* End of file Setting.php */
/* Location: ./application/modules/setting/controllers/Setting.php */
