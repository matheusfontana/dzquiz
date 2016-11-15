<?php
namespace AppBundle\Service;

use AppBundle\Entity;
use Doctrine\Bundle\DoctrineBundle\Registry;

class ServiceBase
{

	private $doctrine;

	private $container;

	/**
	* Class constructor
	*
	* @access public
	* @param Registry $doctrine
	* @param mixed    $container
	*/
	public function __construct(Registry $doctrine, $container){
		$this->doctrine  = $doctrine;
		$this->container = $container;
	}

	/**
	* Get doctrine object
	*
	* @access public
	* @return Registry
	*/
	public function getDoctrine(){
		return $this->doctrine;
	}

	/**
	* Get container object
	*
	* @access public
	* @return Registry
	*/
	public function getContainer()
	{
		return $this->container;
	}

}
