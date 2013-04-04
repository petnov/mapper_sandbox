<?php

use Mapper\BaseEntity;

/**
 * Customer order
 *
 * @author Petr Novotny
 */
class OrderItem extends BaseEntity
{
	/**
	 * Item amount
	 * 
	 * @var int
	 * @mapped
	 */
	private $amount;
	
	/**
	 * Item name
	 * 
	 * @var string
	 * @mapped
	 */
	private $name;
	
	/**
	 * Order
	 * 
	 * @var Order
	 * @association(Order, one, id, id_order)
	 */
	private $order;
	
	/**
	 * Amount getter
	 * 
	 * @return int
	 */
	public function getAmount()
	{
		return $this->amount;
	}

	/**
	 * Amount setter
	 * 
	 * @param int $totalPrice
	 */
	public function setAmount($amount)
	{
		$this->amount = (int) $amount;
	}

	/**
	 * Name getter
	 * 
	 * @return string
	 */
	public function getName()
	{
		return $this->name;
	}


	/**
	 * Name setter
	 * 
	 * @param string $name
	 */
	public function setName($name)
	{
		$this->name = $name;
	}
	
	/**
	 * Order setter
	 * 
	 * @param Order $order
	 * @return void
	 */
	public function setOrder(Order $order)
	{
		$this->order = $order;
	}
	
	/**
	 * Order getter
	 * 
	 * @return Order
	 */
	public function getOrder()
	{
		return $this->order;
	}

}
