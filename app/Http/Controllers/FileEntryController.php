<?php

namespace App\Http\Controllers;

use Log;
use App\Utils\StringUtils;
use App\Model\FileEntry;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;

class FileEntryController extends AbstractController {
  private $storage = 'public_file_entry';
  protected function listFile() {
    return response()->json(FileEntry::paginate(0));
  }

  /**
   * @return FileEntry|null
   */
  public function saveToLocal() {
    $file = Input::file('fileUpload');
    if ($file) {
      $extension = $file->getClientOriginalExtension();
      $uuid = StringUtils::generateUuid();
      Storage::disk($this->storage)->put($uuid . '.' . $extension, File::get($file));
      $entry = new FileEntry();
      $entry->code = $uuid;
      $entry->mimetype = $file->getClientMimeType();
      $entry->original_filename = $file->getClientOriginalName();
      $entry->filename = $uuid . '.' . $extension;
      if ($entry->save())
        return $entry;
      return null;
    }
    return null;
  }

  protected function add(Request $request) {
    return response()->json(isset($this->saveToLocal($request)->code));
  }
  
  public static function remove($imgCode) {
    if (!empty($imgCode)) {
      $entry = FileEntry::where('code', '=', $imgCode)->firstOrFail();
      if ($entry) return $entry->delete();
      return false;
    }
    return false;
  }

  protected function get($fileName, $w=255, $h=237) {
    $entry = FileEntry::where('filename', '=', $fileName)->firstOrFail();
    $file = Storage::disk($this->storage)->get($entry->filename);
    return new Response($file, 200, array('Content-type' => $entry->mimetype));
  }

}
