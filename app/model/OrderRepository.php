<?php

use Mapper\Repository;

/**
 * Mapping order to database
 * 
 * @author Petr Novotny
 */
class OrderRepository extends Repository
{	
	/**
	 * 
	 * @param unknown $id
	 * @return Mapper\MapperObjectSource
	 */
	public function findBySomething()
	{
		$sql = "
			SELECT o.id,o.total_price,o.paid,o.invoice_number,o.created,o.note,oi.id,oi.id_order,oi.amount,oi.name
			FROM `order` o
			LEFT JOIN order_item oi ON oi.id_order = o.id
			WHERE o.id IN (1,2)
		";
		return $this->findBySQL($sql);
	}
}
