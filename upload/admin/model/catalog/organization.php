<?php
/**
 * Rubcovsk.Online - Городской портал, основанный на карте
 *
 * @author belomaxora
 */

class ModelCatalogOrganization extends Model
{
	public function addOrganization($data)
	{
	}

	public function editOrganization($organization_id, $data)
	{
	}

	public function deleteOrganization($organization_id)
	{
	}

	public function getOrganization($organization_id)
	{
	}

	public function getOrganizations($data = array())
	{
		$sql = "SELECT * FROM " . DB_PREFIX . "org_items";

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
}
