<?php

namespace App\Http\Controllers;

use App\Http\Model\Order;
use function asset;
use function dd;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

class LoanController extends Controller
{

    public function test2(Request $request)
    {
        $img = Order::find(1)->pictures;
        dd($img);
    }
    public function test(Request $request)
    {

        if ($request->isMethod('post'))
        {

//            dd(Input::all());
//            $base64_image_content = $_POST['img'];
//
//            if (preg_match('/^(data:\s*image\/(\w+);base64,)/', $base64_image_content, $result)){
//                $type = $result[2]; //jpeg
//                $img = base64_decode(str_replace($result[1], '', $base64_image_content)); //返回文件流
//            }
//
////var_dump($_POST); //string(1507) "data:image/jpeg;base64,/9j/4AAQSkZJR...
////var_dump($result); //"data:image/jpeg;base64,"  "data:image/jpeg;base64,"   "jpeg"
////var_dump($img); //返回的是资源，直接使用<img src="$img" />可以显示图片
//
//            /* 输出到文件 */
////方式一：直接使用file_put_contents
//            $tmp_file = date('mdHis') . mt_rand(100, 999). '.' .$type;
//            $tmp_file =  'uploads/' . $tmp_file;
////            file_put_contents($tmp_file, $img); //可以直接将文件流保存为本地图片
//
////方式二：先转换为GD图像资源，再生成文件或显示输出
//            $im = imagecreatefromstring($img); //resource(2) of type (gd) 图像资源
//            imagejpeg ($im, $tmp_file); //图像流（image）以 JPEG 格式输出到标准输出(浏览器或者文件)
//
////或者使用AliOSS上传
////$url = OSS::upload($img, $type);
//            //return 'hello';
//            return $this->ajaxReturn($tmp_file);
//
//
//            dd(Input::all());
            $file = $request->file('file');
//            dd(Input::all());
            if($file -> isValid()) {
                $entension = $file->getClientOriginalExtension(); //上传文件的后缀.
                $newName =$request->leixing. date('-mdHis-Y-') . mt_rand(100, 999) . '.' . $entension;
                Storage::put($newName,file_get_contents($file->getRealPath()));

//                $path = $file->move(base_path() . '/public/uploads', $newName);
//                $filepath = 'uploads/' . $newName;

//                dd(base_path() . '/uploads', $newName);
                //return $filepath;
//                $url = $newName;
//                $data = [
//
//                    'msg' => $url,
//                ];
//                $name = iconv('utf-8','gb2312',$file['name']);
//                Storage::move($request->leixing.$newName,$newName);
                return 'uploads/' .$newName;
            }
            else
            {
                exit('文件上传出错！');
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
        $names[0] =['身份证',11,'shen-fen-zheng'] ;
        $names[1] =['户口本',12,'hu-kou'] ;
        return view('test',compact('names'));
    }
    public function loan1(Request $request,$id = null)    //这里是流程1.  返回页面  通过session 记录是什么项目,
    {
//        dd($id);
        if ($id == 'yidi')              //一抵
        {
            $request->session()->put('project', '11');
            return redirect('loan2');           //要用重定向 , 用view的话  会飞到loan1/yidi
        }
        if ($request->isMethod('post'))
        {
            $data = [
                'status' => 1,
                'msg' => 'loan2',
            ];
            $request->session()->put('project', '11');  //
//            dd($request->session()->get('project'));
            return $data;
        }
        return view('loan1');
    }
                                            //loan2  先检查是否接过本身份证 同项目的单子
    public function loan2(Request $request)   //这里是流程2. 取项目session 判断 流程1 , 不符合就返回 流程1 页面
    {                                         // 到这里把项目和流程写到数据库
//        if ($request->session()->get('project') != '11')
//        {return redirect('/loan1');}

        if ($request->isMethod('post'))
        {
//            dd(Input::except('_token'));
//            $userinfo = Order::where('idcard',$request->idcard)->first();
//            if ($userinfo != null && $userinfo->project == $request->session()->get('project')){
//                $data = [
//                    'status' => 0,
//                    'msg' => '此身份证已在此项目进件',
//                ];
//            return $data;}
//            dd($request->except('_token'));
            $order = Order::create($request->except('_token'));
            $order->status = 1;                 //步骤1 提交 借款人 身份信息
            $order->save();

            $data = [
                'status' => 1,
                'msg' => 'loan3',
            ];
            $request->session()->put('status', '1');  //步骤1
            return $data;

        }
        return view('loan2');
    }
    public function loan3(Request $request)  //这里是流程3 .  取项目session 判断 流程1 , 不符合就返回 流程2 页面
    {                                        //走完流程, 清除 status   $request->session()->forget('status');
//        if ($request->session()->get('status') != 2)
//            return redirect('/nopower');
        if ($request->isMethod('post'))
        {
//            dd(Input::all());
            $data = [
                'status' => 1,
                'msg' => 'loan3',
            ];
            return $data;
        }
      $request->session()->forget('status');  //步骤3
        $names[0] =['身份证',11,'shen-fen-zheng'] ;
        $names[1] =['户口本',12,'hu-kou-ben'] ;
        $names[2] =['征信报告',13,'zheng-xin'] ;
        $names[3] =['房产证',14,'fang-chan'] ;
        $names[4] =['婚姻关系证明',15,'hun-yin'] ;
        $names[5] =['其他',16,'qi-ta'] ;
        return view('loan3',compact('names'));
    }
    public function del(Request $request)
    {
//        dd(Storage::disk('local'));
//        return 123;
        if ($request->isMethod('post'))
        {
//            $a = '20170618125657975.jpg';
//            dd($request->get('jpg'));
            $file = $request->get('jpg');
            $filename = explode('/',$file);
            Storage::delete($filename[1]);
//            dd($request->get('jpg'));

            $data = [
                'status' => 1,
                'msg' => 'T',
            ];
            return $data;
        }

    }
}
