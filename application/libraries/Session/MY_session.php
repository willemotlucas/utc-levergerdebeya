<?php  
class MY_Session extends CI_Session {
	function testAdminLogged()
	{		
		if(!$this->has_userdata('userLogged'))
		{
			redirect('Home');
		}
		else if (!(strcmp($this->userdata('userLogged')->type, 'admin') == 0 ))
		{
			redirect('Home');
		}

	}
}