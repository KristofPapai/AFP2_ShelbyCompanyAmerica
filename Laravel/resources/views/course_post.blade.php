@extends('course_master')
@section('title', $course_post_name = $post_id->post_name)
@section('content')
    {{$course_post_name}}
    <br>
    {{$post_id->post}}
    <br>
    <form action="{{route('course',$post_id->course_id)}}" method="GET">
        <input type="submit" value="Vissza">
    </form>

@endsection
