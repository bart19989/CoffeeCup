<?php
class MY_loader extends CI_Loader{
	public function render_view($body, $data, $return = FALSE){
		$template	=	$this->view('templates/header', $data, $return);
		$template	=	$this->view('templates/top_menu', $data, $return);
		$template	=	$this->view('templates/side_menu', $data, $return);
		$template	=	$this->view( $body, $data, $return);
		$template	=	$this->view('templates/footer', $data, $return);
		
		if($return){
			return $template;
		}
	}
}

?>