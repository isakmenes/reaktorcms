<?php


abstract class BaseResidenceLevelI18n extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $name;


	
	protected $id;


	
	protected $culture;

	
	protected $aResidenceLevel;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getName()
	{

		return $this->name;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getCulture()
	{

		return $this->culture;
	}

	
	public function setName($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->name !== $v) {
			$this->name = $v;
			$this->modifiedColumns[] = ResidenceLevelI18nPeer::NAME;
		}

	} 
	
	public function setId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = ResidenceLevelI18nPeer::ID;
		}

		if ($this->aResidenceLevel !== null && $this->aResidenceLevel->getId() !== $v) {
			$this->aResidenceLevel = null;
		}

	} 
	
	public function setCulture($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->culture !== $v) {
			$this->culture = $v;
			$this->modifiedColumns[] = ResidenceLevelI18nPeer::CULTURE;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->name = $rs->getString($startcol + 0);

			$this->id = $rs->getInt($startcol + 1);

			$this->culture = $rs->getString($startcol + 2);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 3; 
		} catch (Exception $e) {
			throw new PropelException("Error populating ResidenceLevelI18n object", $e);
		}
	}

	
	public function delete($con = null)
	{

    foreach (sfMixer::getCallables('BaseResidenceLevelI18n:delete:pre') as $callable)
    {
      $ret = call_user_func($callable, $this, $con);
      if ($ret)
      {
        return;
      }
    }


		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(ResidenceLevelI18nPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ResidenceLevelI18nPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BaseResidenceLevelI18n:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	
	public function save($con = null)
	{

    foreach (sfMixer::getCallables('BaseResidenceLevelI18n:save:pre') as $callable)
    {
      $affectedRows = call_user_func($callable, $this, $con);
      if (is_int($affectedRows))
      {
        return $affectedRows;
      }
    }


		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(ResidenceLevelI18nPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BaseResidenceLevelI18n:save:post') as $callable)
    {
      call_user_func($callable, $this, $con, $affectedRows);
    }

			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	protected function doSave($con)
	{
		$affectedRows = 0; 		if (!$this->alreadyInSave) {
			$this->alreadyInSave = true;


												
			if ($this->aResidenceLevel !== null) {
				if ($this->aResidenceLevel->isModified() || $this->aResidenceLevel->getCurrentResidenceLevelI18n()->isModified()) {
					$affectedRows += $this->aResidenceLevel->save($con);
				}
				$this->setResidenceLevel($this->aResidenceLevel);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = ResidenceLevelI18nPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += ResidenceLevelI18nPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			$this->alreadyInSave = false;
		}
		return $affectedRows;
	} 
	
	protected $validationFailures = array();

	
	public function getValidationFailures()
	{
		return $this->validationFailures;
	}

	
	public function validate($columns = null)
	{
		$res = $this->doValidate($columns);
		if ($res === true) {
			$this->validationFailures = array();
			return true;
		} else {
			$this->validationFailures = $res;
			return false;
		}
	}

	
	protected function doValidate($columns = null)
	{
		if (!$this->alreadyInValidation) {
			$this->alreadyInValidation = true;
			$retval = null;

			$failureMap = array();


												
			if ($this->aResidenceLevel !== null) {
				if (!$this->aResidenceLevel->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aResidenceLevel->getValidationFailures());
				}
			}


			if (($retval = ResidenceLevelI18nPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ResidenceLevelI18nPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getName();
				break;
			case 1:
				return $this->getId();
				break;
			case 2:
				return $this->getCulture();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ResidenceLevelI18nPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getName(),
			$keys[1] => $this->getId(),
			$keys[2] => $this->getCulture(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ResidenceLevelI18nPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setName($value);
				break;
			case 1:
				$this->setId($value);
				break;
			case 2:
				$this->setCulture($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ResidenceLevelI18nPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setName($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCulture($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ResidenceLevelI18nPeer::DATABASE_NAME);

		if ($this->isColumnModified(ResidenceLevelI18nPeer::NAME)) $criteria->add(ResidenceLevelI18nPeer::NAME, $this->name);
		if ($this->isColumnModified(ResidenceLevelI18nPeer::ID)) $criteria->add(ResidenceLevelI18nPeer::ID, $this->id);
		if ($this->isColumnModified(ResidenceLevelI18nPeer::CULTURE)) $criteria->add(ResidenceLevelI18nPeer::CULTURE, $this->culture);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ResidenceLevelI18nPeer::DATABASE_NAME);

		$criteria->add(ResidenceLevelI18nPeer::ID, $this->id);
		$criteria->add(ResidenceLevelI18nPeer::CULTURE, $this->culture);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		$pks = array();

		$pks[0] = $this->getId();

		$pks[1] = $this->getCulture();

		return $pks;
	}

	
	public function setPrimaryKey($keys)
	{

		$this->setId($keys[0]);

		$this->setCulture($keys[1]);

	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setName($this->name);


		$copyObj->setNew(true);

		$copyObj->setId(NULL); 
		$copyObj->setCulture(NULL); 
	}

	
	public function copy($deepCopy = false)
	{
				$clazz = get_class($this);
		$copyObj = new $clazz();
		$this->copyInto($copyObj, $deepCopy);
		return $copyObj;
	}

	
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new ResidenceLevelI18nPeer();
		}
		return self::$peer;
	}

	
	public function setResidenceLevel($v)
	{


		if ($v === null) {
			$this->setId(NULL);
		} else {
			$this->setId($v->getId());
		}


		$this->aResidenceLevel = $v;
	}


	
	public function getResidenceLevel($con = null)
	{
		if ($this->aResidenceLevel === null && ($this->id !== null)) {
						include_once 'lib/model/om/BaseResidenceLevelPeer.php';

			$this->aResidenceLevel = ResidenceLevelPeer::retrieveByPK($this->id, $con);

			
		}
		return $this->aResidenceLevel;
	}


  public function __call($method, $arguments)
  {
    if (!$callable = sfMixer::getCallable('BaseResidenceLevelI18n:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BaseResidenceLevelI18n::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


} 