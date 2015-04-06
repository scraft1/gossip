<div class="form-group">
  {!! Form::label('artist', 'Artist:') !!}
  {!! Form::text('artist', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
  {!! Form::label('title', 'Title:') !!}
  {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
  {!! Form::label('notes', 'Notes:') !!}
  {!! Form::textarea('notes', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
  {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>