<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Migration_Install_Setup extends CI_Migration 
{
	/**
	 * UPGRADE DATABASE
	 */
	public function up() {

		// Attributes
		$attributes = array( 'ENGINE' => 'MyISAM', 'DEFAULT CHARSET' => 'utf8' );

		// Table fields
		$tables = array(

			'chapter' => array( 
				"`chapter_id` INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
				"`chapter_code` VARCHAR(30) NOT NULL",
				"`chapter_name` VARCHAR(30) NOT NULL",
				"`chapter_address` VARCHAR(255) NOT NULL",
				"`chapter_photo` VARCHAR(32) NOT NULL",
			),
			
			'pbma_membership' => array(
				"`pbma_membership_id` INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
				"`pbma_date_registered` DATE NOT NULL",
				"`pbma_id_number` SMALLINT(8) NOT NULL",
			),
			
			'nyo_membership' => array(
				"`nyo_membership_id` INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
				"`nyo_date_registered` DATE NOT NULL",
				"`nyo_or_number` VARCHAR(15) NOT NULL",
				"`nyo_issued_by` VARCHAR(15) NOT NULL",
				"`nyo_special_skills` VARCHAR(60) NOT NULL",
			),
			
			'member_meta' => array(
				"`member_id` INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
				"`member_first_name` VARCHAR(30) NOT NULL",
				"`member_last_name` VARCHAR(30) NOT NULL",
				"`member_middle_name` VARCHAR(15) NOT NULL",
				"`member_place_of_birth` VARCHAR(255) NOT NULL",
				"`member_present_address` VARCHAR(255) NOT NULL",
				"`member_gender` VARCHAR(8) NOT NULL",
				"`member_blood_type` VARCHAR(15) NOT NULL",
				"`member_distinctive_marks` VARCHAR(30) NOT NULL",
				"`member_phone_number` VARCHAR(15) NOT NULL",
				"`member_educ_attainment` VARCHAR(60) NOT NULL",
				"`member_occupation` VARCHAR(20) NOT NULL",
				"`member_name_extension` CHAR(2) NOT NULL",
				"`member_prof_title` VARCHAR(30) NOT NULL",
				"`member_date_of_birth` DATE NOT NULL",
				"`member_civil_status` CHAR(10) NOT NULL",
				"`member_height` VARCHAR(8) NOT NULL",
				"`member_weight` VARCHAR(8) NOT NULL",
				"`member_citizenship` CHAR(15) NOT NULL",
				"`member_color_of_eyes` CHAR(8) NOT NULL",
				"`member_email_address` VARCHAR(15) NOT NULL",
				"`member_course` VARCHAR(30) NOT NULL",
				"`member_degree` VARCHAR(60) NOT NULL",
				"`member_religion` CHAR(20) NOT NULL",
				"`member_left_thumb` VARCHAR(30) NOT NULL",
				"`member_right_thumb` VARCHAR(30) NOT NULL",
				"`member_signature` VARCHAR(30) NOT NULL",
				"`member_photo` VARCHAR(30) NOT NULL",
				"`member_position` CHAR(15) NOT NULL",
				"`member_status` CHAR(15) NOT NULL",
				"`chapter_id` INT(11) NOT NULL",
				"`pbma_membership_id` INT(11) NOT NULL",
				"`nyo_membership_id` INT(11) NOT NULL",
			),
			
			'user_meta' => array(
				"`user_id` INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
				"`user_fname` VARCHAR(60) NOT NULL",
				"`user_phone` VARCHAR(30) NOT NULL",
				"`user_email` VARCHAR(30) NOT NULL",
				"`user_add` VARCHAR(255) NOT NULL",
				"`user_photo` VARCHAR(100) NOT NULL",
				"`user_status` CHAR(15) NOT NULL",
				"`member_id` INT(11) NOT NULL",
			),
			
			'user_login' => array(
				"`login_id` INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
				"`login_name` VARCHAR(20) NOT NULL",
				"`login_pass` CHAR(32) NOT NULL",
				"`login_level` VARCHAR(25) NOT NULL",
				"`user_id` INT(11) NOT NULL",
			),
			
			'logs' => array(
				"`log_id` INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
				"`log_date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP",
				"`log_task` VARCHAR(60) NOT NULL",
				"`user_id` INT(11) NOT NULL",
			),
			
			'auth_attempts' => array(
				"`auth_id` INT(2) NOT NULL PRIMARY KEY AUTO_INCREMENT",
				"`auth_attempts` TINYINT(2) NOT NULL",
				"`auth_date` DATETIME NOT NULL",
				"`auth_user` VARCHAR(60) NOT NULL",
			),
			
			'sessions' => array(
				"`id` VARCHAR(128) NOT NULL",
				"`ip_address` VARCHAR(45) NOT NULL",
				"`timestamp` INT(10) unsigned DEFAULT 0 NOT NULL",
				"`data` blob NOT NULL",
				"PRIMARY KEY (id)",
				"KEY `ci_sessions_timestamp` (`timestamp`)",
			),
		);

		// Create tables
		foreach ( $tables as $table => $fields ) {
			$this->dbforge->add_field( $fields );
			$this->dbforge->create_table( $table, TRUE, $attributes );
		}

		// Pre-insert data for default admin user
		$this->db->simple_query( 'INSERT INTO `tbl_user_login` (`login_name`, `login_pass`, `login_level`, `user_id`) VALUES ("admin", "21232f297a57a5a743894a0e4a801fc3", "administrator", 1)' );
		$this->db->simple_query( 'INSERT INTO `tbl_user_meta` (`user_fname`, `user_phone`, `user_email`, `user_add`, `user_photo`, `user_status`) VALUES ("system admin", "+639108973533", "junry.s.solloso@gmail.com", "san jose, dinagat islands", "avatar.jpg", "active")' );
	}

	/**
	 * DOWNGRADE DATABASE
	 */
	public function down() {

		// Tables
		$tables = array('tbl_settings', 'tbl_rooms', 'tbl_bookings', 'tbl_payments', 'tbl_logs', 'tbl_user_meta', 'tbl_user_login', 'tbl_auth_attempts', 'tbl_sessions');

		// Drop table
		foreach ( $tables as $table ) {
			$this->dbforge->drop_table( $table );
		}
  }
  
}

/* End of file 001_install_setup.php */
/* Location: ./application/migrations/001_install_setup.php */