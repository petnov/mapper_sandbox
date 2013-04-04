<?php

use Mapper\BaseEntity,
	Mapper\Utils\AssocCollection;

/**
 * Customer order
 *
 * @author Petr Novotny
 */
class Customer extends BaseEntity
{

	/**
	 * Created date
	 * 
	 * @var DateTime
	 * @mapped
	 */
	private $name;

	/**
	 * Order note
	 * 
	 * @var string
	 * @mapped
	 */
	private $surname;
	
	/**
	 * Customer orders
	 * 
	 * @var AssocCollection
	 * @association(Order,OneToMany,id_customer)
	 */
	private $orders;
	
	public function __construct()
	{
		$this->orders = new AssocCollection($this, 'orders');
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
	 * Surname setter
	 *
	 * @param string $name
	 */
	public function setSurname($surname)
	{
		$this->surname = $surname;
	}
	
	/**
	 * Surname getter
	 * 
	 * @return string
	 */
	public function getSurname()
	{
		return $this->surname;
	}
	
	public function getOrders()
	{
		return $this->orders;
	}
	
}
