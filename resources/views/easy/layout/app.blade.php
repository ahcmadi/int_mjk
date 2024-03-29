
@extends('easy.layout.master')

@include('easy.layout.header')
@include('easy.layout.footer')


@section('title', 'Page Title')

@section('sidebar')
  <div data-options="region:'north',border:true" style="height:140px; ">
        <div style="min-height:100%;  background: none repeat scroll 0 0 #a9facd; padding:3px 0px 3px 10px; ">
            <div id="logo" style="display:inline-block; min-width:20%; height:60px; padding:5px; border: medium solid; ">image</div>
            <div id="logo" style="display:inline-block; min-width:20%; height:60px; padding:5px; ">Applikasi SPPD V.01</div>
            <div id="logo" style="float:right; display:inline-block; min-width:20%; height:60px; padding:5px; ">xxxx</div>
        </div>
        <div class="easyui-tabs"  data-options="" style="position:absolute; bottom:0px; height:65px; width:auto">
            <div title="..: Applikasi SPPD -- Surat Perjalanan Perintah Dinas :.." style="padding:0px"  data-options="fit:true">

                <div id="menus" style="position:absolute; bottom:0px; padding:3px 3px 3px 10px ;">
                    <a href="#" class="easyui-linkbutton" data-options="plain:true" onclick="javascript:openPage('{{route('ajaxgrid', ['page' => 'home'])}}');"> <i class="fa fa-home fa-2x">Home</i></a>
                    <a href="#" class="easyui-menubutton" data-options="menu:'#mm1',iconCls:''"><i class="fa fa-database fa-2x">Data Master</i></a>
                    <a href="#" class="easyui-menubutton" data-options="menu:'#mm2',iconCls:''"><i class="fa fa-file-image-o e fa-2x">Dokumen SPPD</i></a>
                    <a href="#" class="easyui-menubutton" data-options="menu:'#mm3'"><i class="fa fa-file-text fa-2x">Manajement</i></a>
                    <a href="#" class="easyui-menubutton" data-options="menu:'#mm4'"><i class="fa fa-user-plus fa-2x">Admin</i></a>
                    <a href="#" class="easyui-linkbutton" data-options="plain:true" onclick="javascript:alert('logout');logout('easyui');"> <i class="fa fa-user-times fa-2x">Keluar</i></a>
                </div>
            </div>

        </div>
        
    </div>

    <!-- content ============================================================= -->
    <div data-options="region:'center',border:false">
        <div id="content-x" style="width:100%;height:100%">
        {!! $xcontent or 'kosong' !!}
        </div>
    </div>
  </div>
  <!-- widget:  window, dialog, panel ============================================================= -->
  <div id="windowA"  title="Window A" style="width:90%;height:100%"></div>
  <div id="windowB" ></div>
  <div id="windowC" ></div>

  <div id="mm1" style="width:150px;">
    <div data-options="iconCls:'fa fa-home'" ><a href="#" data-link="xxx"><a href="#" data-link="{{route('ajaxgrid', ['page' => 'ds'])}}">Data SKPD</a></div>
    <div data-options="iconCls:'icon-redo'"><a href="#" data-link="xxx"><a href="#" data-link="{{route('ajaxgrid', ['page' => 'duk'])}}">Data Unit Kerja</a></div>
    <div class="menu-sep"></div>
    <div><a href="#" data-link="{{route('ajaxgrid', ['page' => 'djs'])}}">Daftar Jenis SPPD</a></div>

            </div>
            <div id="mm2" style="width:100px;">
                <div data-options="iconCls:'icon-undo'"><a href="#" data-link="xxx"><a href="#" data-link="{{route('ajaxgrid', ['page' => 'lds'])}}">List Dokumen SPPD</a></div>
                <div data-options="iconCls:'icon-undo'"><a href="#" data-link="xxx"><a href="#" data-link="{{route('ajaxgrid', ['page' => 'eds'])}}">Entry Data</a></div>
                <div class="menu-sep"></div>
                <div>
                    <span>Pelaporan SPPD</span>
                    <div id="submm2" >
                        <div><a href="#" onclick="javascript:openPage('{{route('ajaxgrid', ['page' => 'jst'])}}');"  data-link="jst.HTML"  >Jumlah SPPD Berdasarkan Tahun</a></div>
                        <div><a href="#" onclick="javascript:openPage('{{route('ajaxgrid', ['page' => 'jsj'])}}');" data-link="jsj.HTML" >Jumlah SPPD Berdasarkan Jenis</a></div>
                        <div class="menu-sep"></div>
                        <div><a href="#"  onclick="javascript:openPage('{{route('ajaxgrid', ['page' => 'jss'])}}');"  data-link="jss.HTML" >Jumlah SPPD menurut SKPD</a></div>
                        <div><a href="#"  onclick="javascript:openPage('jsjs.HTML');"  data-link="{{route('ajaxgrid', ['page' => 'jsjs'])}}">Jumlah SPPD Berdasarkan Jenis Per SKPD</a></div>

                    </div>
                </div>

            </div>
            <div id="mm3" style="width:100px;">
                <div data-options="iconCls:'icon-undo'"><a href="#" data-link="{{route('ajaxgrid', ['page' => 'jss'])}}">Setting Applikasi</a></div>
                <div class="menu-sep"></div>
                <div data-options="iconCls:'icon-undo'"><a href="#" data-link="{{route('ajaxgrid', ['page' => 'jss'])}}">Manajemen User</a></div>
                <div class="menu-sep"></div>
                <div data-options="iconCls:'icon-undo'"><a href="#" data-link="{{route('ajaxgrid', ['page' => 'jss'])}}">Hak Akses</a></div>
                <div class="menu-sep"></div>
                
            </div>
            <div id="mm4" style="width:100px;">
                <div data-options="iconCls:'icon-undo'"><a href="#" data-link="{{route('ajaxgrid', ['page' => 'jss'])}}">User Profile</a> </div>
                <div class="menu-sep"></div>
                <div data-options="iconCls:'icon-undo'"><a href="#" data-link="{{route('ajaxgrid', ['page' => 'jss'])}}">Password</a> </div>
                <div class="menu-sep"></div>
                <div data-options="iconCls:'icon-undo'"><a href="#" data-link="{{route('ajaxgrid', ['page' => 'jss'])}}">Help</a></div>
                <div class="menu-sep"></div>
                <div data-options="iconCls:'icon-undo'"><a href="#" data-link="{{route('ajaxgrid', ['page' => 'jss'])}}">Logout</a></div>
                <div class="menu-sep"></div>
                
            </div>

            <!-- datagrid toolbarrrr ================================================== -->
            <div id="tb" style="padding:5px;height:auto">
                <div style="margin-bottom:5px">
                    <a href="#" class="easyui-linkbutton" iconCls="fa fa-plus" onclick="javascript:TambahDokSPPD('Home');"plain="true">Tambah </a>
                    <a href="#" class="easyui-linkbutton" iconCls="icon-edit" plain="true"> Koreksi</a>
                    <a href="#" class="easyui-linkbutton" iconCls="icon-save" plain="true">Refresh</a>
                    <a href="#" class="easyui-linkbutton" iconCls="icon-save" plain="true">Lihat Dokumen</a>
                    <a href="#" class="easyui-linkbutton" iconCls="icon-save" plain="true">Hapus</a>
                    <!-- <a href="#" class="easyui-linkbutton" iconCls="icon-save" plain="true">Tampilkan Filter Dokumen</a> -->
                    <input type="checkbox">Tampilkan Filter Dokumen
                </div>
                <div>
                    Nama SKPD :   
                    <input id="cc_skpd" class="easyui-combobox" style="width:700px"
                    
                    >
                </div>
            </div>
    
@endsection
@section('footer')
    @parent
  
@endsection