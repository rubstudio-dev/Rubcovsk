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

		// Получаем список организаций для вывода в меню
		$data['organizations'] = $this->getOrganizations();

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
	 * Возвращает список организаций
	 *
	 * @return array
	 */
	public function getOrganizations()
	{
		$this->load->model('catalog/organization');
		$this->load->model('catalog/organization_cat');

		$arrayOrganizations = array();
		$organizations = $this->model_catalog_organization->getOrganizations();

		foreach ($organizations as $result) {
			$arrayOrganizations[] = array(
				'id' => $result['id'],
				'name' => $result['name'],
				'alias' => $result['alias'],
				'desc' => $result['intro_desc'],
				'category' => $this->model_catalog_organization_cat->getCatNameById($result['cat_id'])
			);
		}

		return $arrayOrganizations;
	}
}
