<!DOCTYPE html>
<head>
    <title>Surat Keterangan PCR-Swabtest</title>
    <meta charset="utf-8">
    <style>
      /* body{
          background-image: url({{ asset('style/images/logomiring.png') }});
          background-repeat: no-repeat;
          background-attachment: fixed;
          background-position: center;
          background-size: 700px;
        } */

      #judul{
          text-align:center;
      }

      #halaman{
          width: auto; 
          height: auto; 
          position: absolute; 
          padding-top: 30px; 
          padding-left: 30px; 
          padding-right: 30px; 
          padding-bottom: 80px;
      }
    </style>
</head>

<body>
    <div id=halaman><br><br><br>
        <h3 id=judul><u>SURAT KETERANGAN</u><br>
          <i>LETTER OF STATEMENT</i><br>
        </h3>
        <center>No : {{ $swabtest->nosurat }}</center><br>

        <p>Yang bertanda tangan di bawah ini menerangkan bahwa : <br>
        <i>The undersigned below explains that : </i></p>

        <?php
          $time = strtotime($swabtest->patient->patDOB);
          $tanggal_lahir = date('d M Y',$time);

          $time2 = strtotime($swabtest->tanggal_sampling);
          $tanggal_sampling = date('d M Y',$time2);

          $time3 = strtotime($swabtest->tanggal_validasi);
          $tanggal_validasi = date('d M Y',$time3);

          $time4 = strtotime($swabtest->waktu_validasi);
          $waktu_validasi = date('H:i:s',$time4);

          $time5 = strtotime($swabtest->tanggal_surat);
          $tanggal_surat = date('d M Y',$time5);
        ?>

        <table>
            <tr>
                <td style="width: 30%">Nama / <i>Name</i></td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;">{{ $swabtest->patient->patGivenname }} {{ $swabtest->patient->patSurename }}</td>
            </tr>
            <tr>
                <td style="width: 30%, height:5px;">NIK / <i>Identification Number</i></td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;">{{ $swabtest->patient->patidCardNo }}</td>
            </tr>
            <tr>
              <td style="width: 30%, height:5px;">Tempat, tgl lahir / <i>Place, DOB</i></td>
              <td style="width: 5%;">:</td>
              <td style="width: 65%;">{{ $swabtest->pob }}, {{ $tanggal_lahir }}</td>
          </tr>
            <tr>
              <td style="width: 30%;">Jenis Kelamin / <i>Sex</i></td>
              <td style="width: 5%;">:</td>
              <td style="width: 65%;">{{ ($swabtest->patient->patSex) == "L" ? 'Male / Laki-laki' : 'Female / Perempuan' }}</td>
            </tr>
            <tr>
              <td style="width: 30%;">Kebangsaan / <i>Nationality</i></td>
              <td style="width: 5%;">:</td>
              <td style="width: 65%;">{{ $swabtest->nationality->nationName }}</td>
            </tr>
            <tr>
              <td></td>
            </tr>
            <tr>
                <td style="width: 30%;">(selanjutnya disebut "Pasien")</td>
            </tr>
            <tr>
              <td style="width: 30%;"><i>(hereinafter referred to as "Patient")</i></td>
          </tr>
        </table>

        <br><p>Pasien telah menjalani pemeriksaan RT-PCR SARS-COV-2 yang dilakukan oleh tim {{ $company->alias }}<br>
        <i>Patient underwent the following RT-PCR SARS-COV-2 at {{ $company->alias }}</i><br><br></p>

        <table style="border-collapse: collapse" border="3" width="650px">
          <thead style="background-color: gray">
            <tr>
              <td style="border: 1px solid black" width="200px"><center><strong>Tanggal Pemeriksaan<br><i>
                Date of Examination</i></strong></center>
              </td>
              <td style="border: 1px solid black" width="250px"><center><strong>Jenis Pemeriksaan<br><i>
                Type of Examination</i></strong></center>
              </td>
              <td style="border: 1px solid black" width="200px"><center><strong>Hasil Pemeriksaan<br><i>
                Result</i></strong></center>
              </td>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td style="border: 1px solid black"><center>{{ $tanggal_sampling }}</center></td>
              <td style="border: 1px solid black"><center>PCR Swabtest Covid-19</center></td>
              <td style="border: 1px solid black">
                <center>
                  {{ $swabtest->result }} <br> 
                  (Valid date : {{ $tanggal_validasi }}) 
                  (Valid time : {{ $waktu_validasi }})
                </center>
              </td>
            </tr>
          </tbody>
        </table>

        <br><p>Demikian Surat Keterangan ini dibuat untuk dipergunakan sebagaimana mestinya. <br>
        <i>This Statement Letter is a verification of examination and results.</i></p><br><br>

        <div style="width: 50%; text-align: left; float: left;">Badung Bali, {{ $tanggal_surat }}</div><br><br><br><br><br><br>
        <div style="width: 50%; text-align: left; float: left;"><strong><u>{{ $swabtest->dokter->doktername }}</u></strong></div><br>
        <div style="width: 50%; text-align: left; float: left;"><strong>RMO {{ $company->alias }}</strong></div>

    </div>
</body>

</html>