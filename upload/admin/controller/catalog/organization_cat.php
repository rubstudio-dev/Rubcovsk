<?php
/**
 * Rubcovsk.Online - Городской портал, основанный на карте
 *
 * @author belomaxora
 */

class ControllerCatalogOrganizationCat extends Controller
{
	private $error = array();

	/**
	 * Отображение списка категорий
	 *
	 * @return void
	 */
	public function index()
	{
		$this->document->setTitle('Категории организаций');

		$this->load->model('catalog/organization_cat');

		$this->getList();
	}

	/**
	 * Добавление категории
	 *
	 * @return void
	 */
	public function add()
	{
		$this->document->setTitle('Категории организаций');

		$this->load->model('catalog/organization_cat');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->checkPermission() && $this->checkForm()) {
			$this->model_catalog_organization_cat->addOrganizationCat($this->request->post);

			$this->session->data['success'] = 'Вы успешно создали категорию';

			$url = '';

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}

			$this->response->redirect($this->url->link('catalog/organization_cat', 'user_token=' . $this->session->data['user_token'] . $url, true));
		}

		$this->getForm();
	}

	/**
	 * Редактирование категории
	 *
	 * @return void
	 */
	public function edit()
	{
		$this->document->setTitle('Категории организаций');

		$this->load->model('catalog/organization_cat');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->checkPermission() && $this->checkForm()) {
			$this->model_catalog_organization_cat->editOrganizationCat($this->request->get['id'], $this->request->post);

			$this->session->data['success'] = 'Вы успешно отредактировали категорию';

			$url = '';

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}

			$this->response->redirect($this->url->link('catalog/organization_cat', 'user_token=' . $this->session->data['user_token'] . $url, true));
		}

		$this->getForm();
	}

	/**
	 * Удаление категории
	 *
	 * @return void
	 */
	public function delete()
	{
		$this->document->setTitle('Категории организаций');

		$this->load->model('catalog/organization_cat');

		if (!isset($this->request->post['selected']) && !empty($this->request->get['id'])) {
			$this->request->post['selected'] = (array)$this->request->get['id'];
		}

		if (isset($this->request->post['selected']) && $this->checkPermission()) {
			foreach ($this->request->post['selected'] as $organization_cat_id) {
				$this->model_catalog_organization_cat->deleteOrganizationCat($organization_cat_id);
			}

			$this->session->data['success'] = 'Вы успешно удалили категорию';

			$url = '';

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}

			$this->response->redirect($this->url->link('catalog/organization_cat', 'user_token=' . $this->session->data['user_token'] . $url, true));
		}

		$this->getList();
	}

	/**
	 * Формируем список категорий
	 *
	 * @return void
	 */
	protected function getList()
	{
		if (isset($this->request->get['sort'])) {
			$sort = $this->request->get['sort'];
		} else {
			$sort = 'id';
		}

		if (isset($this->request->get['order'])) {
			$order = $this->request->get['order'];
		} else {
			$order = 'ASC';
		}

		if (isset($this->request->get['page'])) {
			$page = (int)$this->request->get['page'];
		} else {
			$page = 1;
		}

		$url = '';

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], true)
		);

		$data['breadcrumbs'][] = array(
			'text' => 'Категории организаций',
			'href' => $this->url->link('catalog/organization_cat', 'user_token=' . $this->session->data['user_token'] . $url, true)
		);

		$data['add'] = $this->url->link('catalog/organization_cat/add', 'user_token=' . $this->session->data['user_token'] . $url, true);
		$data['delete'] = $this->url->link('catalog/organization_cat/delete', 'user_token=' . $this->session->data['user_token'] . $url, true);

		$data['organizations_cats'] = array();

		$filter_data = array(
			'sort' => $sort,
			'order' => $order,
			'start' => ($page - 1) * $this->config->get('config_limit_admin'),
			'limit' => $this->config->get('config_limit_admin')
		);

		$organizations_cats_total = $this->model_catalog_organization_cat->getTotalOrganizationsCats();

		$results = $this->model_catalog_organization_cat->getOrganizationsCats($filter_data);

		foreach ($results as $result) {
			$data['organizations_cats'][] = array(
				'id' => $result['id'],
				'name' => $result['name'],
				'alias' => $result['alias'],
				'desc' => $result['description'],
				'delete' => $this->url->link('catalog/organization_cat/delete', 'user_token=' . $this->session->data['user_token'] . '&id=' . $result['id'] . $url, true),
				'edit' => $this->url->link('catalog/organization_cat/edit', 'user_token=' . $this->session->data['user_token'] . '&id=' . $result['id'] . $url, true)
			);
		}

		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}

		if (isset($this->session->data['success'])) {
			$data['success'] = $this->session->data['success'];

			unset($this->session->data['success']);
		} else {
			$data['success'] = '';
		}

		if (isset($this->request->post['selected'])) {
			$data['selected'] = (array)$this->request->post['selected'];
		} else {
			$data['selected'] = array();
		}

		$url = '';

		if ($order == 'ASC') {
			$url .= '&order=DESC';
		} else {
			$url .= '&order=ASC';
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}

		$data['sort_name'] = $this->url->link('catalog/organization_cat', 'user_token=' . $this->session->data['user_token'] . '&sort=name' . $url, true);
		$data['sort_id'] = $this->url->link('catalog/organization_cat', 'user_token=' . $this->session->data['user_token'] . '&sort=id' . $url, true);

		$url = '';

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

		$pagination = new Pagination();
		$pagination->total = $organizations_cats_total;
		$pagination->page = $page;
		$pagination->limit = $this->config->get('config_limit_admin');
		$pagination->url = $this->url->link('catalog/organization_cat', 'user_token=' . $this->session->data['user_token'] . $url . '&page={page}', true);

		$data['pagination'] = $pagination->render();

		$data['results'] = sprintf($this->language->get('text_pagination'), ($organizations_cats_total) ? (($page - 1) * $this->config->get('config_limit_admin')) + 1 : 0, ((($page - 1) * $this->config->get('config_limit_admin')) > ($organizations_cats_total - $this->config->get('config_limit_admin'))) ? $organizations_cats_total : ((($page - 1) * $this->config->get('config_limit_admin')) + $this->config->get('config_limit_admin')), $organizations_cats_total, ceil($organizations_cats_total / $this->config->get('config_limit_admin')));

		$data['sort'] = $sort;
		$data['order'] = $order;

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('catalog/organization_cat_list', $data));
	}

	/**
	 * Форма категории (Создание / Редактирование)
	 *
	 * @return void
	 */
	protected function getForm()
	{
		$data['text_form'] = !isset($this->request->get['id']) ? 'Создание категории' : 'Редактирование категории';

		$data['error_warning'] = '';

		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		}
		if (isset($this->error['required_fields'])) {
			$data['error_warning'] = $this->error['required_fields'];
		}

		$url = '';

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], true)
		);

		$data['breadcrumbs'][] = array(
			'text' => 'Категории организаций',
			'href' => $this->url->link('catalog/organization_cat', 'user_token=' . $this->session->data['user_token'] . $url, true)
		);

		if (!isset($this->request->get['id'])) {
			$data['action'] = $this->url->link('catalog/organization_cat/add', 'user_token=' . $this->session->data['user_token'] . $url, true);
		} else {
			$data['action'] = $this->url->link('catalog/organization_cat/edit', 'user_token=' . $this->session->data['user_token'] . '&id=' . $this->request->get['id'] . $url, true);
		}

		$data['cancel'] = $this->url->link('catalog/organization_cat', 'user_token=' . $this->session->data['user_token'] . $url, true);

		if (isset($this->request->get['id']) && ($this->request->server['REQUEST_METHOD'] != 'POST')) {
			$organization_cat_info = $this->model_catalog_organization_cat->getOrganizationCat($this->request->get['id']);
		}

		if (isset($this->request->post['name'])) {
			$data['cat_name'] = $this->request->post['name'];
		} elseif (!empty($organization_cat_info)) {
			$data['cat_name'] = $organization_cat_info['name'];
		} else {
			$data['cat_name'] = '';
		}

		if (isset($this->request->post['alias'])) {
			$data['cat_alias'] = $this->request->post['alias'];
		} elseif (!empty($organization_cat_info)) {
			$data['cat_alias'] = $organization_cat_info['alias'];
		} else {
			$data['cat_alias'] = '';
		}

		if (isset($this->request->post['description'])) {
			$data['cat_description'] = $this->request->post['description'];
		} elseif (!empty($organization_cat_info)) {
			$data['cat_description'] = $organization_cat_info['description'];
		} else {
			$data['cat_description'] = '';
		}

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('catalog/organization_cat_form', $data));
	}

	/**
	 * Проверка прав
	 *
	 * @return bool
	 */
	protected function checkPermission()
	{
		if (!$this->user->hasPermission('modify', 'catalog/organization_cat')) {
			$this->error['warning'] = 'Недостаточно прав!';
		}

		return !$this->error;
	}

	/**
	 * Проверка формы (Создание / Редактирование)
	 *
	 * @return bool
	 */
	protected function checkForm()
	{
		if (!$this->request->post['name'] || !$this->request->post['alias']) {
			$this->error['required_fields'] = 'Заполните обязательные поля!';
		}

		return !$this->error;
	}
}
