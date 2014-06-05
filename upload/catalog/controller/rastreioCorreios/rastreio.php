<?php 
class ControllerRastreioCorreiosRastreio extends Controller {

	public function index() {

		if (!$this->customer->isLogged()) {
			$this->session->data['redirect'] = $this->url->link('rastreioCorreios/rastreio', '', 'SSL');

			$this->redirect($this->url->link('account/login', '', 'SSL'));
		}

		$this->language->load('rastreioCorreios/rastreio');
		
		$this->document->setTitle($this->language->get('heading_title'));
		
		$this->data['breadcrumbs'] = array();

		$this->data['breadcrumbs'][] = array(
			'text'      => $this->language->get('text_home'),
			'href'      => $this->url->link('common/home'),			
			'separator' => FALSE
		);
		
		$this->data['breadcrumbs'][] = array(
			'text'      => $this->language->get('heading_title'),
			'href'      => $this->url->link('rastreioCorreios/rastreio'),			
			'separator' => $this->language->get('text_separator')
		);
		
		$this->load->model('catalog/rastreioCorreios');

		$this->data['text_codigo'] 	 = $this->language->get('text_codigo');
		$this->data['heading_title'] = $this->language->get('heading_title');
		$this->data['text_info']     = $this->language->get('text_info');
		$this->data['text_button']   = $this->language->get('text_button');

		if(isset($this->request->post['codigo'])){
			$this->data['resultPost'] = $this->model_catalog_rastreioCorreios->getPost($this->request->post['codigo']);
		}else{
			$this->data['resultPost'] = false;
		}

		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/rastreioCorreios/rastreio.tpl')) {
				$this->template = $this->config->get('config_template') . '/template/rastreioCorreios/rastreio.tpl';
			} else {
				$this->template = 'default/template/rastreioCorreios/rastreio.tpl';
		}	
					
		$this->children = array(
		'common/column_right',
		'common/column_left',
		'common/content_top',
		'common/content_bottom',
		'common/footer',
		'common/header'
		);
			
		$this->response->setOutput($this->render(TRUE), $this->config->get('config_compression'));			
    	
	}
}
?>

