if (jQuery || typeof jQuery != "undefined") {
	$(function () {
		var map_lokalizator;
		var bounds_lokalizator = new google.maps.LatLngBounds();

		function gmap_lokalizator() {
			var o = {zoom:13,
				center:new google.maps.LatLng(51.107885, 17.038538),
				mapTypeId:google.maps.MapTypeId.ROADMAP
			};

			map_lokalizator = new google.maps.Map(document.getElementById("lokalizator"), o);

			var point_marker1 = new google.maps.LatLng(51.11152010, 17.03170840);
			var marker_main1 = new google.maps.Marker({
				map: map_lokalizator,
				position: point_marker1
				});
			bounds_lokalizator.extend(point_marker1);

			var point_marker2 = new google.maps.LatLng(51.10902010, 17.02339440);
			var marker_main2 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker2});
			bounds_lokalizator.extend(point_marker2);
			var point_marker3 = new google.maps.LatLng(51.111919, 17.029806);
			var marker_main3 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker3});
			bounds_lokalizator.extend(point_marker3);
			var point_marker4 = new google.maps.LatLng(51.111887, 17.029734);
			var marker_main4 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker4});
			bounds_lokalizator.extend(point_marker4);
			var point_marker5 = new google.maps.LatLng(51.073607, 17.009614);
			var marker_main5 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker5});
			bounds_lokalizator.extend(point_marker5);
			var point_marker6 = new google.maps.LatLng(51.11401, 17.066381);
			var marker_main6 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker6});
			bounds_lokalizator.extend(point_marker6);
			var point_marker7 = new google.maps.LatLng(51.038245, 16.974257);
			var marker_main7 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker7});
			bounds_lokalizator.extend(point_marker7);
			var point_marker8 = new google.maps.LatLng(51.111665, 17.029692);
			var marker_main8 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker8});
			bounds_lokalizator.extend(point_marker8);
			var point_marker9 = new google.maps.LatLng(51.110335, 17.030378);
			var marker_main9 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker9});
			bounds_lokalizator.extend(point_marker9);
			var point_marker10 = new google.maps.LatLng(51.11016, 17.028944);
			var marker_main10 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker10});
			bounds_lokalizator.extend(point_marker10);
			var point_marker11 = new google.maps.LatLng(51.1008, 17.026169);
			var marker_main11 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker11});
			bounds_lokalizator.extend(point_marker11);
			var point_marker12 = new google.maps.LatLng(51.112767, 17.034659);
			var marker_main12 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker12});
			bounds_lokalizator.extend(point_marker12);
			var point_marker13 = new google.maps.LatLng(51.09984, 17.022952);
			var marker_main13 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker13});
			bounds_lokalizator.extend(point_marker13);
			var point_marker14 = new google.maps.LatLng(51.107802, 17.050921);
			var marker_main14 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker14});
			bounds_lokalizator.extend(point_marker14);
			var point_marker15 = new google.maps.LatLng(51.109337, 17.031068);
			var marker_main15 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker15});
			bounds_lokalizator.extend(point_marker15);
			var point_marker16 = new google.maps.LatLng(51.104874, 17.038497);
			var marker_main16 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker16});
			bounds_lokalizator.extend(point_marker16);
			var point_marker17 = new google.maps.LatLng(51.085602, 17.047393);
			var marker_main17 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker17});
			bounds_lokalizator.extend(point_marker17);
			var point_marker18 = new google.maps.LatLng(51.13369, 17.081187);
			var marker_main18 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker18});
			bounds_lokalizator.extend(point_marker18);
			var point_marker19 = new google.maps.LatLng(51.099925, 17.029871);
			var marker_main19 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker19});
			bounds_lokalizator.extend(point_marker19);
			var point_marker20 = new google.maps.LatLng(51.110786, 17.032473);
			var marker_main20 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker20});
			bounds_lokalizator.extend(point_marker20);
			var point_marker21 = new google.maps.LatLng(51.110436, 17.025471);
			var marker_main21 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker21});
			bounds_lokalizator.extend(point_marker21);
			var point_marker22 = new google.maps.LatLng(51.110192, 17.032915);
			var marker_main22 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker22});
			bounds_lokalizator.extend(point_marker22);
			var point_marker23 = new google.maps.LatLng(51.109607, 17.034035);
			var marker_main23 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker23});
			bounds_lokalizator.extend(point_marker23);
			var point_marker24 = new google.maps.LatLng(51.08252, 16.963958);
			var marker_main24 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker24});
			bounds_lokalizator.extend(point_marker24);
			var point_marker25 = new google.maps.LatLng(51.108521, 17.031376);
			var marker_main25 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker25});
			bounds_lokalizator.extend(point_marker25);
			var point_marker26 = new google.maps.LatLng(51.107982, 17.037156);
			var marker_main26 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker26});
			bounds_lokalizator.extend(point_marker26);
			var point_marker27 = new google.maps.LatLng(51.091794, 17.043889);
			var marker_main27 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker27});
			bounds_lokalizator.extend(point_marker27);
			var point_marker28 = new google.maps.LatLng(51.113421, 17.033703);
			var marker_main28 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker28});
			bounds_lokalizator.extend(point_marker28);
			var point_marker29 = new google.maps.LatLng(51.113687, 17.034191);
			var marker_main29 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker29});
			bounds_lokalizator.extend(point_marker29);
			var point_marker30 = new google.maps.LatLng(51.139715, 17.061091);
			var marker_main30 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker30});
			bounds_lokalizator.extend(point_marker30);
			var point_marker31 = new google.maps.LatLng(51.113473, 17.056155);
			var marker_main31 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker31});
			bounds_lokalizator.extend(point_marker31);
			var point_marker32 = new google.maps.LatLng(51.110588, 17.031997);
			var marker_main32 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker32});
			bounds_lokalizator.extend(point_marker32);
			var point_marker33 = new google.maps.LatLng(51.104743, 17.080021);
			var marker_main33 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker33});
			bounds_lokalizator.extend(point_marker33);
			var point_marker34 = new google.maps.LatLng(51.120946, 17.042969);
			var marker_main34 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker34});
			bounds_lokalizator.extend(point_marker34);
			var point_marker35 = new google.maps.LatLng(51.111032, 17.03376);
			var marker_main35 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker35});
			bounds_lokalizator.extend(point_marker35);
			var point_marker36 = new google.maps.LatLng(51.110335, 17.030378);
			var marker_main36 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker36});
			bounds_lokalizator.extend(point_marker36);
			var point_marker37 = new google.maps.LatLng(51.104874, 17.038497);
			var marker_main37 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker37});
			bounds_lokalizator.extend(point_marker37);
			var point_marker38 = new google.maps.LatLng(51.100143, 17.02897);
			var marker_main38 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker38});
			bounds_lokalizator.extend(point_marker38);
			var point_marker39 = new google.maps.LatLng(51.110102, 17.028386);
			var marker_main39 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker39});
			bounds_lokalizator.extend(point_marker39);
			var point_marker40 = new google.maps.LatLng(51.100638, 17.027412);
			var marker_main40 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker40});
			bounds_lokalizator.extend(point_marker40);
			var point_marker41 = new google.maps.LatLng(51.129947, 16.967797);
			var marker_main41 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker41});
			bounds_lokalizator.extend(point_marker41);
			var point_marker42 = new google.maps.LatLng(51.112286, 17.062533);
			var marker_main42 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker42});
			bounds_lokalizator.extend(point_marker42);
			var point_marker43 = new google.maps.LatLng(51.110267, 17.034163);
			var marker_main43 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker43});
			bounds_lokalizator.extend(point_marker43);
			var point_marker44 = new google.maps.LatLng(51.110256, 17.029382);
			var marker_main44 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker44});
			bounds_lokalizator.extend(point_marker44);
			var point_marker45 = new google.maps.LatLng(51.126063, 16.996142);
			var marker_main45 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker45});
			bounds_lokalizator.extend(point_marker45);
			var point_marker46 = new google.maps.LatLng(51.101155, 17.025041);
			var marker_main46 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker46});
			bounds_lokalizator.extend(point_marker46);
			var point_marker47 = new google.maps.LatLng(51.114041, 17.096912);
			var marker_main47 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker47});
			bounds_lokalizator.extend(point_marker47);
			var point_marker48 = new google.maps.LatLng(51.110436, 17.025471);
			var marker_main48 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker48});
			bounds_lokalizator.extend(point_marker48);
			var point_marker49 = new google.maps.LatLng(51.11188, 17.031283);
			var marker_main49 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker49});
			bounds_lokalizator.extend(point_marker49);
			var point_marker50 = new google.maps.LatLng(51.109986, 17.033396);
			var marker_main50 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker50});
			bounds_lokalizator.extend(point_marker50);
			var point_marker51 = new google.maps.LatLng(51.115009, 17.103788);
			var marker_main51 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker51});
			bounds_lokalizator.extend(point_marker51);
			var point_marker52 = new google.maps.LatLng(51.108547, 17.02893);
			var marker_main52 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker52});
			bounds_lokalizator.extend(point_marker52);
			var point_marker53 = new google.maps.LatLng(51.110326, 17.033469);
			var marker_main53 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker53});
			bounds_lokalizator.extend(point_marker53);
			var point_marker54 = new google.maps.LatLng(51.110634, 17.024532);
			var marker_main54 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker54});
			bounds_lokalizator.extend(point_marker54);
			var point_marker55 = new google.maps.LatLng(51.107506, 17.065572);
			var marker_main55 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker55});
			bounds_lokalizator.extend(point_marker55);
			var point_marker56 = new google.maps.LatLng(51.110538, 17.031757);
			var marker_main56 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker56});
			bounds_lokalizator.extend(point_marker56);
			var point_marker57 = new google.maps.LatLng(51.10802, 17.019992);
			var marker_main57 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker57});
			bounds_lokalizator.extend(point_marker57);
			var point_marker58 = new google.maps.LatLng(51.109619, 17.024287);
			var marker_main58 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker58});
			bounds_lokalizator.extend(point_marker58);
			var point_marker59 = new google.maps.LatLng(51.101155, 17.025041);
			var marker_main59 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker59});
			bounds_lokalizator.extend(point_marker59);
			var point_marker60 = new google.maps.LatLng(51.110264, 17.02472);
			var marker_main60 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker60});
			bounds_lokalizator.extend(point_marker60);
			var point_marker61 = new google.maps.LatLng(51.102399, 17.014529);
			var marker_main61 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker61});
			bounds_lokalizator.extend(point_marker61);
			var point_marker62 = new google.maps.LatLng(51.111087, 17.05688);
			var marker_main62 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker62});
			bounds_lokalizator.extend(point_marker62);
			var point_marker63 = new google.maps.LatLng(51.110436, 17.025471);
			var marker_main63 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker63});
			bounds_lokalizator.extend(point_marker63);
			var point_marker64 = new google.maps.LatLng(51.110729, 17.032776);
			var marker_main64 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker64});
			bounds_lokalizator.extend(point_marker64);
			var point_marker65 = new google.maps.LatLng(51.110436, 17.025471);
			var marker_main65 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker65});
			bounds_lokalizator.extend(point_marker65);
			var point_marker66 = new google.maps.LatLng(51.08539, 17.037896);
			var marker_main66 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker66});
			bounds_lokalizator.extend(point_marker66);
			var point_marker67 = new google.maps.LatLng(51.207708, 17.3774);
			var marker_main67 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker67});
			bounds_lokalizator.extend(point_marker67);
			var point_marker68 = new google.maps.LatLng(51.113283, 17.066085);
			var marker_main68 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker68});
			bounds_lokalizator.extend(point_marker68);
			var point_marker69 = new google.maps.LatLng(51.11401, 17.066381);
			var marker_main69 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker69});
			bounds_lokalizator.extend(point_marker69);
			var point_marker70 = new google.maps.LatLng(51.109979, 17.029219);
			var marker_main70 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker70});
			bounds_lokalizator.extend(point_marker70);
			var point_marker71 = new google.maps.LatLng(51.110436, 17.025471);
			var marker_main71 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker71});
			bounds_lokalizator.extend(point_marker71);
			var point_marker72 = new google.maps.LatLng(51.10338, 17.049898);
			var marker_main72 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker72});
			bounds_lokalizator.extend(point_marker72);
			var point_marker73 = new google.maps.LatLng(51.103735, 17.030295);
			var marker_main73 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker73});
			bounds_lokalizator.extend(point_marker73);
			var point_marker74 = new google.maps.LatLng(51.108015, 17.073723);
			var marker_main74 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker74});
			bounds_lokalizator.extend(point_marker74);
			var point_marker75 = new google.maps.LatLng(51.10183, 17.020873);
			var marker_main75 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker75});
			bounds_lokalizator.extend(point_marker75);
			var point_marker76 = new google.maps.LatLng(50.723666, 16.651943);
			var marker_main76 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker76});
			bounds_lokalizator.extend(point_marker76);
			var point_marker77 = new google.maps.LatLng(51.110436, 17.025471);
			var marker_main77 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker77});
			bounds_lokalizator.extend(point_marker77);
			var point_marker78 = new google.maps.LatLng(51.108417, 17.03624);
			var marker_main78 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker78});
			bounds_lokalizator.extend(point_marker78);
			var point_marker79 = new google.maps.LatLng(51.110436, 17.025471);
			var marker_main79 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker79});
			bounds_lokalizator.extend(point_marker79);
			var point_marker80 = new google.maps.LatLng(51.111434, 17.02912);
			var marker_main80 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker80});
			bounds_lokalizator.extend(point_marker80);
			var point_marker81 = new google.maps.LatLng(51.128617, 16.969941);
			var marker_main81 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker81});
			bounds_lokalizator.extend(point_marker81);
			var point_marker82 = new google.maps.LatLng(51.109354, 17.025298);
			var marker_main82 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker82});
			bounds_lokalizator.extend(point_marker82);
			var point_marker83 = new google.maps.LatLng(51.106907, 17.032273);
			var marker_main83 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker83});
			bounds_lokalizator.extend(point_marker83);
			var point_marker84 = new google.maps.LatLng(51.110786, 17.032473);
			var marker_main84 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker84});
			bounds_lokalizator.extend(point_marker84);
			var point_marker85 = new google.maps.LatLng(51.109671, 17.028755);
			var marker_main85 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker85});
			bounds_lokalizator.extend(point_marker85);
			var point_marker86 = new google.maps.LatLng(51.110256, 17.029382);
			var marker_main86 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker86});
			bounds_lokalizator.extend(point_marker86);
			var point_marker87 = new google.maps.LatLng(51.104951, 17.068119);
			var marker_main87 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker87});
			bounds_lokalizator.extend(point_marker87);
			var point_marker88 = new google.maps.LatLng(51.111497, 17.042934);
			var marker_main88 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker88});
			bounds_lokalizator.extend(point_marker88);
			var point_marker89 = new google.maps.LatLng(51.110436, 17.025471);
			var marker_main89 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker89});
			bounds_lokalizator.extend(point_marker89);
			var point_marker90 = new google.maps.LatLng(51.110436, 17.025471);
			var marker_main90 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker90});
			bounds_lokalizator.extend(point_marker90);
			var point_marker91 = new google.maps.LatLng(51.104874, 17.038497);
			var marker_main91 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker91});
			bounds_lokalizator.extend(point_marker91);
			var point_marker92 = new google.maps.LatLng(51.109971, 17.024562);
			var marker_main92 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker92});
			bounds_lokalizator.extend(point_marker92);
			var point_marker93 = new google.maps.LatLng(51.109519, 17.026303);
			var marker_main93 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker93});
			bounds_lokalizator.extend(point_marker93);
			var point_marker94 = new google.maps.LatLng(51.104142, 17.030055);
			var marker_main94 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker94});
			bounds_lokalizator.extend(point_marker94);
			var point_marker95 = new google.maps.LatLng(51.111943, 17.030606);
			var marker_main95 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker95});
			bounds_lokalizator.extend(point_marker95);
			var point_marker96 = new google.maps.LatLng(51.108928, 17.029463);
			var marker_main96 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker96});
			bounds_lokalizator.extend(point_marker96);
			var point_marker97 = new google.maps.LatLng(51.103969, 17.082149);
			var marker_main97 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker97});
			bounds_lokalizator.extend(point_marker97);
			var point_marker98 = new google.maps.LatLng(51.108123, 17.025008);
			var marker_main98 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker98});
			bounds_lokalizator.extend(point_marker98);
			var point_marker99 = new google.maps.LatLng(51.110534, 17.030361);
			var marker_main99 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker99});
			bounds_lokalizator.extend(point_marker99);
			var point_marker100 = new google.maps.LatLng(51.119157, 17.073764);
			var marker_main100 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker100});
			bounds_lokalizator.extend(point_marker100);
			var point_marker101 = new google.maps.LatLng(51.108547, 17.02893);
			var marker_main101 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker101});
			bounds_lokalizator.extend(point_marker101);
			var point_marker102 = new google.maps.LatLng(51.110497, 17.039815);
			var marker_main102 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker102});
			bounds_lokalizator.extend(point_marker102);
			var point_marker103 = new google.maps.LatLng(51.099983, 17.029618);
			var marker_main103 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker103});
			bounds_lokalizator.extend(point_marker103);
			var point_marker104 = new google.maps.LatLng(51.111724, 17.036937);
			var marker_main104 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker104});
			bounds_lokalizator.extend(point_marker104);
			var point_marker105 = new google.maps.LatLng(51.112836, 17.018164);
			var marker_main105 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker105});
			bounds_lokalizator.extend(point_marker105);
			var point_marker106 = new google.maps.LatLng(51.111404, 17.025541);
			var marker_main106 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker106});
			bounds_lokalizator.extend(point_marker106);
			var point_marker107 = new google.maps.LatLng(51.099984, 17.029999);
			var marker_main107 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker107});
			bounds_lokalizator.extend(point_marker107);
			var point_marker108 = new google.maps.LatLng(51.112675, 17.061721);
			var marker_main108 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker108});
			bounds_lokalizator.extend(point_marker108);
			var point_marker109 = new google.maps.LatLng(51.103924, 17.030304);
			var marker_main109 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker109});
			bounds_lokalizator.extend(point_marker109);
			var point_marker110 = new google.maps.LatLng(51.111365, 17.026679);
			var marker_main110 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker110});
			bounds_lokalizator.extend(point_marker110);
			var point_marker111 = new google.maps.LatLng(51.125727, 51.125727);
			var marker_main111 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker111});
			bounds_lokalizator.extend(point_marker111);
			var point_marker112 = new google.maps.LatLng(51.094719, 17.044362);
			var marker_main112 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker112});
			bounds_lokalizator.extend(point_marker112);
			var point_marker113 = new google.maps.LatLng(51.100258, 17.028952);
			var marker_main113 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker113});
			bounds_lokalizator.extend(point_marker113);
			var point_marker114 = new google.maps.LatLng(51.105127, 17.033097);
			var marker_main114 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker114});
			bounds_lokalizator.extend(point_marker114);
			var point_marker115 = new google.maps.LatLng(51.111285, 17.030838);
			var marker_main115 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker115});
			bounds_lokalizator.extend(point_marker115);
			var point_marker116 = new google.maps.LatLng(51.111545, 17.029066);
			var marker_main116 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker116});
			bounds_lokalizator.extend(point_marker116);
			var point_marker117 = new google.maps.LatLng(51.110436, 17.025471);
			var marker_main117 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker117});
			bounds_lokalizator.extend(point_marker117);
			var point_marker118 = new google.maps.LatLng(51.104743, 17.080021);
			var marker_main118 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker118});
			bounds_lokalizator.extend(point_marker118);
			var point_marker119 = new google.maps.LatLng(51.117165, 17.053015);
			var marker_main119 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker119});
			bounds_lokalizator.extend(point_marker119);
			var point_marker120 = new google.maps.LatLng(51.077254, 16.962013);
			var marker_main120 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker120});
			bounds_lokalizator.extend(point_marker120);
			var point_marker121 = new google.maps.LatLng(51.11787, 17.000995);
			var marker_main121 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker121});
			bounds_lokalizator.extend(point_marker121);
			var point_marker122 = new google.maps.LatLng(51.111971, 17.032195);
			var marker_main122 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker122});
			bounds_lokalizator.extend(point_marker122);
			var point_marker123 = new google.maps.LatLng(51.110436, 17.025471);
			var marker_main123 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker123});
			bounds_lokalizator.extend(point_marker123);
			var point_marker124 = new google.maps.LatLng(51.10802, 17.019992);
			var marker_main124 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker124});
			bounds_lokalizator.extend(point_marker124);
			var point_marker125 = new google.maps.LatLng(51.110102, 17.028386);
			var marker_main125 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker125});
			bounds_lokalizator.extend(point_marker125);
			var point_marker126 = new google.maps.LatLng(51.110436, 17.025471);
			var marker_main126 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker126});
			bounds_lokalizator.extend(point_marker126);
			var point_marker127 = new google.maps.LatLng(51.107469, 17.03132);
			var marker_main127 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker127});
			bounds_lokalizator.extend(point_marker127);
			var point_marker128 = new google.maps.LatLng(51.109971, 17.024562);
			var marker_main128 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker128});
			bounds_lokalizator.extend(point_marker128);
			var point_marker129 = new google.maps.LatLng(51.101006, 17.025716);
			var marker_main129 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker129});
			bounds_lokalizator.extend(point_marker129);
			var point_marker130 = new google.maps.LatLng(51.109495, 17.03044);
			var marker_main130 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker130});
			bounds_lokalizator.extend(point_marker130);
			var point_marker131 = new google.maps.LatLng(51.111434, 17.02912);
			var marker_main131 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker131});
			bounds_lokalizator.extend(point_marker131);
			var point_marker132 = new google.maps.LatLng(51.107476, 17.025636);
			var marker_main132 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker132});
			bounds_lokalizator.extend(point_marker132);
			var point_marker133 = new google.maps.LatLng(51.109001, 17.02907);
			var marker_main133 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker133});
			bounds_lokalizator.extend(point_marker133);
			var point_marker134 = new google.maps.LatLng(51.120628, 17.036283);
			var marker_main134 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker134});
			bounds_lokalizator.extend(point_marker134);
			var point_marker135 = new google.maps.LatLng(51.110538, 17.031757);
			var marker_main135 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker135});
			bounds_lokalizator.extend(point_marker135);
			var point_marker136 = new google.maps.LatLng(51.110071, 17.032628);
			var marker_main136 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker136});
			bounds_lokalizator.extend(point_marker136);
			var point_marker137 = new google.maps.LatLng(51.11077, 17.027944);
			var marker_main137 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker137});
			bounds_lokalizator.extend(point_marker137);
			var point_marker138 = new google.maps.LatLng(51.100819, 17.028598);
			var marker_main138 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker138});
			bounds_lokalizator.extend(point_marker138);
			var point_marker139 = new google.maps.LatLng(51.094758, 16.994406);
			var marker_main139 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker139});
			bounds_lokalizator.extend(point_marker139);
			var point_marker140 = new google.maps.LatLng(51.138129, 16.992696);
			var marker_main140 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker140});
			bounds_lokalizator.extend(point_marker140);
			var point_marker141 = new google.maps.LatLng(51.101006, 17.025716);
			var marker_main141 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker141});
			bounds_lokalizator.extend(point_marker141);
			var point_marker142 = new google.maps.LatLng(51.110787, 17.029235);
			var marker_main142 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker142});
			bounds_lokalizator.extend(point_marker142);
			var point_marker143 = new google.maps.LatLng(51.09999, 17.034833);
			var marker_main143 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker143});
			bounds_lokalizator.extend(point_marker143);
			var point_marker144 = new google.maps.LatLng(51.136406, 17.024257);
			var marker_main144 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker144});
			bounds_lokalizator.extend(point_marker144);
			var point_marker145 = new google.maps.LatLng(51.100115, 17.029499);
			var marker_main145 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker145});
			bounds_lokalizator.extend(point_marker145);
			var point_marker146 = new google.maps.LatLng(51.119138, 17.035431);
			var marker_main146 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker146});
			bounds_lokalizator.extend(point_marker146);
			var point_marker147 = new google.maps.LatLng(51.117177, 17.06106);
			var marker_main147 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker147});
			bounds_lokalizator.extend(point_marker147);
			var point_marker148 = new google.maps.LatLng(51.110073, 17.031315);
			var marker_main148 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker148});
			bounds_lokalizator.extend(point_marker148);
			var point_marker149 = new google.maps.LatLng(51.105769, 17.032092);
			var marker_main149 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker149});
			bounds_lokalizator.extend(point_marker149);
			var point_marker150 = new google.maps.LatLng(51.102972, 17.039935);
			var marker_main150 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker150});
			bounds_lokalizator.extend(point_marker150);
			var point_marker151 = new google.maps.LatLng(51.110102, 17.028386);
			var marker_main151 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker151});
			bounds_lokalizator.extend(point_marker151);
			var point_marker152 = new google.maps.LatLng(51.109886, 17.032527);
			var marker_main152 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker152});
			bounds_lokalizator.extend(point_marker152);
			var point_marker153 = new google.maps.LatLng(51.112224, 17.05638);
			var marker_main153 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker153});
			bounds_lokalizator.extend(point_marker153);
			var point_marker154 = new google.maps.LatLng(51.07336, 17.032821);
			var marker_main154 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker154});
			bounds_lokalizator.extend(point_marker154);
			var point_marker155 = new google.maps.LatLng(51.111434, 17.02912);
			var marker_main155 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker155});
			bounds_lokalizator.extend(point_marker155);
			var point_marker156 = new google.maps.LatLng(51.100026, 17.029841);
			var marker_main156 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker156});
			bounds_lokalizator.extend(point_marker156);
			var point_marker157 = new google.maps.LatLng(51.100026, 17.029841);
			var marker_main157 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker157});
			bounds_lokalizator.extend(point_marker157);
			var point_marker158 = new google.maps.LatLng(51.093289, 17.042934);
			var marker_main158 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker158});
			bounds_lokalizator.extend(point_marker158);
			var point_marker159 = new google.maps.LatLng(51.110654, 17.057541);
			var marker_main159 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker159});
			bounds_lokalizator.extend(point_marker159);
			var point_marker160 = new google.maps.LatLng(51.207706, 17.386541);
			var marker_main160 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker160});
			bounds_lokalizator.extend(point_marker160);
			var point_marker161 = new google.maps.LatLng(51.107632, 17.030206);
			var marker_main161 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker161});
			bounds_lokalizator.extend(point_marker161);
			var point_marker162 = new google.maps.LatLng(51.139598, 17.029328);
			var marker_main162 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker162});
			bounds_lokalizator.extend(point_marker162);
			var point_marker163 = new google.maps.LatLng(51.100178, 17.028804);
			var marker_main163 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker163});
			bounds_lokalizator.extend(point_marker163);
			var point_marker164 = new google.maps.LatLng(51.1091, 17.02307);
			var marker_main164 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker164});
			bounds_lokalizator.extend(point_marker164);
			var point_marker165 = new google.maps.LatLng(51.109354, 17.025298);
			var marker_main165 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker165});
			bounds_lokalizator.extend(point_marker165);
			var point_marker166 = new google.maps.LatLng(51.111484, 17.026047);
			var marker_main166 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker166});
			bounds_lokalizator.extend(point_marker166);
			var point_marker167 = new google.maps.LatLng(51.110071, 17.032628);
			var marker_main167 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker167});
			bounds_lokalizator.extend(point_marker167);
			var point_marker168 = new google.maps.LatLng(51.079131, 16.957251);
			var marker_main168 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker168});
			bounds_lokalizator.extend(point_marker168);
			var point_marker169 = new google.maps.LatLng(51.103621, 17.029797);
			var marker_main169 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker169});
			bounds_lokalizator.extend(point_marker169);
			var point_marker170 = new google.maps.LatLng(51.099984, 17.029999);
			var marker_main170 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker170});
			bounds_lokalizator.extend(point_marker170);
			var point_marker171 = new google.maps.LatLng(51.11184, 17.03202);
			var marker_main171 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker171});
			bounds_lokalizator.extend(point_marker171);
			var point_marker172 = new google.maps.LatLng(51.098632, 17.051649);
			var marker_main172 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker172});
			bounds_lokalizator.extend(point_marker172);
			var point_marker173 = new google.maps.LatLng(51.111032, 17.03376);
			var marker_main173 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker173});
			bounds_lokalizator.extend(point_marker173);
			var point_marker174 = new google.maps.LatLng(51.109084, 17.028659);
			var marker_main174 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker174});
			bounds_lokalizator.extend(point_marker174);
			var point_marker175 = new google.maps.LatLng(51.107469, 17.03132);
			var marker_main175 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker175});
			bounds_lokalizator.extend(point_marker175);
			var point_marker176 = new google.maps.LatLng(51.100638, 17.027412);
			var marker_main176 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker176});
			bounds_lokalizator.extend(point_marker176);
			var point_marker177 = new google.maps.LatLng(51.111365, 17.026679);
			var marker_main177 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker177});
			bounds_lokalizator.extend(point_marker177);
			var point_marker178 = new google.maps.LatLng(51.073781, 17.001229);
			var marker_main178 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker178});
			bounds_lokalizator.extend(point_marker178);
			var point_marker179 = new google.maps.LatLng(51.100143, 17.02897);
			var marker_main179 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker179});
			bounds_lokalizator.extend(point_marker179);
			var point_marker180 = new google.maps.LatLng(51.093038, 17.025457);
			var marker_main180 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker180});
			bounds_lokalizator.extend(point_marker180);
			var point_marker181 = new google.maps.LatLng(51.10997, 17.031233);
			var marker_main181 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker181});
			bounds_lokalizator.extend(point_marker181);
			var point_marker182 = new google.maps.LatLng(51.114041, 17.096912);
			var marker_main182 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker182});
			bounds_lokalizator.extend(point_marker182);
			var point_marker183 = new google.maps.LatLng(51.107678, 17.032061);
			var marker_main183 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker183});
			bounds_lokalizator.extend(point_marker183);
			var point_marker184 = new google.maps.LatLng(51.110686, 17.024914);
			var marker_main184 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker184});
			bounds_lokalizator.extend(point_marker184);
			var point_marker185 = new google.maps.LatLng(51.111365, 17.026679);
			var marker_main185 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker185});
			bounds_lokalizator.extend(point_marker185);
			var point_marker186 = new google.maps.LatLng(51.108928, 17.029463);
			var marker_main186 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker186});
			bounds_lokalizator.extend(point_marker186);
			var point_marker187 = new google.maps.LatLng(51.108703, 17.026697);
			var marker_main187 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker187});
			bounds_lokalizator.extend(point_marker187);
			var point_marker188 = new google.maps.LatLng(51.111875, 17.032409);
			var marker_main188 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker188});
			bounds_lokalizator.extend(point_marker188);
			var point_marker189 = new google.maps.LatLng(51.109071, 17.032412);
			var marker_main189 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker189});
			bounds_lokalizator.extend(point_marker189);
			var point_marker190 = new google.maps.LatLng(51.110497, 17.039815);
			var marker_main190 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker190});
			bounds_lokalizator.extend(point_marker190);
			var point_marker191 = new google.maps.LatLng(51.111404, 17.025541);
			var marker_main191 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker191});
			bounds_lokalizator.extend(point_marker191);
			var point_marker192 = new google.maps.LatLng(51.108619, 17.034651);
			var marker_main192 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker192});
			bounds_lokalizator.extend(point_marker192);
			var point_marker193 = new google.maps.LatLng(51.157887, 17.132001);
			var marker_main193 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker193});
			bounds_lokalizator.extend(point_marker193);
			var point_marker194 = new google.maps.LatLng(51.103969, 17.082149);
			var marker_main194 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker194});
			bounds_lokalizator.extend(point_marker194);
			var point_marker195 = new google.maps.LatLng(51.1091, 17.02307);
			var marker_main195 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker195});
			bounds_lokalizator.extend(point_marker195);
			var point_marker196 = new google.maps.LatLng(51.110973, 17.02385);
			var marker_main196 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker196});
			bounds_lokalizator.extend(point_marker196);
			var point_marker197 = new google.maps.LatLng(51.107785, 17.073878);
			var marker_main197 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker197});
			bounds_lokalizator.extend(point_marker197);
			var point_marker198 = new google.maps.LatLng(51.100258, 17.028952);
			var marker_main198 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker198});
			bounds_lokalizator.extend(point_marker198);
			var point_marker199 = new google.maps.LatLng(51.1024, 17.019742);
			var marker_main199 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker199});
			bounds_lokalizator.extend(point_marker199);
			var point_marker200 = new google.maps.LatLng(51.111087, 17.05688);
			var marker_main200 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker200});
			bounds_lokalizator.extend(point_marker200);
			var point_marker201 = new google.maps.LatLng(51.112567, 17.03146);
			var marker_main201 = new google.maps.Marker({
				map:map_lokalizator, position:point_marker201});
			bounds_lokalizator.extend(point_marker201);

			map_lokalizator.fitBounds(bounds_lokalizator);
		}

		gmap_lokalizator();

		function geocode_mark_default(results, status) {
			if (status == google.maps.GeocoderStatus.OK) {
				map_lokalizator.setCenter(results[0].geometry.location);
				var marker = new google.maps.Marker({map:map_lokalizator, position:results[0].geometry.location});
			} else {
				alert("Geocode was not successful for the following reason: " + status + " in callback: geocode_mark_default");
			}
		}
	});
} else {
	alert('inesGmap required jQuery!');
}
