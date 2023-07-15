<?php
/**
 * Rubcovsk.Online - Городской портал, основанный на карте
 *
 * @author belomaxora
 */

class ModelCatalogOrganization extends Model
{
	/**
	 * Получаем информацию об всех организация по ID категории
	 *
	 * @param $cat_id
	 * @return mixed
	 */
	public function getOrganizationsByCatID($cat_id)
	{
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "org_items WHERE cat_id = '" . (int)$cat_id . "' ORDER BY name");

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
