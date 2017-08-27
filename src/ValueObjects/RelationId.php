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
     * @param $relationId
     * @throws \Exception
     */
    public function __construct($relationId = null)
    {
        if(is_int($relationId) || $relationId === null) {
            $this->relationId = $relationId;
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