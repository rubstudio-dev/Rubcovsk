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
		 *
		 * Пример:
		 * ~ {{ menu }} - родительские категории
		 * ~ {{ menu.child }} - дочерние категории
		 * ~ {{ menu.child.org }} - организации внутри категории
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
	 * Отображения контента меню
	 *
	 * @return array
	 */
	private function getMenu(): array
	{
		$this->load->model('catalog/organization_cat');

		// Получаем родительские категории
		$arrayData = array();
		$categoriesParent = $this->model_catalog_organization_cat->getOrganizationParentCats();

		foreach ($categoriesParent as $category) {
			$arrayData[] = array(
				// Родительские
				'id' => $category['id'],
				'name' => $category['name'],
				'alias' => $category['alias'],
				'desc' => $category['description'],
				'icon' => $category['icon'],
				// Дочерние категории (массив, в противном случае false)
				'child' => $this->getCatsChild($category['id']) ?? false
			);
		}

		return $arrayData;
	}

	/**
	 * Возвращает массив с дочерними категориями
	 *
	 * @param $cat_id
	 * @return array
	 */
	private function getCatsChild($cat_id): array
	{
		$this->load->model('catalog/organization_cat');

		// Получаем дочерние категории
		$arrayData = array();
		$categoriesChild = $this->model_catalog_organization_cat->getOrganizationsCats($cat_id);

		foreach ($categoriesChild as $category) {
			$arrayData[] = array(
				// Дочерние категории
				'id' => $category['id'],
				'name' => $category['name'],
				'alias' => $category['alias'],
				'desc' => $category['description'],
				'icon' => $category['icon'],
				// Организации (массив, в противном случае false)
				'org' => $this->getOrganizations($category['id']) ?? false
			);
		}

		return $arrayData;
	}

	/**
	 * Возвращает массив с организациями
	 *
	 * @param $child_id
	 * @return array
	 */
	private function getOrganizations($child_id): array
	{
		$this->load->model('catalog/organization');

		// Получаем организации
		$arrayData = array();
		$organizations = $this->model_catalog_organization->getOrganizationsByCatID($child_id);

		foreach ($organizations as $organization) {
			$arrayData[] = array(
				// Организации
				'id' => $organization['id'],
				'name' => $organization['name'],
				'alias' => $organization['alias'],
				'desc' => $organization['intro_desc']
			);
		}

		return $arrayData;
	}
}
