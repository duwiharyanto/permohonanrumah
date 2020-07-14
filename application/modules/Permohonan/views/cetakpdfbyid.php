<table width="100%" border="0" cellpadding="5" cellspacing="0">
  <tr >
    <th colspan="2" align="center" style="padding-bottom:20px" >
      <h2>FORM PERMOHONAN</h2><br />
      <h3>PENGAJUAN : <?=date('d-m-Y',strtotime($data->pengajuan))?></h3><br>
      <h3>STATUS : <?=($data->permohonan_aproval==1 ? 'Disetujui':($data->permohonan_aproval==2 ? 'Ditolak':'Menunggu'))?></h3>
    </th>
  </tr>
  <tr>
    <th width="40%" align="left">
      NIK
    </th>
    <td width=80% align="left">
      : <?=ucwords($data->pemohon_nik)?>
    </td>
  </tr>
  <tr>
    <th width="40%" align="left">
      Pemohon
    </th>
    <td width=80% align="left">
      : <?=ucwords($data->pemohon_nama)?>
    </td>
  </tr>
  <tr>
    <th align="left">
      Alamat
    </th>
    <td align="left">
      : <?=ucwords($data->pemohon_alamat)?>
    </td>
  </tr>
  <tr>
    <th align="left">
      Kontak
    </th>
    <td align="left">
      : <?=ucwords($data->pemohon_notlp)?>
    </td>
  </tr>
  <tr>
    <th align="left">
      Tgl.Lahir
    </th>
    <td align="left">
      : <?=date('d-m-Y',strtotime($data->pemohon_tgllahir))?>
    </td>
  </tr>
  <tr>
    <th align="left">
      Umur
    </th>
    <td align="left">
      <?php
        $tgllahir=new DateTime($data->pemohon_tgllahir);
        $now=new DateTime('today');
        $umur=$now->diff($tgllahir);
      ?>
      : <?=$umur->y.' Tahun, '.$umur->m.' Bulan'?>
    </td>
  </tr>
  <tr>
    <th align="left">
      Jenis Kelamin
    </th>
    <td align="left">
      : <?=$data->pemohon_jeniskelamin==1 ? 'Laki-laki':'Perempuan'?>
    </td>
  </tr>
  <tr>
    <th align="left">
      Pendidikan
    </th>
    <td align="left">
      : <?=ucwords($data->pendidikan_nama)?>
    </td>
  </tr>
  <tr>
    <th align="left">
      Pekerjaan
    </th>
    <td align="left">
      : <?=ucwords($data->pekerjaan_nama)?>
    </td>
  </tr>
  <tr>
    <td colspan="2">
      <hr />
    </td>
  </tr>
  <tr>
    <th align="left">
      Kepemilikan Tanah
    </th>
    <td align="left">
      : <?=ucwords($data->kepemilikantanah_keterangan)?>
    </td>
  </tr>
  <tr>
    <th align="left">
      Kepemilikan Rumah
    </th>
    <td align="left">
      : <?=ucwords($data->kepemilikanrumah_keterangan)?>
    </td>
  </tr>
  <tr>
    <th align="left">
      Asset Rumah di Tempat Lain
    </th>
    <td align="left">
      : <?=$data->permohonan_asetrumah==1 ? 'Ada':'Tidak Ada'?>
    </td>
  </tr>
  <tr>
    <th align="left">
      Asset Tanah di Tempat Lain
    </th>
    <td align="left">
      : <?=$data->permohonan_asettanah==1 ? 'Ada':'Tidak Ada'?>
    </td>
  </tr>
  <tr>
    <th align="left">
      Pernah Mendapat Bantuan Sebelumnya
    </th>
    <td align="left">
      : <?=($data->permohonan_bantuansebelumnya==1 ? 'Ya, Lebih dari 10 tahun yang lalu':($data->permohonan_bantuansebelumnya==2 ? 'Ya, Lebih dari 10 tahun yang lalu':'Belum Pernah'))?>
    </td>
  </tr>
  <tr>
    <th align="left">
      Kawasan
    </th>
    <td align="left">
      : <?=ucwords($data->kawasan_keterangan)?>
    </td>
  </tr>
  <tr>
    <th align="left">
      Foto
    </th>
    <td align="left">
      <img src="<?=base_url('./upload/permohonan/'.$data->permohonan_fotorumah)?>" width="120px" height="120px" alt='foto rumah'>
    </td>
  </tr>
</table>
