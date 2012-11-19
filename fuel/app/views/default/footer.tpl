<div class="footer">
	<hr class="footer_hr">
	<div>
		<ul class="footer-menu">
			<li>
				{$form_regulamin|default:""}
					<a href="#" onclick="document.regulamin.submit()" class="footer-link">Regulamin</a>
				</form>
			</li>
			<li>
				{$form_prawa_autorskie|default:""}
					<a href="#" onclick="document.prawa_autorskie.submit()" class="footer-link">Prawa autorskie</a>
				</form>
			</li>
			<li>
				{$form_kontakt|default:""}
					<a href="#" onclick="document.kontakt.submit()" class="footer-link">Kontakt</a>
				</form>
			</li>
			<li>
				{$form_zglos_blad|default:""}
					<a href="#" onclick="document.zglos_blad.submit()" class="footer-link">Zglos blad</a>
				</form>
			</li>
		</ul>
	</div>
</div>