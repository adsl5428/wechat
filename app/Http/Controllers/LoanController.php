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

            $base64_image_content = $_POST['img'];

            if (preg_match('/^(data:\s*image\/(\w+);base64,)/', $base64_image_content, $result)){
                $type = $result[2]; //jpeg
                $img = base64_decode(str_replace($result[1], '', $base64_image_content)); //返回文件流
            }

//var_dump($_POST); //string(1507) "data:image/jpeg;base64,/9j/4AAQSkZJR...
//var_dump($result); //"data:image/jpeg;base64,"  "data:image/jpeg;base64,"   "jpeg"
//var_dump($img); //返回的是资源，直接使用<img src="$img" />可以显示图片

            /* 输出到文件 */
//方式一：直接使用file_put_contents
            $tmp_file = date('mdHis') . mt_rand(100, 999). '.' .$type;
            $tmp_file =  'uploads/' . $tmp_file;
//            file_put_contents($tmp_file, $img); //可以直接将文件流保存为本地图片

//方式二：先转换为GD图像资源，再生成文件或显示输出
            $im = imagecreatefromstring($img); //resource(2) of type (gd) 图像资源
            imagejpeg ($im, $tmp_file); //图像流（image）以 JPEG 格式输出到标准输出(浏览器或者文件)

//或者使用AliOSS上传
//$url = OSS::upload($img, $type);
            //return 'hello';
            return $this->ajaxReturn($tmp_file);


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
    public function loan1(Request $request)    //这里是流程1.  返回页面  通过session 记录是什么项目, 和记录流程1  已经完成
    {
        if ($request->isMethod('post'))
        {
            $data = [
                'status' => 1,
                'msg' => 'loan2',
            ];
            return $data;
        }
        $request->session()->put('flow', '1');  //test
        return view('loan1');
    }
                                            //loan2  先检查是否接过本身份证 同项目的单子
    public function loan2(Request $request)   //这里是流程2. 取项目session 判断 流程1 , 不符合就返回 流程1 页面
    {                                         // 到这里把项目和流程写到数据库
        if ($request->isMethod('post'))
        {
            dd(Input::all());
            $data = [
                'status' => 1,
                'msg' => 'loan3',
            ];
        }
        dd($request->session()->get('flow'));  //test
        return view('loan2');
    }
    public function loan3(Request $request)  //这里是流程3 .  取项目session 判断 流程1 , 不符合就返回 流程2 页面
    {                                        //走完流程, 清除 flow   $request->session()->forget('flow');
        if ($request->isMethod('post'))
        {
            dd(Input::all());
            $data = [
                'status' => 1,
                'msg' => 'loan3',
            ];
        }
        dd($request->session()->get('flow'));  //test
        return view('loan3');
    }
    public function ajaxReturn($data = array(), $code = 0, $msg = '成功'){
        $result =  array(
            'result' => $data,
            'ecd' => $code,
            'msg' => $msg,
        );

        echo json_encode($result);
        exit;
    }

}
