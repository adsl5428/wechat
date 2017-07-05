<?php

namespace App\Http\Controllers;

use App\Http\Model\Order;
use App\Http\Model\Picture;
use function asset;
use function dd;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use function var_dump;

class LoanController extends Controller
{

    public function edit2(Request $request)
    {
        $teshu = $request->session()->get('teshu');
        $names[0] =['身份证',101,'shen-fen-zheng'] ;
        $names[1] =['户口本',102,'hu-kou-ben'] ;
        $names[2] =['征信报告',103,'zheng-xin'] ;
        $names[3] =['房产证',104,'fang-chan'] ;
        $names[4] =['婚姻关系证明',105,'hun-yin'] ;
        if ($teshu[0] == 1)
        {$names[5] =['备用房产证',106,'li-hun'] ;}
        if ($teshu[1] == 1)
        {$names[6] =['离婚协议',107,'li-hun'] ;}
        $names[7] =['其他',108,'qi-ta'] ;
        $request->session()->forget('teshu');  //步骤3
        $pictures = Order::find($request->session()->get('order_id'))->pictures;
//        dd($pictures);
        return view('edit.edit2',compact('names','pictures'));
    }

    public function edit1($id)
    {
        $order = Order::where('id',$id)->get(['id','name','idcard','money','qingkuang','teshu'])->first();
        return view('edit.edit1',compact('order'));
    }
    public function test(Request $request)
    {

        if ($request->isMethod('post'))
        {
            $file = $request->file('file');
            if($file -> isValid()) {
                $entension = $file->getClientOriginalExtension(); //上传文件的后缀.
                $newName =$request->leixing. date('-mdHis-Y-') . mt_rand(100, 999) . '.' . $entension;
                Storage::put($newName,file_get_contents($file->getRealPath()));
                $path = 'uploads/' .$newName;
//                dd(Input::get('type1'));
                $temp = [
                        'order_id'=>$request->session()->get('order_id'),
                    'path'=>$newName,
                    'type'=>$request->get('type1')-100,
                ];
//                dd($temp);
                $pictur = Picture::create($temp);
                $pictur->save();
//                $path = $file->move(base_path() . '/public/uploads', $newName);
//                $filepath = 'uploads/' . $newName;

//                dd(base_path() . '/uploads', $newName);
                //return $filepath;
//                $url = $newName;
                $data = [
                    'eg' => $pictur->id,
                    'path' => $path,
                ];
//                $name = iconv('utf-8','gb2312',$file['name']);
//                Storage::move($request->leixing.$newName,$newName);
                return $data;
            }
            else
            {
                exit('文件上传出错！');
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
            $request->session()->put('project', '一抵');
            return redirect('loan2');           //要用重定向 , 用view的话  会飞到loan1/yidi
        }
        elseif ($id == 'erdi')
        {
            $request->session()->put('project', '二抵');
            return redirect('loan2');           //要用重定向 , 用view的话  会飞到loan1/erdi
        }
        elseif ($id == 'gps')
        {
            $request->session()->put('project', 'GPS');
            return redirect('loan22');           //要用重定向 , 用view的话  会飞到loan1/erdi
        }
        elseif ($id == 'yache')
        {
            $request->session()->put('project', '押车');
            return redirect('loan22');           //要用重定向 , 用view的话  会飞到loan1/erdi
        }
        if ($request->isMethod('post'))
        {
            $data = [
                'status' => 1,
                'msg' => 'loan2',
            ];
//            $request->session()->put('project', '11');  //
//            dd($request->session()->get('project'));
            return $data;
        }
        return view('loan1');
    }
                                            //loan2  先检查是否接过本身份证 同项目的单子
    public function loan2()   //这里是流程2. 取项目session 判断 流程1 , 不符合就返回 流程1 页面
    {                                         // 到这里把项目和流程写到数据库
        return view('loan2');
    }
    public function loan22()   //这里是流程2. 取项目session 判断 流程1 , 不符合就返回 流程1 页面
    {                                         // 到这里把项目和流程写到数据库
        return view('loan22');
    }
    public function loan3(Request $request)
    {
        $project = $request->session()->get('project');
        if($project == null)
            return view('loan1');
       $teshu = $request->session()->get('teshu');
//        $names[0] =['身份证',101,'shen-fen-zheng'] ;
        $names[3] =['房产证',104,'fang-chan'] ;
//        $names[1] =['户口本',102,'hu-kou-ben'] ;
//        $names[2] =['征信报告',103,'zheng-xin'] ;
//        $names[4] =['婚姻关系证明',105,'hun-yin'] ;
//        if ($teshu[0] == 1)
//        {$names[5] =['备用房产证',106,'li-hun'] ;}
//        if ($teshu[1] == 1)
//        {$names[6] =['离婚协议',107,'li-hun'] ;}
//        $names[7] =['其他',108,'qi-ta'] ;
        $request->session()->forget('teshu');  //步骤3
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
            Picture::destroy($request->get('eg'));
//            dd($request->get('jpg'));

            $data = [
                'status' => 1,
                'msg' => 'T',
            ];
            return $data;
        }

    }

}
