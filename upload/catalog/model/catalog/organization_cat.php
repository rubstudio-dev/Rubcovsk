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
	 * Возвращает все родительские категории
	 *
	 * @return mixed
	 */
	public function getOrganizationParentCats(): mixed
	{
		$sql = "SELECT * FROM " . DB_PREFIX . "org_categories WHERE parent_id = 0";

		$query = $this->db->query($sql);

		return $query->rows;
	}

	/**
	 * Возвращает список дочерних категорий на основе ID родителя
	 *
	 * @param $parent_cat_id
	 * @return mixed
	 */
	public function getOrganizationsCats($parent_cat_id): mixed
	{
		$sql = "SELECT * FROM " . DB_PREFIX . "org_categories WHERE parent_id = '" . (int)$parent_cat_id . "'";

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
