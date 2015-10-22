<?php

class Toolbox {
    public $id;
    public $toolName;
    public $condition;
    public $price;

    public function __construct($id, $toolName, $condition, $price)
    {
        $this->id = $id;
        $this->toolName = $toolName;
        $this->condition = $condition;
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getToolName()
    {
        return $this->toolName;
    }

    /**
     * @param mixed $toolName
     */
    public function setToolName($toolName)
    {
        $this->toolName = $toolName;
    }

    /**
     * @return mixed
     */
    public function getCondition()
    {
        return $this->condition;
    }

    /**
     * @param mixed $condition
     */
    public function setCondition($condition)
    {
        $this->condition = $condition;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

}