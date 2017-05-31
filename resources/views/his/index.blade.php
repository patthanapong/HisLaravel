
<h1>Hello History</h1>
@if(Session::has('message'))
    <div class="alert alert-info">
        {{ Session::get('message') }}
    </div>
@endif
<table border="1">
  <thead>
    <tr>
      <td>ID</td>
      <td>Name</td>
      <td>Surname</td>
      <td>Address</td>
      <td>Department</td>
      <td width="200">Action</td>
    </tr>
  </thead>
  <tbody>
    @forelse ($his as $l)
      <tr>
        <td> {{ $l['id'] }} </td>
        <td> {{ $l['name'] }} </td>
        <td> {{ $l['surname'] }} </td>
        <td> {{ $l['address'] }} </td>
        <td> {{ $l['department'] }} </td>
        <td>
          {{ Form::open(['route' => ['his.destroy',$l['id'], 'method' => "DELETE"] ]) }}
         <input type="hidden" name="_method" value="delete" />
            {{ Html::link('his/'.$l['id'], 'View') }}
            {{ Html::link('his/'.$l['id'].'/edit', 'Edit') }}
            {{ Form::submit('Delete') }}
            {{ Form::close() }}
        </td>
      </tr>
    @empty
      <tr>
    <td colspan="6">No data</td>
  </tr>
    @endforelse

  </tbody>
</table>
<div class="row">
  <div class="col-xs-5">
    {{ Html::link('his/create', 'Add') }}
  </div>
  </div>
