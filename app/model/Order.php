<?php

use Mapper\BaseEntity,
	Mapper\Utils\AssocCollection;

/**
 * Customer order
 *
 * @author Petr Novotny
 */
class Order extends BaseEntity
{ 
	/**
	 * Order items
	 * 
	 * @var ObjectCollection
	 * @association(OrderItem, many, id_order)
	 */
	private $items;
	
	/**
	 * Order customer
	 * 
	 * @var Customer
	 * @association(Customer, one, id, id_customer)
	 */
	protected $customer;
	
	/**
	 * Order payment
	 * 
	 * @var Payment
	 */
	private $payment;
	
	/**
	 * Order total price
	 * 
	 * @var float
	 * @mapped
	 */
	private $totalPrice;

	/**
	 * Order paid status - is orer paid?
	 * 
	 * @var bool
	 * @mapped
	 */
	private $paid;

	/**
	 * Order invoice number
	 * 
	 * @var string
	 * @mapped
	 */
	private $invoiceNumber;

	/**
	 * Created date
	 * 
	 * @var DateTime
	 * @mapped
	 */
	private $created;

	/**
	 * Order note
	 * 
	 * @var string
	 * @mapped
	 */
	private $note;

	/**
	 * Construct routines
	 */
	public function __construct()
	{
		$this->items = new AssocCollection($this, 'items');		
		$this->created = new DateTime;
		$this->totalPrice = 0;
	}

	/**
	 * Total price getter
	 * 
	 * @return float
	 */
	public function getTotalPrice()
	{
		return $this->totalPrice;
	}


	/**
	 * Total price setter
	 * 
	 * @param float $totalPrice
	 */
	public function setTotalPrice($totalPrice)
	{
		$this->totalPrice = (float) $totalPrice;
	}


	/**
	 * Paid getter
	 * 
	 * @return bool
	 */
	public function getPaid()
	{
		return $this->paid;
	}


	/**
	 * Paid setter
	 * 
	 * @param bool $paid
	 */
	public function setPaid($paid)
	{
		$this->paid = (bool) $paid;
	}


	/**
	 * Customer setter
	 * 
	 * @param Customer $customer
	 */
	public function setCustomer(Customer $customer)
	{
		$this->customer = $customer;
	}

	/**
	 * Customer getter
	 * 
	 * @return Customer
	 */
	public function getCustomer()
	{
		return $this->association('customer');
	}

	/**
	 * Created setter
	 * 
	 * @param DateTime|string $created
	 */
	public function setCreated($created)
	{
		if ($created instanceof DateTime) {
			$this->created = $created;
		} else {
			$this->created = new DateTime($created);
		}
	}


	/**
	 * Created getter
	 * 
	 * @return DateTime
	 */
	public function getCreated()
	{
		return $this->created;
	}


	/**
	 * Payment getter
	 * 
	 * @return Payment
	 */
	public function getPayment()
	{
		return $this->payment;
	}


	/**
	 * Payment setter
	 * 
	 * @param Payment $payment
	 */
	public function setPayment($payment)
	{
		$this->payment = $payment;
	}
	

	/**
	 * Invoice number getter
	 * 
	 * @return string
	 */
	public function getInvoiceNumber()
	{
		return $this->invoiceNumber;
	}


	/**
	 * Invoice number setter
	 * 
	 * @param string $invoiceNumber
	 */
	public function setInvoiceNumber($invoiceNumber)
	{
		$this->invoiceNumber = $invoiceNumber;
	}

	/**
	 * Note setter
	 * 
	 * @param string $note
	 */
	public function setNote($note)
	{
		$this->note = $note;
	}

	/**
	 * Note getter
	 * 
	 * @return string
	 */
	public function getNote()
	{
		return $this->note;
	}
	
	/**
	 * Items getter
	 * 
	 * @return AssocCollection
	 */
	public function getItems()
	{
		return $this->items;
	}
	
	/**
	 * Add item to order
	 * 
	 * @param OrderItem $item
	 */
	public function addItem(OrderItem $item)
	{
		$this->items->add($item);
		$item->setOrder($this);
	}

}
