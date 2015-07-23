<?php
class Pages extends CI_Controller {

        public function view($page = 'home')
		{
	        if ( ! file_exists(APPPATH.'/views/pages/'.$page.'.php'))
	        {
	                // Whoops, we don't have a page for that!
	                show_404();
	        }

	        $data['title'] = ucfirst($page); // Capitalize the first letter

	        $this->load->view('templates/header', $data);
	        $this->load->view('pages/'.$page, $data);
	        $this->load->view('templates/footer', $data);
		}

		public function index()
	  	{
	   
	    /* Connect to the mySQL database - config values can be found at:
	      /application/config/database.php */
	    $dbconnect = $this->load->database();


	    /* Load the database model:
	      /application/models/simple_model.php */
	    $this->load->model('News_model');
	    

	    /* Create a table if it doesn't exist already */
	    // $this->Simple_model->create_table();
	    
	    
	    /* Call the "insert_item" entry */
	    $this->News_model->insert_item('Hello from Runnable!');

	    /* Retrieve the last item  */
	    print '<pre>';
	    print_r($this->News_model->get_last_item());
	    print '</pre>';

	    /* Retrieve and print the row count */
	    $rowcount = $this->News_model->get_row_count();
	    print '<strong>Row count: ' . $rowcount . '</strong>';
	    }


}