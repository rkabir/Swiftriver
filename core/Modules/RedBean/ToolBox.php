<?php
/**
 * ToolBox
 * Contains most important redbean tools
 * @file			RedBean/ToolBox.php
 * @description		The ToolBox acts as a resource locator for RedBean but can
 *					be integrated in larger resource locators (nested).
 *					It does not do anything more than just store the three most
 *					important RedBean resources (tools): the database adapter,
 *					the redbean core class (oodb) and the query writer.
 * @author			Gabor de Mooij
 * @license			BSD
 */
class RedBean_ToolBox {

	/**
	 *
	 * @var RedBean_OODB
	 */
	private $oodb;

	/**
	 *
	 * @var RedBean_QueryWriter
	 */
	private $writer;

	/**
	 *
	 * @var RedBean_Adapter_DBAdapter
	 */
	private $adapter;

	/**
	 * Constructor.
	 * The Constructor of the ToolBox takes three arguments: a RedBean_OODB $redbean
	 * object database, a RedBean_Adapter $databaseAdapter and a
	 * RedBean_QueryWriter $writer. It stores these objects inside and acts as
	 * a micro service locator. You can pass the toolbox to any object that needs
	 * one of the RedBean core objects to interact with.
	 * @param RedBean_OODB $oodb
	 * @param RedBean_Adapter_DBAdapter $adapter
	 * @param RedBean_QueryWriter $writer
	 * return RedBean_ToolBox $toolbox
	 */
	public function __construct( RedBean_OODB $oodb, RedBean_Adapter $adapter, RedBean_QueryWriter $writer ) {
		$this->oodb = $oodb;
		$this->adapter = $adapter;
		$this->writer = $writer;
		return $this;
	}

	/**
	 * The Toolbox acts as a kind of micro service locator, providing just the
	 * most important objects that make up RedBean. You can pass the toolkit to
	 * any object that needs one of these objects to function properly.
	 * Returns the QueryWriter; normally you do not use this object but other
	 * object might want to use the default RedBean query writer to be
	 * database independent.
	 * @return RedBean_QueryWriter $writer
	 */
	public function getWriter() {
		return $this->writer;
	}

	/**
	 * The Toolbox acts as a kind of micro service locator, providing just the
	 * most important objects that make up RedBean. You can pass the toolkit to
	 * any object that needs one of these objects to function properly.
	 * Retruns the RedBean OODB Core object. The RedBean OODB object is
	 * the ultimate core of Redbean. It provides the means to store and load
	 * beans. Extract this object immediately after invoking a kickstart method.
	 * @return RedBean_OODB $oodb
	 */
	public function getRedBean() {
		return $this->oodb;
	}

	/**
	 * The Toolbox acts as a kind of micro service locator, providing just the
	 * most important objects that make up RedBean. You can pass the toolkit to
	 * any object that needs one of these objects to function properly.
	 * Returns the adapter. The Adapter can be used to perform queries
	 * on the database directly.
	 * @return RedBean_Adapter_DBAdapter $adapter
	 */
	public function getDatabaseAdapter() {
		return $this->adapter;
	}
}