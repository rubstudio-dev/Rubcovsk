<?php
/**
 * Rubcovsk.Online - Городской портал, основанный на карте
 *
 * @author belomaxora
 */

class ModelCatalogOrganizationCat extends Model
{
	public function addOrganizationCat($data)
	{
	}

	public function editOrganizationCat($organization_cat_id, $data)
	{
	}

	public function deleteOrganizationCat($organization_cat_id)
	{
	}

	public function getOrganizationCat($organization_cat_id)
	{
	}

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

	public function getOrganizationCatDescriptions($organization_cat_id)
	{
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
