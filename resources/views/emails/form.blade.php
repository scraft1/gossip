<div class="form-group">
	{!! Form::label('subject', 'Subject:') !!}
	{!! Form::text('subject', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('to', 'To:') !!}
	{!! Form::text('to', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('from', 'From:') !!}
	{!! Form::text('from', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('body', 'Body:') !!}
	{!! Form::textarea('body', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group"> 
	{!! Form::label('sent_at', 'Sent On:') !!}
	{!! Form::input('date', 'sent_at', date('Y-m-d'), ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>