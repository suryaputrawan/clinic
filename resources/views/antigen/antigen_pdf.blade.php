<!DOCTYPE html>
<head>
    <title>Surat Keterangan Antigen Swab</title>
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
          <i>LETTER OF STATEMENT</i>
        </h3>
        <br><center>No : {{ $antigen->nosurat }}</center><br>

        <p>Yang bertanda tangan di bawah ini menerangkan bahwa : <br>
        <i>The undersigned below explains that : </i></p>

        <?php
          $time = strtotime($antigen->patient->patDOB);
          $newformat = date('d M Y',$time);
        ?>

        <?php
          $time2 = strtotime($antigen->tanggal);
          $tanggal = date('d M Y',$time2);
        ?>

        <table>
            <tr>
                <td style="width: 30%">Nama / <i>Name</i></td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;">{{ $antigen->patient->patGivenname }} {{ $antigen->patient->patSurename }}</td>
            </tr>
            <tr>
                <td style="width: 30%, height:5px;">NIK / <i>Identification Number</i></td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;">{{ $antigen->patient->patidCardNo }}</td>
            </tr>
            <tr>
              <td style="width: 30%, height:5px;">Tempat, tgl lahir / <i>Place, DOB</i></td>
              <td style="width: 5%;">:</td>
              <td style="width: 65%;">{{ $antigen->pob }}, {{ $newformat }}</td>
            </tr>
            <tr>
              <td style="width: 30%;">Jenis Kelamin / <i>Sex</i></td>
              <td style="width: 5%;">:</td>
              <td style="width: 65%;">{{ ($antigen->patient->patSex) == "L" ? 'Male / Laki-laki' : 'Female / Perempuan' }}</td>
            </tr>
            <tr>
              <td style="width: 30%;">Kebangsaan / <i>Nationality</i></td>
              <td style="width: 5%;">:</td>
              <td style="width: 65%;">{{ $antigen->nationality->nationName }}</td>
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

        <br><p>Pasien telah menjalani pemeriksaan Antigen Swab Covid-19 yang dilakukan oleh tim {{ $company->alias }}<br>
        <i>Patient underwent the following Antigen Swab of Covid-19 at {{ $company->alias }}</i><br><br></p>

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
              <td height=40px style="border: 1px solid black"><center>{{ $tanggal }}</center></td>
              <td height=40px style="border: 1px solid black"><center>SARS-COV-2 Antigen Swab</center></td>
              <td height=40px style="border: 1px solid black"><center>{{ $antigen->result }}</center></td>
            </tr>
          </tbody>
        </table>

        <br><p>Demikian Surat Keterangan ini dibuat untuk dipergunakan sebagaimana mestinya. <br>
        <i>This Statement Letter is a verification of examination and results.</i></p><br><br>

        <div style="width: 50%; text-align: left; float: left;">{{ $company->kabupaten }} {{ $company->provinsi }}, {{ $tanggal}}</div><br><br><br><br><br><br>
        <div style="width: 50%; text-align: left; float: left;"><strong><u>{{ $antigen->dokter->doktername }}</u></strong></div><br>
        <div style="width: 50%; text-align: left; float: left;"><strong>RMO {{ $company->alias }}</strong></div>

    </div>
</body>

</html>