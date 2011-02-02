<?php


abstract class BaseSubreaktorIdentifier extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $subreaktor_id;


	
	protected $identifier;

	
	protected $aSubreaktor;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getSubreaktorId()
	{

		return $this->subreaktor_id;
	}

	
	public function getIdentifier()
	{

		return $this->identifier;
	}

	
	public function setId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = SubreaktorIdentifierPeer::ID;
		}

	} 
	
	public function setSubreaktorId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->subreaktor_id !== $v) {
			$this->subreaktor_id = $v;
			$this->modifiedColumns[] = SubreaktorIdentifierPeer::SUBREAKTOR_ID;
		}

		if ($this->aSubreaktor !== null && $this->aSubreaktor->getId() !== $v) {
			$this->aSubreaktor = null;
		}

	} 
	
	public function setIdentifier($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->identifier !== $v) {
			$this->identifier = $v;
			$this->modifiedColumns[] = SubreaktorIdentifierPeer::IDENTIFIER;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->subreaktor_id = $rs->getInt($startcol + 1);

			$this->identifier = $rs->getString($startcol + 2);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 3; 
		} catch (Exception $e) {
			throw new PropelException("Error populating SubreaktorIdentifier object", $e);
		}
	}

	
	public function delete($con = null)
	{

    foreach (sfMixer::getCallables('BaseSubreaktorIdentifier:delete:pre') as $callable)
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
			$con = Propel::getConnection(SubreaktorIdentifierPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			SubreaktorIdentifierPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BaseSubreaktorIdentifier:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	
	public function save($con = null)
	{

    foreach (sfMixer::getCallables('BaseSubreaktorIdentifier:save:pre') as $callable)
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
			$con = Propel::getConnection(SubreaktorIdentifierPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BaseSubreaktorIdentifier:save:post') as $callable)
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


												
			if ($this->aSubreaktor !== null) {
				if ($this->aSubreaktor->isModified() || $this->aSubreaktor->getCurrentSubreaktorI18n()->isModified()) {
					$affectedRows += $this->aSubreaktor->save($con);
				}
				$this->setSubreaktor($this->aSubreaktor);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = SubreaktorIdentifierPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += SubreaktorIdentifierPeer::doUpdate($this, $con);
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


												
			if ($this->aSubreaktor !== null) {
				if (!$this->aSubreaktor->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aSubreaktor->getValidationFailures());
				}
			}


			if (($retval = SubreaktorIdentifierPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = SubreaktorIdentifierPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getSubreaktorId();
				break;
			case 2:
				return $this->getIdentifier();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = SubreaktorIdentifierPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getSubreaktorId(),
			$keys[2] => $this->getIdentifier(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = SubreaktorIdentifierPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setSubreaktorId($value);
				break;
			case 2:
				$this->setIdentifier($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = SubreaktorIdentifierPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setSubreaktorId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setIdentifier($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(SubreaktorIdentifierPeer::DATABASE_NAME);

		if ($this->isColumnModified(SubreaktorIdentifierPeer::ID)) $criteria->add(SubreaktorIdentifierPeer::ID, $this->id);
		if ($this->isColumnModified(SubreaktorIdentifierPeer::SUBREAKTOR_ID)) $criteria->add(SubreaktorIdentifierPeer::SUBREAKTOR_ID, $this->subreaktor_id);
		if ($this->isColumnModified(SubreaktorIdentifierPeer::IDENTIFIER)) $criteria->add(SubreaktorIdentifierPeer::IDENTIFIER, $this->identifier);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(SubreaktorIdentifierPeer::DATABASE_NAME);

		$criteria->add(SubreaktorIdentifierPeer::ID, $this->id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getId();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setId($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setSubreaktorId($this->subreaktor_id);

		$copyObj->setIdentifier($this->identifier);


		$copyObj->setNew(true);

		$copyObj->setId(NULL); 
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
			self::$peer = new SubreaktorIdentifierPeer();
		}
		return self::$peer;
	}

	
	public function setSubreaktor($v)
	{


		if ($v === null) {
			$this->setSubreaktorId(NULL);
		} else {
			$this->setSubreaktorId($v->getId());
		}


		$this->aSubreaktor = $v;
	}


	
	public function getSubreaktor($con = null)
	{
		if ($this->aSubreaktor === null && ($this->subreaktor_id !== null)) {
						include_once 'lib/model/om/BaseSubreaktorPeer.php';

			$this->aSubreaktor = SubreaktorPeer::retrieveByPK($this->subreaktor_id, $con);

			
		}
		return $this->aSubreaktor;
	}


  public function __call($method, $arguments)
  {
    if (!$callable = sfMixer::getCallable('BaseSubreaktorIdentifier:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BaseSubreaktorIdentifier::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


} 