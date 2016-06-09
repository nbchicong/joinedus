<?php

namespace App\Http\Controllers\Admin;

use App\FileEntry;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;

class FileEntryController extends Controller {
  private function generateUuid() {
    return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
        mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),
        mt_rand( 0, 0xffff ),
        mt_rand( 0, 0x0fff ) | 0x4000,
        mt_rand( 0, 0x3fff ) | 0x8000,
        mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
    );
  }

  protected function listFile() {
    return response()->json(FileEntry::paginate(0));
  }

  /**
   * @param Request $request
   * @return FileEntry|null
   */
  public function saveToLocal(Request $request) {
    $file = $request->file('fileUpload');
    if ($file) {
      $extension = $file->getClientOriginalExtension();
      $uuid = $this->generateUuid();
      Storage::disk('local')->put($uuid . '.' . $extension, File::get($file));
      $entry = new FileEntry();
      $entry->code = $uuid;
      $entry->mimetype = $file->getClientMimeType();
      $entry->original_filename = $file->getClientOriginalName();
      $entry->filename = $file->getFilename() . '.' . $extension;
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
    $file = Storage::disk('local')->get($entry->code);
    return (new Response($file, 200))->header('Content-Type', $entry->mime);
  }

}
