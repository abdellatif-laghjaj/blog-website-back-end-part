@component('mail::message')
# Contact Us Mail Feedback

<p>Name: {{ $data['name'] }}</p>
<p>Email: {{ $data['email'] }}</p>
<p>Phone: {{ $data['phone'] }}</p>
<p>Message: {{ $data['message'] }}</p>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
