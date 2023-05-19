<!DOCTYPE html>
<html>
<head>
  <title>Surat Pengajuan Pelatihan</title>
    <style>
    body {
      font-family: Arial, sans-serif;
      max-width: 600px;
      margin: 0 auto;
      padding: 20px;
      background-color: #f2f2f2;
    }
    
    .container {
      background-color: #ffffff;
      border: 1px solid #ccc;
      padding: 20px;
      display: flex;
      justify-content: space-between;
    }
    
    header {
      text-align: center;
      margin-bottom: 20px;
    }
    
    .date {
      text-align: left;
    }
    
    .subject {
      margin-top: 20px;
      font-weight: bold;
    }
    
    .content {
      margin-top: 20px;
    }
    
    .greetings {
      margin-top: 20px;
    }
    
    .body {
      margin-top: 10px;
      text-align: justify;
    }
    
    .closing {
      margin-top: 20px;
      text-align: justify;
    }
    
    .signature {
      font-weight: bold;
      margin-top: 30px;
    }
    
    .signature-details {
      margin-top: 10px;
    }
    
    .logo {
      text-align: right;
    }
    
    .qr-code {
      text-align: left;
      margin-top: 20px;
    }
  </style>
</head>
<body>

  
  <div class="container">
    <div class="content">
          
    <div class="logo">
      <img src="logo.png" alt="Logo Perusahaan">
    </div>
    <header>
      <h1>Surat Pengajuan Pelatihan</h1>
    </header>
      <p class="date">No. [Tanggal Surat]/[Tanggal ACC]</p>
      <p class="subject">[Tanggal ACC]<br>Perihal: Permohonan Pelatihan</p>
      
      <p class="greetings">Dengan hormat,</p>
      <p class="body">
        Sehubungan dengan pengajuan pelatihan karyawan yang diajukan oleh karyawan [Nama karyawan] dari divisi [Nama Divisi] pada [Tanggal Pengajuan Pelatihan], kami memberikan persetujuan untuk melaksanakan pelatihan tersebut.
        <br><br>
        Dengan ini kami persilahkan kepada [Nama karyawan] untuk melaksanakan pelatihan dengan rincian sebagai berikut:<br>
        Nama Pelatihan: [Nama Pelatihan]<br>
        Tanggal Pelatihan: [Tanggal dimulai] – [tanggal berakhir]<br>
        Tempat Pelatihan: [Tempat Pelatihan]<br>
        Biaya Pelatihan: [Biaya Pelatihan]<br>
        Scope Pelatihan: [Scope pelatihan]
      </p>
      <p class="closing">Demikianlah surat ini kami sampaikan sebagai tindak lanjut dari pengajuan pelatihan karyawan.</p>
      
      <div class="qr-code">
        <img src="qr_code.png" alt="QR Code">
      </div>
      
      <p class="signature">Hormat kami,</p>
      <p class="signature-details">Nama dan Jabatan Penandatangan</p>
    </div>
  </div>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
  <title>Surat Pengajuan Pelatihan</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      max-width: 600px;
      margin: 0 auto;
      padding: 20px;
    }
    
    header {
      text-align: center;
      margin-bottom: 20px;
    }
    
    .date {
      text-align: right;
    }
    
    .subject {
      margin-top: 20px;
      font-weight: bold;
    }
    
    .content {
      margin-top: 20px;
    }
    
    .greetings {
      margin-top: 20px;
    }
    
    .body {
      margin-top: 10px;
    }
    
    .closing {
      margin-top: 20px;
    }
    
    .signature {
      font-weight: bold;
      margin-top: 30px;
    }
    
    .signature-details {
      margin-top: 10px;
    }
    
    .logo {
      text-align: center;
    }
    
    .qr-code {
      text-align: center;
      margin-top: 20px;
    }
  </style>
</head>
<body>
  <header>
    <div class="logo">
      <img src="logo.png" alt="Logo Perusahaan">
    </div>
    <h1>Surat Pengajuan Pelatihan</h1>
  </header>
  
  <div class="content">
    <p class="date">No. [Tanggal Surat]/[Tanggal ACC]</p>
    <p class="subject">[Tanggal ACC]<br>Perihal: Permohonan Pelatihan</p>
    <br>
    <p class="greetings">Dengan hormat,</p>
    <p class="body">
      Sehubungan dengan pengajuan pelatihan karyawan yang diajukan oleh karyawan [Nama karyawan] dari divisi [Nama Divisi] pada [Tanggal Pengajuan Pelatihan], kami memberikan persetujuan untuk melaksanakan pelatihan tersebut.
      <br><br>
      Dengan ini kami persilahkan kepada [Nama karyawan] untuk melaksanakan pelatihan dengan rincian sebagai berikut:<br>
      Nama Pelatihan: [Nama Pelatihan]<br>
      Tanggal Pelatihan: [Tanggal dimulai] – [tanggal berakhir]<br>
      Tempat Pelatihan: [Tempat Pelatihan]<br>
      Biaya Pelatihan: [Biaya Pelatihan]<br>
      Scope Pelatihan: [Scope pelatihan]
    </p>
    <p class="closing">Demikianlah surat ini kami sampaikan sebagai tindak lanjut dari pengajuan pelatihan karyawan.</p>
    <br>
    <div class="qr-code">
      <img src="qr_code.png" alt="QR Code">
    </div>
    <br>
    <p class="signature">Hormat kami,</p>
    <p class="signature-details">
      [Nama Admin]<br>
      [Divisi Admin]
    </p>
  </div>
</body>
</html>



  @if(!($cetak))
                    <div class="flow-root">
                          <form action="{{ route('download-pdf') }}" method="POST" style="display: inline;" class="ml-3">
                                        @csrf
                                 <input type="hidden" name="id" value="{{ $pengajuan->id }}">
                                    <!-- Add other form fields here -->
                                    <!-- <button type="submit"  class="fas fa-download" aria-hidden="true"></i></button> -->
                                    <button type="submit" class="float-right inline-block mr-6 px-6 py-3 mt-3 mb-2 font-bold text-center text-white uppercase align-middle transition-all bg-transparent border-0 rounded-lg cursor-pointer active:opacity-85 hover:scale-102 hover:shadow-soft-xs leading-pro text-size-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 bg-gradient-dark-gray hover:border-slate-700 hover:bg-slate-700 hover:text-white" onclick="return confirm('Apakah Anda yakin ingin mendownload file pengajuan pelatihan ini?')">Download File</button>
                                </form>
                    </div>
                     @endif


                    