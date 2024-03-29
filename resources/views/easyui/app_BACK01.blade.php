{{-- $pesan or 'pesan Kosong'--}}
{{-- old('pesan') or 'jjjjjjjjjj' --}}

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Halaman Administrator</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="robots" content="index, follow">
	<meta http-equiv="Copyright" content="Achmadii Author">
	<meta name="author" content="Achmadii Author">
	<meta http-equiv="imagetoolbar" content="no">
	<meta name="language" content="Indonesia">
	<meta name="revisit-after" content="7">
	<meta name="webcrawlers" content="all">
	<meta name="rating" content="general">
	<meta name="spiders" content="all">

	<link rel="stylesheet" type="text/css" href="/asset/css/layout.css">
	<link href="asset/css/fonts/stylesheet.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" href="/asset/css/themes/cupertino/easyui.css">
	<link rel="stylesheet" type="text/css" href="/asset/css/themes/icon.css">
	<link rel="stylesheet" type="text/css" href="/asset/css/smoothness/jquery-ui-1.7.2.custom.css">

	<script type="text/javascript" src="asset/js/jquery-1.7.1.min.js"></script>
	<script type="text/javascript" src="asset/js/clock.js"></script>
	<script type="text/javascript" src="/asset/js/jquery.easyui.min.js"></script>

	<!--datepicker-->
	<script type="text/javascript" src="/asset/js/ui.core.js"></script>
	<script type="text/javascript" src="/asset/js/ui.datepicker-id.js"></script>
	<script type="text/javascript" src="/asset/js/ui.datepicker.js"></script>

	<!--Polling-->
	<script type="text/javascript" src="asset/js/highcharts.js"></script>
	<script type="text/javascript" src="asset/js/exporting.js"></script>

	<!-- notifikasi -->
	<script type="text/javascript" src="asset/js/notifikasi.js"></script>

	<script type="text/javascript">
		$(function() {
			$("#dataTable tr:even").addClass("stripe1");
			$("#dataTable tr:odd").addClass("stripe2");
			$("#dataTable tr").hover(
				function() {
					$(this).toggleClass("highlight");
				},
				function() {
					$(this).toggleClass("highlight");
				}
				);

			$('#tt').tabs({
				onLoad:function(panel){
					var plugin = panel.panel('options').title;
					panel.find('textarea[name="code-'+plugin+'"]').each(function(){
						var data = $(this).val();
						data = data.replace(/(\r\n|\r|\n)/g, '\n');
						if (data.indexOf('\t') == 0){
							data = data.replace(/^\t/, '');
							data = data.replace(/\n\t/g, '\n');
						}
						data = data.replace(/\t/g, '    ');
						var pre = $('<pre name="code" class="prettyprint linenums"></pre>').insertAfter(this);
						pre.text(data);
						$(this).remove();
					});
					prettyPrint();
				}
			});
			function open(plugin){
				if ($('#tt').tabs('exists',plugin)){
					$('#tt').tabs('select', plugin);
				} else {
					$('#tt').tabs('add',{
						title:plugin,
						href:plugin+'.php',
						closable:true,
						extractor:function(data){
							data = $.fn.panel.defaults.extractor(data);
							var tmp = $('<div></div>').html(data);
							data = tmp.find('#content').html();
							tmp.remove();
							return data;
						}
					});
				}
			}

		});

	
			
	</script>

</head>
<body onLoad="goforit()">
	<div class="header" style="height:70px;background:white;padding:2px;margin:0;">	
		<div style="float:left; padding:0px; margin:0px;">
			<img src='asset/images/logo_koperasi_85.png' style="padding:0; margin:0;" width="85" height="71">
		</div>
		<div class="judul" style="float:left; line-height:3px; margin-top:0px; padding:2px 5px;">
			<h1>{{ $instansi or 'Default'  }}</h1>
			<p><b>{{ $usaha or 'Default'  }}</b></p>
			<p>{{ $alamat_instansi or 'Default'  }}</p>
		</div>
		<div style="float:right; line-height:3px; text-align:center;">
			<br /><br />
			<h1>Apilkasi {{ $nama_program or 'Default'  }}</h1>
			<p>.:: Jurnal Umum - Buku Besar - Laporan Laba Rugi ::.</p>
		</div>
	</div>	
	
	<div class="panel-header" fit="true" style="height:21px;padding-top:1px;padding-right:20px">
		<div style="float:left;">
			@if (Auth::guest())
			<a href="/auth/login" class="easyui-linkbutton" data-options="plain:true" iconCls="icon-login">Login</a>
			<a href="/auth/register" class="easyui-linkbutton" data-options="plain:true" iconCls="icon-register">Register</a>
			@else
			<a href="logout" class="easyui-linkbutton" data-options="plain:true" iconCls="icon-logout">Logout</a>
			@endif
			<a href="home" class="easyui-linkbutton" data-options="plain:true" iconCls="icon-home">Home</a>

		</div>
		<div style="float:right; padding-top:5px;">
			<?php //echo $this->session->userdata('nama_lengkap') }} &rarr;?>
			<span id="clock"></span>		
		</div>
	</div>
	<!-- awal kiri -->
	<div id="kiri" style="float:left;">
		<div id="Profil" class="easyui-panel" title="Profil Pengguna" style="float:left;width:170px;height:90px;padding:5px;">
			<img style="float:left;padding:2px;" src="{{  asset('asset/images/lambang.jpg')}}" width="50" height="50" align="middle" />
			<p style="line-height:15px;">
				<b><?php //echo $this->session->userdata('nama_lengkap') }}</b><br />?>
				<a href="#">Edit Profil</a>
			</p>
		</div>		
		<div class="easyui-accordion" style="float:left;width:300px;">

			<div title="Manage DB Bidang" data-options="iconCls:'icon-table'" style="overflow:auto;padding:5px 0px;">
				<div title="TreeMenu" data-options="iconCls:'icon-search'" style="padding:0px;">
					<ul class="easyui-tree" data-options="url:'{{  asset('asset/bidang.json')}}',method:'get',animaccte:true,dnd:true"></ul>

					<ul class="easyui-tree">
						{{-- <li data-options="iconCls:'icon-surat_perintah'">
							<a href="rekening">Rekening</a>
						</li> --}}
						{{-- <li data-options="iconCls:'icon-surat_keputusan'">
							<a href="saldo_awal">Saldo Awal</a>
						</li> --}}
						{{-- <li data-options="iconCls:'icon-surat_keluar'">
							<a href="jurnal_umum">Jurnal Umum</a>
						</li>
						<li data-options="iconCls:'icon-surat_keluar'">
							<a href="buku_besar">Buku Besar</a>
						</li> --}}
					{{-- 	<li data-options="iconCls:'icon-surat_keluar'">
							<a href="jurnal_penyesuaian">Jurnal Penyesuaian</a>
						</li>
						<li data-options="iconCls:'icon-surat_keluar'">
							<a href="tutup_buku">Tutup Buku</a>
						</li> --}}
					</ul>
				</div>
			</div>

			<div title="Manage DB DPA" data-options="iconCls:'icon-table'" style="overflow:auto;padding:5px 0px;">
				<div title="TreeMenu" data-options="iconCls:'icon-search'" style="padding:0px;">
					<ul class="easyui-tree" data-options="url:'{{  asset('asset/dpa.json')}}',method:'get',animaccte:true,dnd:true"></ul>
					

				</div>
			</div>

			<div title="Manage DB Kegiatan" data-options="iconCls:'icon-table'" style="overflow:auto;padding:5px 0px;">
				<div title="TreeMenu" data-options="iconCls:'icon-search'" style="padding:0px;">
					<ul class="easyui-tree" data-options="url:'{{  asset('asset/tree_data1.json')}}',method:'get',animate:true,dnd:true"></ul>

					

				</div>
			</div>

			<div title="Manage DB OranisasiSPD " data-options="iconCls:'icon-table'" style="overflow:auto;padding:5px 0px;">
				<div title="TreeMenu" data-options="iconCls:'icon-search'" style="padding:0px;">
					<ul class="easyui-tree" data-options="url:'{{  asset('asset/tree_data1.json')}}',method:'get',animate:true,dnd:true"></ul>

					

				</div>
			</div>

			<div title="Manage DB Program " data-options="iconCls:'icon-table'" style="overflow:auto;padding:5px 0px;">
				<div title="TreeMenu" data-options="iconCls:'icon-search'" style="padding:0px;">
					<ul class="easyui-tree" data-options="url:'{{  asset('asset/tree_data1.json')}}',method:'get',animate:true,dnd:true"></ul>

					<ul class="easyui-tree">
						{{-- <li>
							<span><a href="lap_buku_besar">Buku Besar</a></span>
						</li>
						<li>
							<span><a href="lap_neraca_lajur">Neraca Lajur</a></span>
						</li>
						<li>
							<span><a href="lap_laba_rugi">Laba Rugi</a></span>
						</li>
						<li>
							<span><a href="lap_neraca">Neraca</a></span>
						</li> --}}
					</ul>

				</div>
			</div>
			
			<div title="Manage DB Realisasi " data-options="iconCls:'icon-table'" style="overflow:auto;padding:5px 0px;">
				<div title="TreeMenu" data-options="iconCls:'icon-search'" style="padding:0px;">
					<ul class="easyui-tree" data-options="url:'{{  asset('asset/tree_data1.json')}}',method:'get',animate:true,dnd:true"></ul>

					<ul class="easyui-tree">
						{{-- <li>
							<span><a href="lap_buku_besar">Buku Besar</a></span>
						</li>
						<li>
							<span><a href="lap_neraca_lajur">Neraca Lajur</a></span>
						</li>
						<li>
							<span><a href="lap_laba_rugi">Laba Rugi</a></span>
						</li>
						<li>
							<span><a href="lap_neraca">Neraca</a></span>
						</li> --}}
					</ul>

				</div>
			</div>

			<div title="Manage DB SKPD " data-options="iconCls:'icon-table'" style="overflow:auto;padding:5px 0px;">
				<div title="TreeMenu" data-options="iconCls:'icon-search'" style="padding:0px;">
					<ul class="easyui-tree" data-options="url:'{{  asset('asset/tree_data1.json')}}',method:'get',animate:true,dnd:true"></ul>
					
					<ul class="easyui-tree">
						{{-- <li>
							<span><a href="lap_buku_besar">Buku Besar</a></span>
						</li>
						<li>
							<span><a href="lap_neraca_lajur">Neraca Lajur</a></span>
						</li>
						<li>
							<span><a href="lap_laba_rugi">Laba Rugi</a></span>
						</li>
						<li>
							<span><a href="lap_neraca">Neraca</a></span>
						</li> --}}
					</ul>

				</div>
			</div>

			<div title="Manage DB Urusan " data-options="iconCls:'icon-table'" style="overflow:auto;padding:5px 0px;">
				<div title="TreeMenu" data-options="iconCls:'icon-search'" style="padding:0px;">
					<ul class="easyui-tree" data-options="url:'{{  asset('asset/tree_data1.json')}}',method:'get',animate:true,dnd:true"></ul>
					
					<ul class="easyui-tree">
						{{-- <li>
							<span><a href="lap_buku_besar">Buku Besar</a></span>
						</li>
						<li>
							<span><a href="lap_neraca_lajur">Neraca Lajur</a></span>
						</li>
						<li>
							<span><a href="lap_laba_rugi">Laba Rugi</a></span>
						</li>
						<li>
							<span><a href="lap_neraca">Neraca</a></span>
						</li> --}}
					</ul>

				</div>
			</div>

			<div title="Grafik" data-options="iconCls:'icon-grafik'" style="overflow:auto;padding:5px 0px;">
				<div title="TreeMenu" data-options="iconCls:'icon-search'" style="padding:0px;">
					<ul class="easyui-tree">
						<li>
							<span><a href="grafik_jurnal">Jurnal</a></span>
						</li>
						<li>
							<span><a href="grafik_buku_besar">Buku Besar</a></span>
						</li>
					</ul>
				</div>
			</div>

		</div>

	</div>       
	<div id="tt" class="easyui-tabs" style="height:570px;">
		<div title="{{ 'home' }}" style="padding:10px">
			<?php ///echo $content }}	?>
			@yield('content');
		</div>
	</div>	


	<div class="panel-header" fit="true" style="height:20px;text-align:center;">	    
		Copyright &copy; {{ $instansi or 'Default'  }} 2013.
	</div>
</body>
</html>
