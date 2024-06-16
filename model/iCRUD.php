<?php

interface iCRUD{
    public function create($params);

    public function read();

    public function update($id, $params);

    public function delete($id);
    
}