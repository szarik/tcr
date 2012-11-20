<h2><center>ZGŁOŚ BŁĄD</center></h2><br/>

W tym miejscu możesz zgłaszać zauważone błędy w serwisie <a href="www.tocorobimy.pl">ToCoRobimy.pl</a>.
Zachęcamy również do przesyłania propozycji usprawnienia serwisu oraz wprowadzenia nowych, ciekawych funkcjonalności.
Wszystkie propozycje rozpatrzymy, a najciekawsze z nich wprowadzimy w serwisie.<br/><br/>

<div id="report_page_errors">
	{$report_page_errors|default:""}
</div>

<div id="report_page_div">
	Twój e-mail:<br/>
	{$report_form.open}
		{$report_form.email|default:""}<br/>
	Treść wiadomości:<br/>
		{$report_form.message|default:""}<br/><br/>
		<div class="align_right">
			{$report_form.submit|default:""}
		</div>
	{$report_form.close}
</div>