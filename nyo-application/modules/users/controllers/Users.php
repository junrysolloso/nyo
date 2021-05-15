<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends MY_Controller
{

  function __construct() {
    parent:: __construct(); 
    Sess::admin();
    $this->load->model( 'Model_User_Login' );
    $this->load->model( 'Model_User_Meta' );
  }

	/**
	 * Index page
	 */
  public function index() {
    
    $config['view'] = 'index';
    $config['title'] = 'Users';
		$config['body_class'] = 'users';
    $config['users'] = $this->Model_User_Login->user_get();

		$this->views( $config );
  }

  /**
   * Add
   */
  public function add() {

    if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {

      // User Add
      if ( $this->input->post( 'user_fname' ) ) {

        // Data for user meta
        $meta = array (
          'user_fname'  => strtolower( $this->input->post( 'user_fname' ) ),
          'user_email'  => $this->input->post( 'user_email' ),
          'user_phone'  => $this->input->post( 'user_phone' ),
          'user_photo'  => 'avatar.jpg',
          'user_add'    => strtolower( 'dinagat islands' ),
          'user_status' => strtolower( 'active' ),
          'login_name'  => strtolower( $this->input->post( 'user_name' ) )
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
          if ( $this->Model_User_Login->user_login_add( $login ) ) {
            $this->session->set_flashdata( 
              array( 
                'msg' => 'User successfully added.',
                'cls' => 'success'
              ) 
            );
            redirect( 'users' );
          }
        }
      }
    }

    $config['view'] = 'add';
    $config['title'] = 'Add User';
		$config['body_class'] = 'users';

    $this->views( $config );
    
  }

  /**
   * Edit
   */
  public function edit() {

    if ( $_SERVER['REQUEST_METHOD'] == 'GET' ) {

      if ( $this->input->get( 'id' ) ) {
        $data = $this->Model_User_Meta->get_user_details( $this->input->get( 'id' ) );
      }
    } else {

      if ( $this->input->post( 'user_id' ) ) {

        // Data for user meta
        $meta = array (
          'user_id'     => $this->input->post( 'user_id' ),
          'user_email'  => $this->input->post( 'user_email' ),
          'user_phone'  => $this->input->post( 'user_phone' ),
          'user_fname'  => strtolower( $this->input->post( 'user_fname' ) ),
        );

        // Data for user login
        $login = array(
          'user_id'     => $this->input->post( 'user_id' ),
          'login_name'  => strtolower( $this->input->post( 'user_name' ) ),
          'login_pass'  => $this->input->post( 'user_pass' ),
          'login_level' => strtolower( $this->input->post( 'user_level' ) ),
        );

        // Clean empty array
        $meta  = clean_array( $meta );
        $login = clean_array( $login );

        // Add user and return the save data
        if ( $this->Model_User_Meta->user_meta_update( $meta ) ) {
          if ( $this->Model_User_Login->user_login_update( $login ) ) {
            $this->session->set_flashdata( 
              array( 
                'msg' => 'User successfully updated.',
                'cls' => 'success'
              ) 
            );
            redirect( 'users' );
          }
        }
      }
    }

    $config['view'] = 'edit';
    $config['title'] = 'Edit User';
		$config['body_class'] = 'users';
    $config['user'] = $data;

    $this->views( $config );
  }

  /**
   * Delete
   */
  public function delete() {

    if ( $_SERVER['REQUEST_METHOD'] == 'GET' ) {

      if ( $this->input->get( 'id' ) ) {

        $data = array(
          'user_id' => $this->input->get( 'id' )
        );

        if ( $this->Model_User_Login->user_login_delete( $data ) ) {
          if ( $this->Model_User_Meta->user_meta_delete( $data ) ) {
            $this->session->set_flashdata( 
              array( 
                'msg' => 'User successfully deleted.',
                'cls' => 'success'
              ) 
            );
            redirect( 'users' );
          }
        }
      }
    }
  }

  /**
   * Views
   */
  private function views( $config = [] ) {

    $this->template->set_master_template( 'layouts/layout_admin' );
		$this->template->write( 'title', $config['title'] ); 
    $this->template->write_view( 'content', 'templates/template_topbar', $config );
    $this->template->write_view( 'content', 'templates/template_left_side' );

    if ( $config['view'] === 'add' ) {
      $this->template->write_view( 'content', 'view_add' );
    } else if ( $config['view'] === 'edit' ) {
      $this->template->write_view( 'content', 'view_edit' );
    } else {
      $this->template->write_view( 'content', 'view_users' );
    }

    $this->template->write_view( 'content', 'templates/template_footer' );
    $this->template->add_js( 'nyo-assets/js/pages/page_user.js' );
		$this->template->render();

  }

  /**
   * Server response
   */
  private function _response( $data ) {
    
    // Response with JSON format data
    header( 'content-type: application/json' );
    exit( json_encode( $data ) );
  }

}
