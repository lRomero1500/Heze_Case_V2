Hello {{ $creaUsrMail->receiver }},
This is a demo email for testing purposes! Also, it's the HTML version.

Demo object values:

Demo One: {{ $creaUsrMail->demo_one }}
Demo Two: {{ $creaUsrMail->demo_two }}

Values passed by With method:

testVarOne: {{ $testVarOne }}
testVarOne: {{ $testVarOne }}

Thank You,
{{ $creaUsrMail->sender }}