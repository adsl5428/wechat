@extends('master')
@section('content')
    <form action="{{ URL('users/register') }}" method="post" >
        {{csrf_field()}}
        <lable>email</lable>
        <input type="text" name="email"  value="121232@qq.com"><br>
        <input type="submit"  value="注册">
    </form>
@endsection