@extends('course_master')
@section('title', $course_post_name = $post_id->post_name)
@section('content')
    {{$course_post_name}}
    <br>
    {{$post_id->post}}
    <br>
    <form action="{{route('course',$post_id->course_id)}}" method="GET">
        <input type="submit" value="Vissza" class="border-t-2 bg-purple-600 hover:bg-purple-700 text-white font-bold py-2 rounded shadow-lg hover:shadow-xl transition duration-200">
    </form>

@endsection
