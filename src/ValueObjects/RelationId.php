<?php

namespace bobkosse\eBoekhouden\ValueObjects;

/**
 * Class RelationId
 * @package bobkosse\eBoekhouden\ValueObjects
 */
class RelationId {

    /**
     * @var
     */
    private $relationId;

    /**
     * RelationId constructor.
     * @param $relationid
     * @throws \Exception
     */
    public function __construct($relationid = null)
    {
        if(is_int($relationid) || $relationid === null) {
            $this->relationId = $relationid;
            return;
        }
        throw new \Exception("Relation Id must be integer", 110);
    }

    /**
     * @return mixed
     */
    public function toInt()
    {
        if($this->relationId == 0) {
            return null;
        }
        return (int) $this->relationId;
    }
}