<?php

namespace App\Http\Controllers;

use function asset;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;

class LoanController extends Controller
{
    public function test(Request $request)
    {
        if ($request->isMethod('post'))
        {
            dd(Input::all());
            $file = Input::file('file');
            //dd($request);
            if($file -> isValid()) {
                $entension = $file->getClientOriginalExtension(); //上传文件的后缀.
                $newName = date('YmdHis') . mt_rand(100, 999) . '.' . $entension;
                $path = $file->move(base_path() . '/public/uploads', $newName);
                $filepath = 'uploads/' . $newName;

//                dd(base_path() . '/uploads', $newName);
                //return $filepath;
                $data =

                    asset('uploads/'.$newName)
                    ;
                return $data;
            }
            $typeArr = array("jpg", "png", "gif");//允许上传文件格式
            $path = "files/";//上传路径
            if (isset($_POST)) {
                if($_GET['get']=="upimg"){
                    $name = $_FILES['file']['name'];
                    $size = $_FILES['file']['size'];
                    $name_tmp = $_FILES['file']['tmp_name'];
                    if (empty($name)) {
                        echo json_encode(array("error"=>"您还未选择图片"));
                        exit;
                    }
                    $type = strtolower(substr(strrchr($name, '.'), 1)); //获取文件类型

                    if (!in_array($type, $typeArr)) {
                        echo json_encode(array("error"=>"清上传jpg,png或gif类型的图片！"));
                        exit;
                    }
                    if ($size > (1024 * 1024 * 10)) {
                        echo json_encode(array("error"=>"图片大小已超过10MB！"));
                        exit;
                    }

                    $pic_name = time() . rand(10000, 99999) . "." . $type;//图片名称
                    $pic_url = $path . $pic_name;//上传后图片路径+名称
                    if (move_uploaded_file($name_tmp, $pic_url)) { //临时文件转移到目标文件夹
                        echo json_encode(array("error"=>"0","pic"=>$pic_url,"name"=>$pic_name));
                    } else {
                        echo json_encode(array("error"=>"上传有误，清检查服务器配置！"));
                    }
                }
                if($_GET['get']=="delimg"){
                    $imgsrc = $_GET['imgurl'];
                    unlink($imgsrc);
                    echo 1;
                }
            }
        }
        return view('test');
    }
    public function loan1(Request $request)
    {
        if ($request->isMethod('post'))
        {
            $data = [
                'status' => 1,
                'msg' => 'loan2',
            ];
            return $data;
        }
        return view('loan1');
    }

    public function loan2(Request $request)
    {
        if ($request->isMethod('post'))
        {
            dd(Input::all());
            $data = [
                'status' => 1,
                'msg' => 'loan2',
            ];
        }
        return view('loan2');
    }
}
