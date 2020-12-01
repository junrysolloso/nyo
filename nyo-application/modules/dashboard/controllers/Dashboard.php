<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends MY_Controller
{

  function __construct() {
    parent:: __construct(); 

    //Sess::admin();

  }

	/**
	 * Index for the dashboard page
	 */
  public function index() {

    $data['title']    = 'Dashboard';
    $data['class']    = 'dashboard';

    // Load template parts
    $this->template->set_master_template( 'layouts/layout_admin' );
    $this->template->write( 'title', $data['title'] );
    $this->template->write( 'body_class', $data['class'] );

    $this->template->write_view( 'content', 'templates/template_topbar', $data );
    $this->template->write_view( 'content', 'templates/template_left_side' );
    $this->template->write_view( 'content', 'view_dashboard' );
    $this->template->write_view( 'content', 'templates/template_footer' );

    // Add additional assests for this page
    $this->template->add_js( 'nyo-assets/vendors/chart.js/Chart.min.js' );
    $this->template->add_js( 'nyo-assets/js/pages/page_dashboard.js' );

		$this->template->render();
  }

}

/* End of file Dashboard.php */
/* Location: ./application/modules/dashboard/controllers/Dashboard.php */
