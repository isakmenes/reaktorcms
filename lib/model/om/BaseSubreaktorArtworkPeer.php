<?php


abstract class BaseSubreaktorArtworkPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'subreaktor_artwork';

	
	const CLASS_DEFAULT = 'lib.model.SubreaktorArtwork';

	
	const NUM_COLUMNS = 3;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'subreaktor_artwork.ID';

	
	const SUBREAKTOR_ID = 'subreaktor_artwork.SUBREAKTOR_ID';

	
	const ARTWORK_ID = 'subreaktor_artwork.ARTWORK_ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'SubreaktorId', 'ArtworkId', ),
		BasePeer::TYPE_COLNAME => array (SubreaktorArtworkPeer::ID, SubreaktorArtworkPeer::SUBREAKTOR_ID, SubreaktorArtworkPeer::ARTWORK_ID, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'subreaktor_id', 'artwork_id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'SubreaktorId' => 1, 'ArtworkId' => 2, ),
		BasePeer::TYPE_COLNAME => array (SubreaktorArtworkPeer::ID => 0, SubreaktorArtworkPeer::SUBREAKTOR_ID => 1, SubreaktorArtworkPeer::ARTWORK_ID => 2, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'subreaktor_id' => 1, 'artwork_id' => 2, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/SubreaktorArtworkMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.SubreaktorArtworkMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = SubreaktorArtworkPeer::getTableMap();
			$columns = $map->getColumns();
			$nameMap = array();
			foreach ($columns as $column) {
				$nameMap[$column->getPhpName()] = $column->getColumnName();
			}
			self::$phpNameMap = $nameMap;
		}
		return self::$phpNameMap;
	}
	
	static public function translateFieldName($name, $fromType, $toType)
	{
		$toNames = self::getFieldNames($toType);
		$key = isset(self::$fieldKeys[$fromType][$name]) ? self::$fieldKeys[$fromType][$name] : null;
		if ($key === null) {
			throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(self::$fieldKeys[$fromType], true));
		}
		return $toNames[$key];
	}

	

	static public function getFieldNames($type = BasePeer::TYPE_PHPNAME)
	{
		if (!array_key_exists($type, self::$fieldNames)) {
			throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants TYPE_PHPNAME, TYPE_COLNAME, TYPE_FIELDNAME, TYPE_NUM. ' . $type . ' was given.');
		}
		return self::$fieldNames[$type];
	}

	
	public static function alias($alias, $column)
	{
		return str_replace(SubreaktorArtworkPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(SubreaktorArtworkPeer::ID);

		$criteria->addSelectColumn(SubreaktorArtworkPeer::SUBREAKTOR_ID);

		$criteria->addSelectColumn(SubreaktorArtworkPeer::ARTWORK_ID);

	}

	const COUNT = 'COUNT(subreaktor_artwork.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT subreaktor_artwork.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(SubreaktorArtworkPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(SubreaktorArtworkPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = SubreaktorArtworkPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}
	
	public static function doSelectOne(Criteria $criteria, $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = SubreaktorArtworkPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return SubreaktorArtworkPeer::populateObjects(SubreaktorArtworkPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{

    foreach (sfMixer::getCallables('BaseSubreaktorArtworkPeer:addDoSelectRS:addDoSelectRS') as $callable)
    {
      call_user_func($callable, 'BaseSubreaktorArtworkPeer', $criteria, $con);
    }


		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			SubreaktorArtworkPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = SubreaktorArtworkPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinSubreaktor(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(SubreaktorArtworkPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(SubreaktorArtworkPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(SubreaktorArtworkPeer::SUBREAKTOR_ID, SubreaktorPeer::ID);

		$rs = SubreaktorArtworkPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinReaktorArtwork(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(SubreaktorArtworkPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(SubreaktorArtworkPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(SubreaktorArtworkPeer::ARTWORK_ID, ReaktorArtworkPeer::ID);

		$rs = SubreaktorArtworkPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinSubreaktor(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		SubreaktorArtworkPeer::addSelectColumns($c);
		$startcol = (SubreaktorArtworkPeer::NUM_COLUMNS - SubreaktorArtworkPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		SubreaktorPeer::addSelectColumns($c);

		$c->addJoin(SubreaktorArtworkPeer::SUBREAKTOR_ID, SubreaktorPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = SubreaktorArtworkPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = SubreaktorPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getSubreaktor(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addSubreaktorArtwork($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initSubreaktorArtworks();
				$obj2->addSubreaktorArtwork($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinReaktorArtwork(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		SubreaktorArtworkPeer::addSelectColumns($c);
		$startcol = (SubreaktorArtworkPeer::NUM_COLUMNS - SubreaktorArtworkPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		ReaktorArtworkPeer::addSelectColumns($c);

		$c->addJoin(SubreaktorArtworkPeer::ARTWORK_ID, ReaktorArtworkPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = SubreaktorArtworkPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = ReaktorArtworkPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getReaktorArtwork(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addSubreaktorArtwork($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initSubreaktorArtworks();
				$obj2->addSubreaktorArtwork($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(SubreaktorArtworkPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(SubreaktorArtworkPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(SubreaktorArtworkPeer::SUBREAKTOR_ID, SubreaktorPeer::ID);

		$criteria->addJoin(SubreaktorArtworkPeer::ARTWORK_ID, ReaktorArtworkPeer::ID);

		$rs = SubreaktorArtworkPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAll(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		SubreaktorArtworkPeer::addSelectColumns($c);
		$startcol2 = (SubreaktorArtworkPeer::NUM_COLUMNS - SubreaktorArtworkPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		SubreaktorPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + SubreaktorPeer::NUM_COLUMNS;

		ReaktorArtworkPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + ReaktorArtworkPeer::NUM_COLUMNS;

		$c->addJoin(SubreaktorArtworkPeer::SUBREAKTOR_ID, SubreaktorPeer::ID);

		$c->addJoin(SubreaktorArtworkPeer::ARTWORK_ID, ReaktorArtworkPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = SubreaktorArtworkPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = SubreaktorPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getSubreaktor(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addSubreaktorArtwork($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initSubreaktorArtworks();
				$obj2->addSubreaktorArtwork($obj1);
			}


					
			$omClass = ReaktorArtworkPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3 = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getReaktorArtwork(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addSubreaktorArtwork($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initSubreaktorArtworks();
				$obj3->addSubreaktorArtwork($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAllExceptSubreaktor(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(SubreaktorArtworkPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(SubreaktorArtworkPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(SubreaktorArtworkPeer::ARTWORK_ID, ReaktorArtworkPeer::ID);

		$rs = SubreaktorArtworkPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptReaktorArtwork(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(SubreaktorArtworkPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(SubreaktorArtworkPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(SubreaktorArtworkPeer::SUBREAKTOR_ID, SubreaktorPeer::ID);

		$rs = SubreaktorArtworkPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAllExceptSubreaktor(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		SubreaktorArtworkPeer::addSelectColumns($c);
		$startcol2 = (SubreaktorArtworkPeer::NUM_COLUMNS - SubreaktorArtworkPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		ReaktorArtworkPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + ReaktorArtworkPeer::NUM_COLUMNS;

		$c->addJoin(SubreaktorArtworkPeer::ARTWORK_ID, ReaktorArtworkPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = SubreaktorArtworkPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = ReaktorArtworkPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getReaktorArtwork(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addSubreaktorArtwork($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initSubreaktorArtworks();
				$obj2->addSubreaktorArtwork($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptReaktorArtwork(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		SubreaktorArtworkPeer::addSelectColumns($c);
		$startcol2 = (SubreaktorArtworkPeer::NUM_COLUMNS - SubreaktorArtworkPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		SubreaktorPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + SubreaktorPeer::NUM_COLUMNS;

		$c->addJoin(SubreaktorArtworkPeer::SUBREAKTOR_ID, SubreaktorPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = SubreaktorArtworkPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = SubreaktorPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getSubreaktor(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addSubreaktorArtwork($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initSubreaktorArtworks();
				$obj2->addSubreaktorArtwork($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}

	
	public static function getTableMap()
	{
		return Propel::getDatabaseMap(self::DATABASE_NAME)->getTable(self::TABLE_NAME);
	}

	
	public static function getOMClass()
	{
		return SubreaktorArtworkPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{

    foreach (sfMixer::getCallables('BaseSubreaktorArtworkPeer:doInsert:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseSubreaktorArtworkPeer', $values, $con);
      if (false !== $ret)
      {
        return $ret;
      }
    }


		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(SubreaktorArtworkPeer::ID); 

				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->begin();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollback();
			throw $e;
		}

		
    foreach (sfMixer::getCallables('BaseSubreaktorArtworkPeer:doInsert:post') as $callable)
    {
      call_user_func($callable, 'BaseSubreaktorArtworkPeer', $values, $con, $pk);
    }

    return $pk;
	}

	
	public static function doUpdate($values, $con = null)
	{

    foreach (sfMixer::getCallables('BaseSubreaktorArtworkPeer:doUpdate:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseSubreaktorArtworkPeer', $values, $con);
      if (false !== $ret)
      {
        return $ret;
      }
    }


		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; 
			$comparison = $criteria->getComparison(SubreaktorArtworkPeer::ID);
			$selectCriteria->add(SubreaktorArtworkPeer::ID, $criteria->remove(SubreaktorArtworkPeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		$ret = BasePeer::doUpdate($selectCriteria, $criteria, $con);
	

    foreach (sfMixer::getCallables('BaseSubreaktorArtworkPeer:doUpdate:post') as $callable)
    {
      call_user_func($callable, 'BaseSubreaktorArtworkPeer', $values, $con, $ret);
    }

    return $ret;
  }

	
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}
		$affectedRows = 0; 		try {
									$con->begin();
			$affectedRows += BasePeer::doDeleteAll(SubreaktorArtworkPeer::TABLE_NAME, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	 public static function doDelete($values, $con = null)
	 {
		if ($con === null) {
			$con = Propel::getConnection(SubreaktorArtworkPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof SubreaktorArtwork) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(SubreaktorArtworkPeer::ID, (array) $values, Criteria::IN);
		}

				$criteria->setDbName(self::DATABASE_NAME);

		$affectedRows = 0; 
		try {
									$con->begin();
			
			$affectedRows += BasePeer::doDelete($criteria, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public static function doValidate(SubreaktorArtwork $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(SubreaktorArtworkPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(SubreaktorArtworkPeer::TABLE_NAME);

			if (! is_array($cols)) {
				$cols = array($cols);
			}

			foreach($cols as $colName) {
				if ($tableMap->containsColumn($colName)) {
					$get = 'get' . $tableMap->getColumn($colName)->getPhpName();
					$columns[$colName] = $obj->$get();
				}
			}
		} else {

		}

		$res =  BasePeer::doValidate(SubreaktorArtworkPeer::DATABASE_NAME, SubreaktorArtworkPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = SubreaktorArtworkPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
            $request->setError($col, $failed->getMessage());
        }
    }

    return $res;
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(SubreaktorArtworkPeer::DATABASE_NAME);

		$criteria->add(SubreaktorArtworkPeer::ID, $pk);


		$v = SubreaktorArtworkPeer::doSelect($criteria, $con);

		return !empty($v) > 0 ? $v[0] : null;
	}

	
	public static function retrieveByPKs($pks, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria();
			$criteria->add(SubreaktorArtworkPeer::ID, $pks, Criteria::IN);
			$objs = SubreaktorArtworkPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseSubreaktorArtworkPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/SubreaktorArtworkMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.SubreaktorArtworkMapBuilder');
}
