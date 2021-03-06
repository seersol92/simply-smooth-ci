<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email extends CI_Controller {

	 /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
		$this->load->model('email_model');
	//	$this->isLoggedIn();   
    }
	
	public function emailTemplates()
	{
		if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {        
            $searchText = $this->security->xss_clean($this->input->post('searchText'));
            $tempType = $this->security->xss_clean($this->input->post('temp_type'));

			$data['searchText'] = $searchText;

			$data['tempType'] = $tempType;

            $this->load->library('pagination');

            $count = count($this->email_model->templateListing($searchText, '', '', $tempType));

			$returns = $this->paginationCompress ( "email-management/", $count, 10 );
            
			$data['tempList'] = $this->email_model->templateListing
							    ($searchText, $returns["page"], $returns["segment"], $tempType);
            
			$this->global['pageTitle'] = 'Viral Marketer : Email Templates';

			$this->loadViews("email/listEmailTemplate", $this->global, $data , NULL);
        }
	}

	public function addTemplate ()
	{
		$this->global['pageTitle'] = 'Viral Marketer : Add Email Templates';

		$data['keyword'] = array(  'id' => 'Id',
                           'first_name' => 'First Name',
                           'last_name' => 'Last Name',
                           'email' => 'Email',
                           'date_register' => 'Date Register',
                           'ibm' => 'IBM',
                           'refer_by' => 'Referral\'s IBM'
                );
        $this->loadViews("email/addNewTemplates", $this->global, $data , NULL);
	}

	function  deleteTemplate($id)
    {
        if(!empty($id))
        {

            $data = array('is_active'=>'0', 'updated_at'=>date('Y-m-d H:i:s'));
            $result = $this->email_model->deleteTemplate($id, $data);
            if ($result > 0)
            {
                $this->session->set_flashdata('success', 'Template Deleted successfully');
            }  else
            {
                $this->session->set_flashdata('error', 'Something went Wrong.');
            }
            redirect('email-management');
        }
    }

	function addNewTemplate()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('temp_name','Full Name','trim|required|max_length[128]');
            $this->form_validation->set_rules('temp_content','Template Content','trim|required|min_length[10]');
           
            if($this->form_validation->run() == FALSE)
            {
                $this->addTemplate();
            }
            else
            {
                $name = strtolower($this->security->xss_clean($this->input->post('temp_name')));
                $type = strtolower($this->security->xss_clean($this->input->post('temp_type')));                
                $content = $this->security->xss_clean($this->input->post('temp_content'));
				$newTemp = array(
                                   'template_name'=>$name, 
								   'template_type'=>$type,                                    
								   'template_content'=>$content,
							 	   'created_at'=>date('Y-m-d H:i:s'),
								   'is_active'=> '1'
								);

                if($type == 2)
                {
                    $newTemp['time_delay'] = $this->security->xss_clean($this->input->post('time_delay'));
                }
                $result = $this->email_model->addNewTemp($newTemp);
                
                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'New E-mail template created successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Error, something went wrong!');
                }
                
                redirect('add-new-template');
            }
        }
	}
	
}
