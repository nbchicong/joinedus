<?php

namespace App\Model;

class FileEntry extends BaseModel {
  protected $table = 'file_store';
  protected $fillable = array('code', 'filename', 'mimetype', 'original_filename');
}
