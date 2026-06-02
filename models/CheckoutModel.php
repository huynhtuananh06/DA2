<?php

class CheckoutModel extends coreModel{
    
    public function insertCheckOut($data) {
        return $this->insert('checkout',$data);
    }
}