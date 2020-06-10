<?php

namespace App;

class Cart
{
    public $items = null;
    public $totalQty = 0;
    public $totalPrice = 0;

    public function __construct($oldCart) {
        if($oldCart) {
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }

    public function add($item, $id, $qty, $size) {
        $storedItem = ['qty' => 0, 'price' => $item->price, 'size' => $size, 'item' => $item];
        if($this->items && array_key_exists($id, $this->items) && array_key_exists($size, $this->items[$id]))
            $storedItem = $this->items[$id][$size];
        $storedItem['qty'] += $qty;
        $storedItem['price'] = $item->price * $storedItem['qty'];
        $this->items[$id][$size] = $storedItem;
        $this->totalQty += $qty;
        $this->totalPrice += $item->price * $qty;
        $item->size = $size;
    }

    public function remove($id, $size){
        $this->totalQty -= $this->items[$id][$size]['qty'];
        $this->totalPrice -= $this->items[$id][$size]['price'];
        unset($this->items[$id][$size]);
    }

    public function changeSize($item, $id, $qty, $size, $currsize){
        if($this->items && array_key_exists($id, $this->items) && array_key_exists($size, $this->items[$id])) {
            $this->totalQty -= $this->items[$id][$currsize]['qty'];
            $this->totalPrice -= $this->items[$id][$currsize]['price'];
            unset($this->items[$id][$currsize]);
            $storedItem = $this->items[$id][$size];
            $storedItem['qty'] += $qty;
            $storedItem['price'] = $item->price * $storedItem['qty'];
            $this->items[$id][$size] = $storedItem;
            $this->totalQty += $qty;
            $this->totalPrice += $item->price * $qty;
            $item->size = $size;
        }
        else {
            $keys = array_keys($this->items[$id]);
            $index = array_search($currsize, $keys);
            $keys[$index] = $size;
            $array = array_combine($keys, array_values($this->items[$id]));
            $this->items[$id] = $array;
            $storedItem = ['qty' => 0, 'price' => $item->price, 'size' => $size, 'item' => $item];
            $storedItem['qty'] += $qty;
            $storedItem['price'] = $item->price * $storedItem['qty'];
            $this->items[$id][$size] = $storedItem;
            $item->size = $size;
        }
    }

    public function changeQty($id, $qty, $size){
        $t1 = $this->items[$id][$size]['price'];
        $t2 = $this->items[$id][$size]['qty'];
        $t3 = $t1/$t2;
        $this->totalQty -= $t2;
        $this->totalPrice -= $t1;
        $this->items[$id][$size]['qty'] = $qty;
        $this->items[$id][$size]['price'] = $t3 * $qty;
        $this->totalQty += $qty;
        $this->totalPrice += $this->items[$id][$size]['price'];
    }
}
