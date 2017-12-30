<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Price;
use Validator;
use Illuminate\Support\Facades\DB;

class PricesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prices = Price::all();
        return view('admin.prices.index', compact('prices'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function upload(Request $request)
    {
        $this->validate($request, [
            'csv_file' => 'required|mimes:txt|max:1000'
        ]);
        $file = $request->file('csv_file');

//        if ($file->getClientOriginalExtension() !== 'csv') {
//            \Session::flash('flash_message', 'CSVファイルのみアップロードできます。');
//            return redirect(route('admin::prices'));
//        }

        $reader = \Excel::load($file->getRealPath())->get();
        $rows = $reader->toArray();

        if(count($rows)){
            // 全て削除
//            Price::truncate();

            $errorMessage = null;

            // 1行ずつバリデーション
            foreach ($rows as $row) {

                // カラム数の確認
                if (count($row) > 4) {
                    $errorMessage = '列の数が多いです。';
                    break;
                }

                $validator = Validator::make($row, [
                    'code' => 'required',
                    'name' => 'required',
                    'price' => 'required|integer',
                ]);

                if ($validator->fails()) {
                    $errorMessage = '項目に謝りがあります。';
                    break;
                }
//                Price::firstOrCreate($row);
            }

            // エラーがあったら戻す
            if ($errorMessage) {
                return redirect()
                    ->route('admin::prices')
                    ->with('flash_message', $errorMessage);
            }


            // 全て削除してから保存
            DB::transaction(function () use ($rows) {
                DB::table('prices')->delete();
                DB::table('prices')->insert($rows);
            });
        }

        return redirect()
            ->route('admin::prices')
            ->with('flash_message', '価格表を更新しました。');
    }


    public function download(){
        $price = Price::get()->toArray();
        return \Excel::create('price', function($excel) use ($price) {
            $excel->sheet('sheet', function($sheet) use ($price)
            {
                $sheet->fromArray($price);
            });
        })->download('csv');
    }

}

