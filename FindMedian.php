<?php

//find median
class FindMedian
{

    protected $dataArray = [];

    public function __construct($dataArray = [])
    {
        $this->dataArray = $dataArray;
    }


    /**add number */
    public function addNum($num)
    {
        array_push($this->dataArray, $num);
    }

    /**
     * remove number
     */
    public function remNum($num)
    {
        $elKey = array_search($num, $this->dataArray);
        if ($elKey === false) {
            throw new \Exception("Element Not found");
        }


        array_splice($this->dataArray, $elKey, 1);
    }

    /**
     * return current array
     */
    public function getArray()
    {
        sort($this->dataArray);
        return $this->dataArray;
    }


    public function findMedian()
    {
        sort($this->dataArray);
        $len = count($this->dataArray);
        $index = floor($len / 2);

        if ($len < 2) {
            return 0;
        }

        if ($len == 2) {
            return array_sum($this->dataArray) / 2;
        }


        if ($len & 1) {
            //odd
            return $this->dataArray[$index];
        } else {
            //even
            return ($this->dataArray[$index - 1] + $this->dataArray[$index]) / 2;
        }
    }
}
