@extends('course_master')
@section('title', 'Tananyag készítés')
@section('content')
    <form method="POST" action="{{route('createcoursepost', $course_id)}}">
        @csrf
        <input value="Tananyag Cím" name="post_title" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-purple-600 transition duration-500 px-3 pb-3">

        <input value="Tananyag Tartalom" name="post_content" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-purple-600 transition duration-500 px-3 pb-3">
        <input type="submit" value="Kész" class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-2 rounded shadow-lg hover:shadow-xl transition duration-200">

    </form>
    

@endsection
