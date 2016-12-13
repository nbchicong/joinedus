<?php

namespace App\Http\Controllers;

use App\Bo\FileEntryBO;
use App\Data\BooleanDTO;
use App\Data\DataServiceDTO;
use Log;
use App\Utils\StringUtils;
use App\Model\FileEntry;
use Illuminate\Http\Request;
use App\Utils\StorageUtils;

class FileEntryController extends AbstractController {
  /**
   * @var \App\Bo\FileEntryBO
   */
  private $bo;
  
  protected function paging(Request $request) {
    $keyword = $this->getParams('keywords', $request);
    $offset = $this->getOffset($request);
    $limit = $this->getLimit($request);
    $dto = new DataServiceDTO(
        $this->bo->query($keyword, $limit, $offset * $limit),
        $this->bo->count()
    );
    return response()->json($dto->output());
  }
  
  /**
   * @param Request $request
   *
   * @return FileEntry|null
   */
  public function create(Request $request) {
    $file = $this->getFileUpload($request);
    $dto = new BooleanDTO(false);
    if (assertThat($file, isNull())) {
      $extension = $file->getClientOriginalExtension();
      $uuid = StringUtils::generateUuid();
//      Storage::disk(WebConstant::PUBLIC_STORAGE)->put($uuid . '.' . $extension, File::get($file));
      StorageUtils::save($uuid . '.' . $extension, $file);
      $entry = new FileEntry();
      $entry->code = $uuid;
      $entry->mimetype = $file->getClientMimeType();
      $entry->original_filename = $file->getClientOriginalName();
      $entry->filename = $uuid . '.' . $extension;
      $dto->setSuccess($this->bo->add($entry));
    }
    return response()->json($dto->output());
  }
  
  public function remove($imgCode) {
    if (!empty($imgCode)) {
      $entry = $this->bo->loadByCode($imgCode);
      $dto = new BooleanDTO(false);
      if ($entry) {
        $dto->setSuccess($entry->delete());
      }
      return response()->json($dto->output());
    }
    return false;
  }

  protected function get($fileCode) {
    $entry = $this->bo->loadByCode($fileCode);
    return response(StorageUtils::loadByName($entry->filename), 200, array('Content-type' => $entry->mimetype));
  }
  
  /**
   * @param $fileCode
   *
   * @return string
   */
  protected function getPath($fileCode) {
    $entry = $this->bo->loadByCode($fileCode);
    return StorageUtils::getFilePath($entry->filename);
  }
  
  /**
   * Init Controller
   */
  public function init() {
    $this->bo = new FileEntryBO();
  }
}
