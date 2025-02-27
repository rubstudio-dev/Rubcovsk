<?php
/**
 * Rubcovsk.Online - Городской портал, основанный на карте
 *
 * @author belomaxora
 */

class ModelCatalogOrganization extends Model
{
	/**
	 * Создание организации
	 *
	 * @param $data
	 * @return mixed
	 */
	public function addOrganization($data)
	{
		$organization_id = $this->db->getLastId();

		$this->db->query("INSERT INTO " . DB_PREFIX . "org_items SET id = '" . (int)$organization_id . "', cat_id = '" . (int)$data['cat_id'] . "', name = '" . $this->db->escape($data['name']) . "', alias = '" . $this->db->escape($data['alias']) . "', intro_desc = '" . $this->db->escape($data['intro_desc']) . "'");

		return $organization_id;
	}

	/**
	 * Редактирование организации
	 *
	 * @param $organization_id
	 * @param $data
	 * @return void
	 */
	public function editOrganization($organization_id, $data)
	{
		$this->db->query("UPDATE " . DB_PREFIX . "org_items SET cat_id = '" . (int)$data['cat_id'] . "', name = '" . $this->db->escape($data['name']) . "', alias = '" . $this->db->escape($data['alias']) . "', intro_desc = '" . $this->db->escape($data['intro_desc']) . "' WHERE id = '" . (int)$organization_id . "'");
	}

	/**
	 * Удаляет организацию по ID
	 *
	 * @param $organization_id
	 * @return void
	 */
	public function deleteOrganization($organization_id)
	{
		$this->db->query("DELETE FROM " . DB_PREFIX . "org_items WHERE id = '" . (int)$organization_id . "'");
	}

	/**
	 * Получаем информацию об организации по ID
	 *
	 * @param $organization_id
	 * @return mixed
	 */
	public function getOrganization($organization_id)
	{
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "org_items WHERE id = '" . (int)$organization_id . "'");

		return $query->row;
	}

	/**
	 * Возвращает список организаций
	 *
	 * @param $data
	 * @return mixed
	 */
	public function getOrganizations($data = array())
	{
		$sql = "SELECT * FROM " . DB_PREFIX . "org_items";

		$sort_data = array(
			'name',
			'cat_id'
		);

		if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
			$sql .= " ORDER BY " . $data['sort'];
		} else {
			$sql .= " ORDER BY cat_id, name";
		}

		if (isset($data['order']) && ($data['order'] == 'DESC')) {
			$sql .= " DESC";
		} else {
			$sql .= " ASC";
		}

		if (isset($data['start']) || isset($data['limit'])) {
			if ($data['start'] < 0) {
				$data['start'] = 0;
			}

			if ($data['limit'] < 1) {
				$data['limit'] = 20;
			}

			$sql .= " LIMIT " . (int)$data['start'] . "," . (int)$data['limit'];
		}

		$query = $this->db->query($sql);

		return $query->rows;
	}

	/**
	 * Число организаций
	 *
	 * @return mixed
	 */
	public function getTotalOrganizations()
	{
		$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "org_items");

		return $query->row['total'];
	}

	/**
	 * Число организаций по ID категории
	 *
	 * @param $cat_id
	 * @return mixed
	 */
	public function getTotalOrganizationsByCatId($cat_id)
	{
		$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "org_items WHERE cat_id = '" . (int)$cat_id . "'");

		return $query->row['total'];
	}
}
