<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/9
 * Time: 14:09
 */
class FenyePage{
    private $pageSize=6;
    private $res_array;
    private $pageNow;
    private $rowCount;
    private $pageCount;
    private $Navigate;
    private $gotoUrl;

    /**
     * @return mixed
     */
    public function getNavigate()
    {
        return $this->Navigate;
    }

    /**
     * @param mixed $Navigate
     */
    public function setNavigate($Navigate)
    {
        $this->Navigate = $Navigate;
    }

    /**
     * @return mixed
     */
    public function getGotoUrl()
    {
        return $this->gotoUrl;
    }

    /**
     * @param mixed $gotoUrl
     */
    public function setGotoUrl($gotoUrl)
    {
        $this->gotoUrl = $gotoUrl;
    }

    /**
     * @return int
     */
    public function getPageSize(): int
    {
        return $this->pageSize;
    }

    /**
     * @param int $pageSize
     */
    public function setPageSize(int $pageSize)
    {
        $this->pageSize = $pageSize;
    }

    /**
     * @return mixed
     */
    public function getResArray()
    {
        return $this->res_array;
    }

    /**
     * @param mixed $res_array
     */
    public function setResArray($res_array)
    {
        $this->res_array = $res_array;
    }

    /**
     * @return mixed
     */
    public function getPageNow()
    {
        return $this->pageNow;
    }

    /**
     * @param mixed $pageNow
     */
    public function setPageNow($pageNow)
    {
        $this->pageNow = $pageNow;
    }

    /**
     * @return mixed
     */
    public function getRowCount()
    {
        return $this->rowCount;
    }

    /**
     * @param mixed $rowCount
     */
    public function setRowCount($rowCount)
    {
        $this->rowCount = $rowCount;
    }

    /**
     * @return mixed
     */
    public function getPageCount()
    {
        return $this->pageCount;
    }

    /**
     * @param mixed $pageCount
     */
    public function setPageCount($pageCount)
    {
        $this->pageCount = $pageCount;
    }


}