<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImportImage
{
  public static function save(Request $request, $inputName = 'image' ,$name = '', $folderSave = 'public/trash', $validate = false, $folderDate = false){
    try {
      if ($validate) {
        $request->validate([
          $inputName => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
      }

      $nFile = '';
      if ($folderDate) {
        $folderSave .= '/' . date('Y') . '/' . date('m');
        $nFile = date('Y') . '/' . date('m') . '/';
      }

      $file = $request->file($inputName);
      $filename = $name .'.'. $file->getClientOriginalExtension();
      $file->storeAs($folderSave,$filename);
      return $nFile.$filename;
    } catch (\Throwable $th) {
      return 400;
    }
  }
}
