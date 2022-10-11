aaaaaaaaaaaaa

<table>
@foreach($post as $post)
<tr>
<td>{{ $post-> id }}</td>
<td>{{ $post-> posts}}</td>
<td>{{ $post-> updated_at}}</td>
</tr>

@endforeach
</table>
