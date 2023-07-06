<?php
/**
 * Rubcovsk.Online - Городской портал, основанный на карте
 *
 * @author belomaxora
 */

class ModelCatalogOrganizationCat extends Model
{
	/**
	 * Получаем информацию об категории по ID
	 *
	 * @param $organization_cat_id
	 * @return mixed
	 */
	public function getOrganizationCat($organization_cat_id)
	{
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "org_categories WHERE id = '" . (int)$organization_cat_id . "'");

		return $query->row;
	}

	/**
	 * Возвращает список категорий
	 *
	 * @param $data
	 * @return mixed
	 */
	public function getOrganizationsCats($data = array())
	{
		$sql = "SELECT * FROM " . DB_PREFIX . "org_categories";

		$sort_data = array(
			'name',
			'id'
		);

		if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
			$sql .= " ORDER BY " . $data['sort'];
		} else {
			$sql .= " ORDER BY id, name";
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
	 * Получаем название категории по id
	 *
	 * @param $cat_id
	 * @return false|mixed
	 */
	public function getCatNameById($cat_id)
	{
		$query = $this->db->query("SELECT name FROM " . DB_PREFIX . "org_categories WHERE id = $cat_id");

		return $query->row['name'] ?? false;
	}

	/**
	 * Получаем название родительской категории по id
	 *
	 * @param $cat_parent_id
	 * @return false|mixed
	 */
	public function getParentCatById($cat_parent_id)
	{
		$query = $this->db->query("SELECT name FROM " . DB_PREFIX . "org_categories WHERE id = $cat_parent_id");

		return $query->row['name'] ?? false;
	}

	/**
	 * Общее число категорий
	 *
	 * @return mixed
	 */
	public function getTotalOrganizationsCats()
	{
		$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "org_categories");

		return $query->row['total'];
	}
}
