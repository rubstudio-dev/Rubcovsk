<?php

class ControllerCommonHome extends Controller
{
	public function index()
	{
		$this->document->setTitle($this->config->get('config_meta_title'));
		$this->document->setDescription($this->config->get('config_meta_description'));
		$this->document->setKeywords($this->config->get('config_meta_keyword'));

		if (isset($this->request->get['route'])) {
			$this->document->addLink($this->config->get('config_url'), 'canonical');
		}

		// ==== [Начало] Дубль данных с header.php ====
		// Адрес сайта
		if ($this->request->server['HTTPS']) {
			$server = $this->config->get('config_ssl');
		} else {
			$server = $this->config->get('config_url');
		}

		// Название сайта
		$data['name'] = $this->config->get('config_name');

		// Лого сайта
		if (is_file(DIR_IMAGE . $this->config->get('config_logo'))) {
			$data['logo'] = $server . 'image/' . $this->config->get('config_logo');
		} else {
			$data['logo'] = '';
		}
		// ==== [Конец] Дубль данных с header.php ====

		/**
		 * Отображаем меню
		 */
		$data['menu'] = $this->getMenu();

		/**
		 * ========= Не используется =========
		 *
		 * $data['column_left'] = $this->load->controller('common/column_left');
		 * $data['column_right'] = $this->load->controller('common/column_right');
		 * $data['content_top'] = $this->load->controller('common/content_top');
		 * $data['content_bottom'] = $this->load->controller('common/content_bottom');
		 */

		$data['footer'] = $this->load->controller('common/footer');
		$data['header'] = $this->load->controller('common/header');

		$this->response->setOutput($this->load->view('common/home', $data));
	}

	/**
	 * Динамическая подгрузка дочерних категорий
	 *
	 * @return void
	 */
	public function ajaxGetChild(): void
	{
		$this->load->model('catalog/organization_cat');

		if (isset($this->request->post['parent_id'])) {
			$data = $this->model_catalog_organization_cat->getOrganizationsCats($this->request->post['parent_id']);

			$this->response->addHeader('Content-Type: application/json');
			$this->response->setOutput(json_encode([
				'success' => true,
				'message' => 'ok',
				'parent_id' => $this->request->post['parent_id'],
				'data' => $data
			]));
		}
	}

	/**
	 * Динамическая подгрузка организаций внутри категории
	 *
	 * @return void
	 */
	public function ajaxGetOrgs(): void
	{
		$this->load->model('catalog/organization');

		if (isset($this->request->post['child_id'])) {
			$data = $this->model_catalog_organization->getOrganizationsByCatID($this->request->post['child_id']);

			$this->response->addHeader('Content-Type: application/json');
			$this->response->setOutput(json_encode([
				'success' => true,
				'message' => 'ok',
				'child_id' => $this->request->post['child_id'],
				'data' => $data
			]));
		}
	}

	/**
	 * Отображения контента меню
	 *
	 * @return array
	 */
	private function getMenu(): array
	{
		$this->load->model('catalog/organization');
		$this->load->model('catalog/organization_cat');

		$arrayData = array();
		$categoriesParent = $this->model_catalog_organization_cat->getOrganizationParentCats();

		foreach ($categoriesParent as $category) {
			$arrayData[] = array(
				'id' => $category['id'],
				'name' => $category['name'],
				'alias' => $category['alias'],
				'desc' => $category['description']
			);
		}

		return $arrayData;
	}
}
