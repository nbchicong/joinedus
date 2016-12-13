<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Illuminate\Support\Facades\Log as Logger;
use Illuminate\Support\Facades\App;

abstract class Controller extends BaseController implements ControllerImpl {
  use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;
  protected $request;
  protected $logger;
  /**
   * Controller constructor.
   */
  public function __construct() {
    $this->init();
    $this->logger = Logger::class;
    Logger::debug("System locate - " . App::getLocale());
  }
  
  protected function getParams($paramName, Request $request, $default = null) {
    return $request->input($paramName, $default);
  }
  
  /**
   * @param Request $request
   * @param string  $paramName
   *
   * @return array|null|\Symfony\Component\HttpFoundation\File\UploadedFile
   */
  protected function getFileUpload(Request $request, $paramName = 'fileUpload') {
    if ($request->hasFile($paramName))
      return $request->file($paramName, null);
    return null;
  }
}
