<?php
/**
 * Rubcovsk.Online - Городской портал, основанный на карте
 *
 * @author belomaxora
 */

class ControllerCatalogOrganizationCat extends Controller
{
	private $error = array();

	public function index()
	{
		$this->document->setTitle('Категории организаций');

		$this->load->model('catalog/organization_cat');

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

		$this->response->setOutput($this->load->view('catalog/organization_cat', $data));
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
