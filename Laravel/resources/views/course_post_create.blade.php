@extends('course_master')
@section('title', 'Tananyag készítés')
@section('content')
    <form method="POST" action="{{route('createcoursepost', $course_id)}}">
        @csrf
        <input value="Tananyag Cím" name="post_title">
        <input value="Tananyag Tartalom" name="post_content">
        <input type="submit" value="Kész">
    </form>

@endsection
