<?php

namespace App\Http\Controllers\Admin\Site;

use App\Models\Site\City;
use App\UseCases\ImageService;
use App\UseCases\Size;
use Illuminate\Http\Request;
use Storage;
use Validator;

class AjaxController extends AppController
{
    public function select($id)
    {
        if (!preg_match("/[0-9]+/i", $id)) {
            return 'ERROR Не корректные данные!';
        }
        $citys = getArray(City::orderBy('name')->where('countri_id', $id)->pluck('name', 'id')->all());
        if (!$citys) {
            return ['error' => 'ERROR'];
        }
        return ['succes' => view('admin.ajax.select', compact('citys'))->render()];
    }

    /*-------------------------------------------------------------
     * Метод принимает и сохраняет фото Ajax запросом из CKEDITOR
     *------------------------------------------------------------*/
    public function upload(Request $request)
    {
        $v = Validator::make($request->all(), [
            'upload' => 'required|image',
        ]);

        $funcNum = $request->input('CKEditorFuncNum');

        if ($v->fails()) {
            return response(
                "<script>
                    window.parent.CKEDITOR.tools.callFunction({$funcNum}, '', '{$v->errors()->first()}');
                </script>"
            );
        }

        $file = $request->file('upload');
        $filename = str_random(20) . '.' . $file->extension();

        $img = new ImageService(new Size('0x0'));

        $img->saveImage($file, storage_path('app/public/pics/uploads/').$filename);

        $url = Storage::url('pics/uploads/'.$filename);

        return response(
            "<script>
                window.parent.CKEDITOR.tools.callFunction({$funcNum}, '{$url}'/*, 'Изображение успешно загружено'*/);
            </script>"
        );
    }
}
