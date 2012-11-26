<h2><center>ZGŁOŚ BŁĄD</center></h2><br/>

W tym miejscu możesz zgłaszać zauważone błędy w serwisie <a href="www.tocorobimy.pl">ToCoRobimy.pl</a>.
Zachęcamy również do przesyłania propozycji usprawnienia serwisu oraz wprowadzenia nowych, ciekawych funkcjonalności.
Wszystkie propozycje rozpatrzymy, a najciekawsze z nich wprowadzimy w serwisie.<br/><br/>

<div id="report_page_messages">
	{$report_page_messages|default:""}
</div>

{$report_form.open}
<table class="report_page_div">
	<tr>
		<td>Imię i nazwisko:</td>
		<td>{$report_form.name|default:""}</td>
	</tr>
	<tr>
		<td>Telefon:</td>
		<td>{$report_form.phone|default:""}</td>
	</tr>
	<tr>
		<td>Twój e-mail:</td>
		<td>{$report_form.email|default:""}</td>
	</tr>
</table>
<table class="report_page_div">
	<tr>
		<td>Treść wiadomości:</td>
	</tr>
	<tr>
		<td colspan="2">{$report_form.message|default:""}</td>
	</tr>
</table>
	
<br/>
<div class="report_page_div">
	<div class="align_right">
		{$report_form.submit|default:""}
	</div>
</div>
{$report_form.close}
