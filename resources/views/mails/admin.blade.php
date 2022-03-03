<h1>U heeft een mail ontvangen!</h1>
<p>Hallo Support,</p>
<p>{{$data['name']}} heeft u een bericht gestuurd.</p>
<hr>
<p><b>Het bericht:</b></p>
<div style="border: 1px solid black; padding: 1em;">
    <p>{!! $data['message'] !!}</p>
</div>
<hr>
<p>U kunt reageren naar dit email adres:</p>
<a href="mailto:{{$data['email']}}">{{$data['email']}}</a>
<hr>
<sub>Letop! Deze mail is automatisch gegenereerd.<sub/>