<?php

/*
 * Demo widget
 */
class Navigation extends Widget {

    public function display($data) {
        
        if (!isset($data['items'])) {
      
        }

        $this->view('widgets/navigation', $data);
    }
    
}