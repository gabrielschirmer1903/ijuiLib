<?php
class Pages extends Controller
{
  public function __construct()
  {
  }

  public function index()
  {

    if (isLoggendIn()) {
      redirect('books');
    }$this->view('pages/index');
    
  }
}
