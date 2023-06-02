<!DOCTYPE html>
<html>
<head>
<style>
    .container {
        margin-left: 30px;
        background-color: #ffffff;
        color: black;
        display: flex;
        justify-content: center;
    }
    
    .logo {
        text-align: right;
        float: right;
    }
    
    .nomer {
       
        font-weight: bold;
    }
    
    .title {
        text-align: center;
        margin: 30px;
        font-size: 20px;
        font-weight: bold;
    }
    
    p {
        text-align: left;
    }
    
    .content {
        margin-top: 30px;
        text-align: justify;
    }
    
    table {
        margin-top: 20px;
        margin-left: 30px;
    }
    
    .signature {
        margin-top: 60px;
        font-weight: bold;
    }
    
    .admin {
         margin-top: 30px;
        font-weight: bold;
    }
</style>
</head>
<body>
    <div class="container">
        <div class="logo">
            <img src="{{ $image}}" alt="Logo Perusahaan" style="width: 180px;">
        </div>
        <div style="clear: both;"></div>
        <div class="title">
            Surat Persetujuan Pelatihan
            </div>
            <p class="nomer">No. {{ sprintf("%03d", $surat->nomer_surat)  }}/{{ date("d-m-Y", strtotime($pengajuan->tanggal_verifikasi)) }}</p>
            
        <p class="content">
            Dengan hormat,<br><br>
            Sehubungan dengan pengajuan pelatihan karyawan yang diajukan oleh karyawan  <b>{{ $karyawan->nama_user }}</b> dari  <b>Divisi  {{ $div_karyawan->nama_divisi }}</b>, kami memberikan persetujuan untuk melaksanakan pelatihan tersebut.<br><br>
            Dengan ini kami persilahkan kepada karyawan yang bersangkutan untuk melaksanakan pelatihan dengan rincian sebagai berikut :
            </p>
        <table>
            <tr>
                <td>Judul Pelatihan</td>
                <td>:</td>
                <td>{{ $pelatihan->judul_pelatihan }}</td>
            </tr>
            <tr>
                <td>Tanggal Pelatihan</td>
                <td>:</td>
                <td>{{ date("d-m-Y", strtotime($pelatihan->tanggal_dimulai)) }} s/d {{ date("d-m-Y", strtotime($pelatihan->tanggal_berakhir)) }}</td>
            </tr>
            <tr>
                <td>Tempat Pelatihan</td>
                <td>:</td>
                <td>Rp. {{ number_format($pelatihan->biaya_pelatihan, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <td>Biaya Pelatihan</td>
                <td>:</td>
                <td>{{ $pelatihan->biaya_pelatihan }}</td>
            </tr>
            <tr>
                <td>Scope Pelatihan</td>
                <td>:</td>
                <td>{{ $pelatihan->scope_pelatihan }}</td>
            </tr>
        </table>
        <p class="content">Demikianlah surat ini kami sampaikan sebagai tindak lanjut dari pengajuan pelatihan karyawan. Atas perhatian dan kerjasamanya kami ucapkan terimakasih</p>
        <p class ="signature"><br>Hormat kami,</p>
        <!-- <img src="qr_code.png" alt="QR Code"> -->
        <div class="admin">
            <p><u>{{ $admin->nama_user }}</u></p>
            <p>{{ $div_admin->nama_divisi }}</p>
        </div>
    </div>

</body>
</html>
