<div class="container_index">
        <table style="width:100%">
            <tr>
                <th>Title</th>
                <th>Content</th>
                <th>Actions</th>
            </tr>
            @foreach($articles as $article)
            <tr>
                <td>{{$article->title}}</td>
                <td>{{$article->content}}</td>
            
                <td>
                    <a href="{{route('adminarticles.show', $article->id)}}">View</a> 
                    | <a href="{{route('adminarticles.edit', $article->id)}}">Edit</a>
                    <form action="#" method="post" onsubmit="return confirm('vuoi davvero cancellare questo fumetto?')">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger btn-sm">Destroy</button>
                    </form>
                     
                </td>
            </tr>
            @endforeach
        </table>
    </div>

    <div class="button">
        <a href="#">Add New Comic</a>
    </div>