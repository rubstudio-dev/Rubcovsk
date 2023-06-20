<?php
/**
 * Rubcovsk.Online - Городской портал, основанный на карте
 *
 * @author belomaxora
 */

class ControllerCatalogOrganization extends Controller
{
	private $error = array();

	public function index()
	{
		$this->document->setTitle('Список организаций');

		$this->load->model('catalog/organization');

		$this->getList();
	}

	public function add()
	{
	}

	public function edit()
	{
	}

	public function delete()
	{
	}

	protected function getList()
	{
		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('catalog/organization_list', $data));
	}

	protected function getForm()
	{
	}

	protected function validateForm()
	{
	}

	protected function validateDelete()
	{
	}

	public function autocomplete()
	{
	}
}
