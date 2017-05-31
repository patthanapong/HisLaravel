
<h1>Form</h1>
<div>
    <div>
        @if(isset($his))
            <h1>(Edit Form)</h1>
        @else
            <h1>Add Form</h1>
        @endif
    </div>
    <br>
    @if(isset($his))
        {{ Form::open(['method' => 'put', 'route' => ['his.update', $his->id] ]) }}
    @else
        {{ Form::open(['url' => 'his']) }}
    @endif

    @if (count($errors) > 0)
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif

    <div class="row">
          <div class="col-xs-2">
              {{ Form::label('name', 'Name') }}
          </div>
          <div class="col-xs-5">
              @if(isset($his->name))
                  {{ Form::text('name',$his->name) }}
              @else
                  {{ Form::text('name','') }}
              @endif
          </div>
      </div>
<br>
      <div class="row">
            <div class="col-xs-2">
                {{ Form::label('surname', 'Surname') }}
            </div>
            <div class="col-xs-5">
                @if(isset($his->surname))
                    {{ Form::text('surname',$his->surname) }}
                @else
                    {{ Form::text('surname','') }}
                @endif
            </div>
        </div>
<br>
        <div class="row">
              <div class="col-xs-2">
                  {{ Form::label('address', 'Address') }}
              </div>
              <div class="col-xs-5">
                  @if(isset($his->address))
                      {{ Form::text('address',$his->address) }}
                  @else
                      {{ Form::text('address','') }}
                  @endif
              </div>
          </div>
<br>
          <div class="row">
                <div class="col-xs-2">
                    {{ Form::label('department', 'Department') }}
                </div>
                <div class="col-xs-5">
                    @if(isset($his->department))
                        {{ Form::text('department',$his->department) }}
                    @else
                        {{ Form::text('department','') }}
                    @endif
                </div>
            </div>
<br>
            <div class="row">
                  <div class="col-xs-5">
                          {{ Form::submit('Save') }}
                  </div>
              </div>


        {{ Form::close() }}
      </div>
