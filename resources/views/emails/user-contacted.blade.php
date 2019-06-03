<p>Hi,</p>

<p><br />

{{$contact->name}} has contacted you on {{$contact->contact_date}},</p>
Please check below message.

{{ $contact->message }}

<p>Regards,</p>

<p>{{ config('app.name') }}</p>
