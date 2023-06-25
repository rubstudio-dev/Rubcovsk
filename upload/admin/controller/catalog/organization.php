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
		$this->load->model('catalog/organization_cat');

		$this->getList();
	}

	/**
	 * Добавление организации
	 *
	 * @return void
	 */
	public function add()
	{
		$this->document->setTitle('Список организаций');

		$this->load->model('catalog/organization');
		$this->load->model('catalog/organization_cat');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->checkPermission()) {
			$this->model_catalog_organization->addOrganization($this->request->post);

			$this->session->data['success'] = 'Вы успешно создали организацию';

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

			$this->response->redirect($this->url->link('catalog/organization', 'user_token=' . $this->session->data['user_token'] . $url, true));
		}

		$this->getForm();
	}

	/**
	 * Редактирование организации
	 *
	 * @return void
	 */
	public function edit()
	{
		$this->document->setTitle('Список организаций');

		$this->load->model('catalog/organization');
		$this->load->model('catalog/organization_cat');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->checkPermission()) {
			$this->model_catalog_organization->editOrganization($this->request->get['id'], $this->request->post);

			$this->session->data['success'] = 'Вы успешно отредактировали организацию';

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

			$this->response->redirect($this->url->link('catalog/organization', 'user_token=' . $this->session->data['user_token'] . $url, true));
		}

		$this->getForm();
	}

	/**
	 * Удаление организации
	 *
	 * @return void
	 */
	public function delete()
	{
		$this->document->setTitle('Список организаций');

		$this->load->model('catalog/organization');

		if (!isset($this->request->post['selected']) && !empty($this->request->get['id'])) {
			$this->request->post['selected'] = (array)$this->request->get['id'];
		}

		if (isset($this->request->post['selected']) && $this->checkPermission()) {
			foreach ($this->request->post['selected'] as $organization_id) {
				$this->model_catalog_organization->deleteOrganization($organization_id);
			}

			$this->session->data['success'] = 'Вы успешно удалили организацию';

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

			$this->response->redirect($this->url->link('catalog/organization', 'user_token=' . $this->session->data['user_token'] . $url, true));
		}

		$this->getList();
	}

	/**
	 * Формируем список организаций
	 *
	 * @return void
	 */
	protected function getList()
	{
		if (isset($this->request->get['sort'])) {
			$sort = $this->request->get['sort'];
		} else {
			$sort = 'name';
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
			'text' => 'Список организаций',
			'href' => $this->url->link('catalog/organization', 'user_token=' . $this->session->data['user_token'] . $url, true)
		);

		$data['add'] = $this->url->link('catalog/organization/add', 'user_token=' . $this->session->data['user_token'] . $url, true);
		$data['delete'] = $this->url->link('catalog/organization/delete', 'user_token=' . $this->session->data['user_token'] . $url, true);

		$data['organizations'] = array();

		$filter_data = array(
			'sort' => $sort,
			'order' => $order,
			'start' => ($page - 1) * $this->config->get('config_limit_admin'),
			'limit' => $this->config->get('config_limit_admin')
		);

		$organizations_total = $this->model_catalog_organization->getTotalOrganizations();

		$results = $this->model_catalog_organization->getOrganizations($filter_data);

		foreach ($results as $result) {
			$data['organizations'][] = array(
				'id' => $result['id'],
				'name' => $result['name'],
				'alias' => $result['alias'],
				'desc' => $result['intro_desc'],
				'cat_id' => $result['cat_id'] . '&nbsp;' . '(' . $this->model_catalog_organization_cat->getCatNameById($result['cat_id']) . ')',
				'delete' => $this->url->link('catalog/organization/delete', 'user_token=' . $this->session->data['user_token'] . '&id=' . $result['id'] . $url, true),
				'edit' => $this->url->link('catalog/organization/edit', 'user_token=' . $this->session->data['user_token'] . '&id=' . $result['id'] . $url, true)
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

		$data['sort_name'] = $this->url->link('catalog/organization', 'user_token=' . $this->session->data['user_token'] . '&sort=name' . $url, true);
		$data['sort_cat_id'] = $this->url->link('catalog/organization', 'user_token=' . $this->session->data['user_token'] . '&sort=cat_id' . $url, true);

		$url = '';

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

		$pagination = new Pagination();
		$pagination->total = $organizations_total;
		$pagination->page = $page;
		$pagination->limit = $this->config->get('config_limit_admin');
		$pagination->url = $this->url->link('catalog/organization', 'user_token=' . $this->session->data['user_token'] . $url . '&page={page}', true);

		$data['pagination'] = $pagination->render();

		$data['results'] = sprintf($this->language->get('text_pagination'), ($organizations_total) ? (($page - 1) * $this->config->get('config_limit_admin')) + 1 : 0, ((($page - 1) * $this->config->get('config_limit_admin')) > ($organizations_total - $this->config->get('config_limit_admin'))) ? $organizations_total : ((($page - 1) * $this->config->get('config_limit_admin')) + $this->config->get('config_limit_admin')), $organizations_total, ceil($organizations_total / $this->config->get('config_limit_admin')));

		$data['sort'] = $sort;
		$data['order'] = $order;

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('catalog/organization_list', $data));
	}

	/**
	 * Форма организации (Создание / Редактирование)
	 *
	 * @return void
	 */
	protected function getForm()
	{
		$data['text_form'] = !isset($this->request->get['id']) ? 'Создание организации' : 'Редактирование организации';

		$data['error_warning'] = '';

		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
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
			'text' => 'Список организаций',
			'href' => $this->url->link('catalog/organization', 'user_token=' . $this->session->data['user_token'] . $url, true)
		);

		if (!isset($this->request->get['id'])) {
			$data['action'] = $this->url->link('catalog/organization/add', 'user_token=' . $this->session->data['user_token'] . $url, true);
		} else {
			$data['action'] = $this->url->link('catalog/organization/edit', 'user_token=' . $this->session->data['user_token'] . '&id=' . $this->request->get['id'] . $url, true);
		}

		$data['cancel'] = $this->url->link('catalog/organization', 'user_token=' . $this->session->data['user_token'] . $url, true);

		if (isset($this->request->get['id']) && ($this->request->server['REQUEST_METHOD'] != 'POST')) {
			$organization_info = $this->model_catalog_organization->getOrganization($this->request->get['id']);
		}

		if (isset($this->request->post['cat_id'])) {
			$data['organization_cat_id'] = $this->request->post['cat_id'];
		} elseif (!empty($organization_info)) {
			$data['organization_cat_id'] = $organization_info['cat_id'];
		} else {
			$data['organization_cat_id'] = '';
		}

		if (isset($this->request->post['name'])) {
			$data['organization_name'] = htmlspecialchars($this->request->post['name']);
		} elseif (!empty($organization_info)) {
			$data['organization_name'] = htmlspecialchars($organization_info['name']);
		} else {
			$data['organization_name'] = '';
		}

		if (isset($this->request->post['alias'])) {
			$data['organization_alias'] = $this->request->post['alias'];
		} elseif (!empty($organization_info)) {
			$data['organization_alias'] = $organization_info['alias'];
		} else {
			$data['organization_alias'] = '';
		}

		if (isset($this->request->post['intro_desc'])) {
			$data['organization_intro_desc'] = $this->request->post['intro_desc'];
		} elseif (!empty($organization_info)) {
			$data['organization_intro_desc'] = $organization_info['intro_desc'];
		} else {
			$data['organization_intro_desc'] = '';
		}

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('catalog/organization_form', $data));
	}

	/**
	 * Проверка прав
	 *
	 * @return bool
	 */
	protected function checkPermission()
	{
		if (!$this->user->hasPermission('modify', 'catalog/organization')) {
			$this->error['warning'] = 'Недостаточно прав!';
		}

		return !$this->error;
	}

	public function autocomplete()
	{
	}
}
