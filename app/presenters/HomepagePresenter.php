<?php

use Nette\Reflection\ClassType;

/**
 * Homepage presenter.
 */
class HomepagePresenter extends BasePresenter
{
	
	/**
	 * Mapper service
	 * 
	 * @var Mapper\Mapper
	 */
	private $mapper;

	/**
	 * Inject mapper
	 * 
	 * @param Mapper\Mapper $mapper
	 */
	public function injectMapper(Mapper\Mapper $mapper)
	{
		$this->mapper = $mapper;
	}
	
	/**
	 * Creates two objects
	 */
	public function actionCreate()
	{
		// create new customer
		$customer = new Customer();
		$customer->setName('Petr');
		$customer->setSurname('Novak');
		
		// save to repository
		$this->mapper->getRepository('Customer')->save($customer);
		
		// create new order
		$order = new Order();
		$order->setInvoiceNumber('1234');
		$order->setNote('note');
		$order->setPaid(TRUE);
		$order->setTotalPrice(1234);
		
		// set order customer
		$order->setCustomer($customer);
				
		
		// create order item and add to order
		$item = new OrderItem();
		$item->setAmount(2);
		$item->setName('macbook');
		$order->addItem($item);
		
		// save order and order item
		$this->mapper->getRepository('Order')->save($order);
		$this->mapper->getRepository('OrderItem')->save($item);
		
		// iterate added items
		foreach ($order->items as $item) {
			dump($item);
		}
		
		dump($order);
		exit;
	}
	
	/**
	 * Default - load actions
	 */
	public function actionDefault()
	{
		
		// find order with ID 1
		$order = $this->mapper->getRepository('Order')
							  ->find(1);
		
		dump($order);
		
		// find all orders
		$orders = $this->mapper->getRepository('Order')
							  ->findAll()
								->limit(2)
								->offset(2);
		
		// count
		dump("Total count: " . $orders->getTotalCount());
		dump("Count with limit: " . count($orders));
		
		// found orders 
		foreach ($orders as $o) {
		}
		
		
		// find order and join with customer and items
		$order = $this->mapper
					  ->getRepository('Order')
					  ->find(4, array('customer', 'items'), TRUE, TRUE);
		
		dump($order);
		
		// custom query
		$order = $this->mapper
						->getRepository('Order')
						->findBySomething();
		
		dump($order->get());
		
		exit;
		
	}
	
	

}
