<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Boarder extends MY_Controller
{

  function __construct() {
    parent:: __construct(); 

    // Load models
    $this->load->model( 'booking/Model_Booking' );
    $this->load->model( 'settings/Model_Payment' );
  }

	/**
	 * PENDING BOOKING PAGE
	 */
  public function list() {

    Sess::admin();

    $data['title']  = 'List of Boarders';
    $data['class']  = 'boarder';
    $data['recent'] = $this->Model_Booking->get_bookings( NULL, 'active' );
    $data['list']   = $this->Model_Booking->get_bookings( NULL, 'list' );
    $data['years']  = $this->Model_Payment->get_years();
    $data['months'] = $this->Model_Payment->get_months();

    // Load template parts
    $this->template->set_master_template( 'layouts/layout_admin' );
    $this->template->write( 'title', $data['title'] );
    $this->template->write( 'body_class', $data['class'] );

    $this->template->write_view( 'content', 'templates/template_topbar', $data );
    $this->template->write_view( 'content', 'templates/template_left_side' );
    $this->template->write_view( 'content', 'view_borader_list' );
    $this->template->write_view( 'content', 'templates/template_right_side' );
    $this->template->write_view( 'content', 'templates/template_footer' );
    
    // Modal
    $this->template->write_view( 'content', 'modals/modal_boarder_details' );
    $this->template->write_view( 'content', 'modals/modal_payment' );
    $this->template->write_view( 'content', 'modals/modal_date' );

    // Add JS 
    $this->template->add_js( 'nyo-assets/js/pages/page_list.js' );
		$this->template->render();
  }

}

/* End of file Boarder.php */
/* Location: ./application/modules/boarder/controllers/Boarder.php */
