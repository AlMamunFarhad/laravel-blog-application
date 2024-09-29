@extends('layouts.admin')

@section('styles')
<link href="resources/admin/css/styles.css" rel="stylesheet" />
@endsection

@section('content')
        {{-- <div class="row"> --}}
               <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    {{-- DataTable Example --}}
                    All Posts
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>User Name</th>
                                <th>Title</th>
                                <th>Comment</th>
                                <th>Created Date</th>
                                <th>Update Date</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Office</th>
                                <th>Age</th>
                                <th>Start date</th>
                                <th>Salary</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach($posts as $post)
                            <tr>
                                <td>{{$post->id}}</td>
                                <td>{{$post->user->name}}</td>
                                <td>{{$post->title}}</td>
                                <td> 
                                @if (isset($post->comments[0]))
                                    {{$post->comments[0]->id}}
                                @else
                                    No Comments
                                @endif
                                </td>
                                <td>{{$post->created_at->diffForHumans()}}</td>
                                <td>{{$post->updated_at}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
		{{-- </div>  --}}
        {{-- End row --}}

@endsection

{{-- scripts cdn --}}
@section('scripts')
      <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
@endsection


