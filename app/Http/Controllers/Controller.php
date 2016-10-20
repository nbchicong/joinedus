<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Log;
use App;

class Controller extends BaseController {
  use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;
  protected $request;
  /**
   * Controller constructor.
   */
  public function __construct() {
    $this->request = new Request();
    Log::debug("System locate - " . App::getLocale());
  }
  
  protected function getParams($paramName) {
    return $this->request->input($paramName);
  }
}
