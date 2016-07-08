<?php

namespace App\Http\Controllers;

use Log;
use App\Utils\StringUtils;
use App\FileEntry;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;

class FileEntryController extends Controller {
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
      Storage::disk('local')->put($uuid . '.' . $extension, File::get($file));
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

  protected function get($code) {
    $entry = FileEntry::where('code', '=', $code)->firstOrFail();
    Log::debug('IMG Code');
    Log::debug($entry->code.' - '. $entry->mimetype);
    $file = Storage::disk('local')->get($entry->filename);
    return new Response($file, 200, array('Content-type' => $entry->mimetype));
  }

}
