<?php

// namespace
namespace app\extra;

// use
use app\model\FileModel;

/**
 * Class Collection
 * @namespace app\extra
 * pass only first argument like (query->fetchAll(FETCH::OBJ)) if you don't have model |
 * pass second argument if you want data to be sorted to certain model that is compaible with your DB table
 */
class Collection
{
    protected $items;
    protected $models = [];

    public function __construct(array $items = [], string $modelName = null)
    {
        $this->items = $items;
        if($modelName)
        {
            foreach($this->items as $key => $obj)
            {
                $model = new FileModel();
                foreach($obj as $okey => $oval)
                {
                    $model->$okey = $oval;
                }
                $this->models[$key] = $model;
            }
        }
        var_dump($this->models); die();
    }

    /**
     * @return array
     * returns all items
     */
    public function all()
    {
        return $this->items;
    }

    /**
     * @return int
     * returns number of items
     */
    public function count()
    {
        return count($this->items);
    }

    /**
     * @return bool
     * if empty return true |
     * if NOT empty return false
     */
    public function isEmpty()
    {
        return empty($this->items);
    }

    /**
     * @param null $default
     * @return mixed|null
     * returns first item |
     * or null on empty array
     */
    public function first($default = null)
    {
        return isset($this->items[0]) ? $this->items[0] : $default;
    }

    /**
     * @param null $default
     * @return mixed|null
     * returns last item |
     * or null on empty array
     */
    public function last($default = null)
    {
        $reversed = array_reverse($this->items);
        return isset($reversed[0]) ? $reversed[0] : $default;
    }

    /**
     * @param callable $callback
     * @return $this
     */
    public function each(callable $callback)
    {
        foreach($this->items as $key => $item)
        {
             $callback($item, $key);
        }
        return $this;
    }

    /**
     * @param callable $callback
     * @return Collection
     * modify each object and return
     */
    public function returnEach(callable $callback)
    {
        $returnEach = [];
        foreach($this->items as $key => $item)
        {
            $res = $callback($item, $key);
            if($res)
            {
                $returnEach.array_push($res);
            }
        }
        return new static($returnEach);
    }

    /**
     * @param callable|null $callback
     * @return Collection
     */
    public function filter(callable $callback = null)
    {
        if($callback)
        {
            return new static(array_filter($this->items, $callback));
        }
        return new static(array_filter($this->items));
    }
}