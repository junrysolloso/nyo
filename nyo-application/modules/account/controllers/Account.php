<?php if ( ! defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );

class Account extends MY_Controller 
{

	function __construct() {
		parent::__construct();

		$this->load->model( 'booking/Model_Booking' );
		$this->load->model( 'settings/Model_Payment' );
		$this->load->model( 'settings/Model_User_Meta' );
	}

	/**
	 * INDEX PAGE
	 */
	public function index() {

		Sess::booker();

		$data['title']  		= 'Account Details';
		$data['body_class']	= 'account';
		$data['status'] 		= $this->Model_Booking->check_status( $this->session->userdata( 'user_id' ) );
		$data['bookings'] 	= $this->Model_Booking->get_bookings( $this->session->userdata( 'user_id' ) ,'booker' );
		$data['payments']		= $this->Model_Payment->get_payments( $this->session->userdata( 'user_id' ), 'booker' );
		$data['profile']		= $this->Model_User_Meta->get_user_details( $this->session->userdata( 'user_id' ) );

		$this->template->set_master_template( 'layouts/layout_site' );
		$this->template->write( 'title', $data['title'] ); 
		$this->template->write_view( 'content', 'view_account', $data );

		// Modals
		$this->template->write_view( 'content', 'modals/modal_account_edit' );

		$this->template->add_js( 'nyo-assets/js/pages/page_account.js' );
		$this->template->render();
	}

}

/* End of file Account.php */
/* Location: ./application/modules/account/controllers/Account.php */
