<?php

namespace App\Model;

class FileEntry extends BaseModel {
  protected $primaryKey = 'id';
  protected $table = 'file_store';
  protected $fillable = array('code', 'filename', 'mimetype', 'original_filename');
}
