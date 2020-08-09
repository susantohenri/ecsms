<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Form 5</title>
   <style>
      * {
         font-family: 'arial';
      }

      table {
         border-collapse: collapse;
      }

      table.table,
      .table th,
      .table td {
         border: 1px solid black;
      }

      th {
         padding: 10px;
      }

      td {
         height: 30px;
      }

      .bg-gray {
         background-color: #c4bfbf;
      }

      .bg-dark {
         background-color: #585757;
         color: white;
      }

      .text-center {
         text-align: center;
      }
      .bg-yellow {
         background-color: yellow;
      }
      .row {
         display: flex;
      }

      .col {
         width: 50%;
      }
      .mt{
         margin-top: 100px;
      }
      .note{
         width: 700px;
      }
   </style>
</head>

<body>
   <h1 class="text-center">EVALUASI PENCAPAIAN HSE PERFORMANCE INDICATOR</h1>
   <table>
      <tr>
         <td>Nama Perusahaan</td>
         <td>:</td>
         <td>...............................................</td>
      </tr>
      <tr>
         <td>Jenis Pekerjaan</td>
         <td>:</td>
         <td>...............................................</td>
      </tr>
      <tr>
         <td>Lokasi Pekerjaan</td>
         <td>:</td>
         <td>...............................................</td>
      </tr>
      <tr>
         <td>Tanggal Penilaian </td>
         <td>:</td>
         <td>...............................................</td>
      </tr>
   </table>
   <br>
   <table class="table">
      <tr class="bg-dark">
         <th> No </th>
         <th> Item </th>
         <th> Target </th>
         <th> Actual </th>
         <th> Score Max </th>
         <th> Score Actual </th>
         <th> Indicator </th>
         <th> Notes </th>
      </tr>
      <tr>
         <td class="text-center"> 1 </td>
         <td> Jumlah Tenaga Kerja </td>
         <td> </td>
         <td> </td>
         <td class="text-center" rowspan="2"> NON SCORING </td>
         <td class="text-center" rowspan="2"> NON SCORING </td>
         <td> Absensi </td>
         <td> </td>
      </tr>
      <tr>
         <td class="text-center"> 2 </td>
         <td> Jumlah Jam Kerja </td>
         <td> </td>
         <td> </td>
         <td> Data Jam Kerja </td>
         <td> </td>
      </tr>
      <tr class="bg-gray">
         <td colspan="9"> <strong>Lagging Indicator</strong> </td>
      </tr>
      <tr>
         <td class="text-center"> 1 </td>
         <td> Fatality </td>
         <td> </td>
         <td> </td>
         <td class="text-center" rowspan="4"> NON SCORING
         <td class="text-center" rowspan="4"> NON SCORING </td>
         <td> Angka Total Kasus </td>
         <td> Actual ≤ Target </td>
      </tr>
      <tr>
         <td class="text-center"> 2 </td>
         <td> Lost Time Incident </td>
         <td> </td>
         <td> </td>
         <td> Angka Total Kasus </td>
         <td> Actual ≤ Target </td>
      </tr>
      <tr>
         <td class="text-center"> 3 </td>
         <td> Insiden berdampak pencemaran lingkungan </td>
         <td> </td>
         <td> </td>
         <td> Angka Total Kasus </td>
         <td> Actual ≤ Target </td>
      </tr>
      <tr>
         <td class="text-center"> 4 </td>
         <td> Insiden berdampak kebakaran / kerusakan aset </td>
         <td> </td>
         <td> </td>
         <td> Angka Total Kasus </td>
         <td> Actual ≤ Target </td>
      </tr>
      <tr>
         <td class="text-center"> 5 </td>
         <td> First Aid </td>
         <td> </td>
         <td> </td>
         <td class="text-center"> 8 </td>
         <td> </td>
         <td> Angka Total Kasus </td>
         <td> Actual ≤ Target </td>
      </tr>
      <tr>
         <td colspan="2">TOTAL NILAI</td>
         <td></td>
         <td></td>
         <td class="text-center">100</td>
         <td></td>
         <td></td>
         <td></td>
      </tr>
      <tr class="bg-yellow">
         <td colspan="4">% TOTAL NILAI = </td>
         <td colspan="2"></td>
      </tr>

   </table>
   <br><br>
   <div class="row">
      <div class="col text-center">
         <p>Region Manager HSSE MOR IV</p>
         <p class="mt">I Made Dwi Darmaputra</p>
      </div>
      <div class="col text-center">
         <p>Region Manager Aviation IV</p>
         <p class="mt">Agus Sujatmoko</p>
      </div>
   </div>
   <br>
   <p>Lagging Indicator : Score Actual = <img src="5a.png" alt="rumus"> x 100% </p>
   <p>Leading Indicator : Score Actual = <img src="5a.png" alt="rumus"> x 100%</p>
   <p>% Total Nilai = <img src="5.b.png" alt="rumus"></p>

   <p class="text-center">Ditandatangani Oleh :</p>
   <br><br>
   <div class="row">
      <div class="col text-center">
         <p><pre>...............................................</pre></p>
      </div>
      <div class="col text-center">
         <p><pre>...............................................</pre></p>
      </div>
   </div>
   <br>
   <div class="bg-yellow note"> 
      <p>NOTE : <br>
         Approval <strong>Pusat</strong> & <strong>Region</strong> : Wakil Fungsi HSSE (sesuai organisasi proyek) & Direksi Pekerjaan <br>
         Approval <strong>Lokasi</strong> : Spv HSSE & Direksi Pekerjaan
      </p>
   </div>

</body>

</html>