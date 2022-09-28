@component('mail::message')
    # Contact Us Mail Feedback

    Name: {{ $data['name'] }}
    Subject: {{ $data['subject'] }}
    Email: {{ $data['email'] }}
    Phone: {{ $data['phone'] }}
    Message: {{ $data['message'] }}

    Thanks.
    {{ config('app.name') }}
@endcomponent
