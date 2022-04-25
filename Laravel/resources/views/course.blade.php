@extends('course_master')
@section('title', $course_name = $course_id->course_name)
@section('content')
{{$course_name}}
    @if(App\Models\User::findOrFail(Auth::id())->legitimacy!=0)
        <form action="{{route('coursepostcreate',$course_id->course_id)}}" method="GET">
            @csrf
            <input value="Anyag létrehozása" class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-2 rounded shadow-lg hover:shadow-xl transition duration-200" type="submit">
        </form>
    @endif
    @if($records = App\Models\CoursePost::orderBy('post_id','asc')->get())
        @foreach($records as $item)
            <tr>
                <td><a href="{{route('coursepost',$item)}}">{{$item->post_name}}</a></td>
                @if(App\Models\User::findOrFail(Auth::id())->legitimacy!=0)
                    <td>
                        <form action="{{route('coursepostdestroy', $item)}}" method="POST">
                            @csrf
                            <button type="submit" class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-2 rounded shadow-lg hover:shadow-xl transition duration-200">Törlés</button>
                        </form>
                    </td>
                @endif
            </tr>
        @endforeach
    @endif
@endsection
