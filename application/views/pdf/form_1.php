<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Form 1 lembar kerja</title>
   <style>
      * {
         font-family: 'Calibri';
      }

      table {
         border-collapse: collapse;
      }

      table.table,
      .table th,
      .table td {
         border: 1px solid black;
      }

      .off-right {
         border-right: none !important;
      }

      .off-left {
         border-left: none !important;
      }

      th {
         padding: 5px;
      }

      td {
         height: 30px;
         min-width: 50px;
      }

      .text-center {
         text-align: center;
      }

      .mx-auto {
         display: block;
         margin: auto;
      }

      .bg-yellow {
         background-color: yellow;
      }

      .bg-blue {
         background-color: #4eb1f3;
      }

      .bg-blue-1 {
         background-color: #c8e7fc;
      }

      .bg-gray {
         background-color: #c7c7c7;
      }
   </style>
</head>

<body>
   <h1 class="text-center">LEMBAR KERJA PENGISIAN HSE PLAN</h1>
   <table>
      <tr>
         <td>Nama Kontraktor </td>
         <td>:</td>
      </tr>
      <tr>
         <td>Nama Proyek </td>
         <td>:</td>
      </tr>
      <tr>
         <td>Lokasi Proyek </td>
         <td>:</td>
      </tr>
   </table>
   <br>
   <table class="table">
      <tr>
         <th rowspan="2" class="bg-blue">No</th>
         <th rowspan="2" class="bg-blue">ELEMEN HSE PLAN YANG DISYARATKAN</th>
         <th colspan="2" class="bg-blue">Penilaian per Elemen</th>
         <th colspan="2" class="bg-blue">Pencapaian per Elemen</th>
      </tr>
      <tr>
         <th class="bg-blue">Score</th>
         <th class="bg-blue">% Bobot</th>
         <th class="bg-blue">Score</th>
         <th class="bg-blue">%</th>
      </tr>

      <?php foreach ($rows as $row) : ?>
         <?php if ('label' === $row['type']) : $label = explode('.', $row['label']) ?>
            <tr>
               <td></td>
               <td></td>
               <td class=" text-center"></td>
               <td class=" text-center"></td>
               <td class=" text-center"></td>
               <td class=" text-center"></td>
            </tr>
            <tr>
               <td class="bg-gray text-center"><strong><?= $label[0] ?></strong></td>
               <td class="bg-gray"><strong><?= $label[1] ?></strong></td>
               <td class="bg-gray"></td>
               <td class="bg-gray"></td>
               <td class="bg-gray"></td>
               <td class="bg-gray"></td>
            </tr>
         <?php elseif (0 === strpos($row['label'], 'a. ')) : ?>
            <tr>
               <td></td>
               <td><?= $row['label'] ?></td>
               <td class="text-center">1</td>
               <td rowspan="4"></td>
               <td class="bg-yellow"></td>
               <td rowspan="4"></td>
            </tr>
         <?php else : ?>
            <tr>
               <td></td>
               <td><?= $row['label'] ?></td>
               <td class="text-center">1</td>
               <td class="bg-yellow"></td>
            </tr>
         <?php endif ?>
      <?php endforeach ?>

      <tr>
         <td class="bg-gray text-center"><strong>1</strong></td>
         <td class="bg-gray"> <strong>Data Proyek</strong> </td>
         <td class="bg-gray"> </td>
         <td class="bg-gray"> </td>
         <td class="bg-gray"> </td>
         <td class="bg-gray"> </td>
      </tr>
      <tr>
         <td></td>
         <td>a. Profil Perusahaan</td>
         <td colspan="4" rowspan="3"></td>
      </tr>
      <tr>
         <td></td>
         <td>b. Gambaran umum dan lingkup kerja proyek</td>

      </tr>
      <tr>
         <td></td>
         <td>c. Surat kesanggupan untuk melengkapi dokumen pendukung yang habis masa berlakunya setelah
            penetapan pemenang
         </td>
      </tr>
      <tr>
         <td></td>
         <td></td>
         <td class=" text-center"></td>
         <td class=" text-center"></td>
         <td class=" text-center"></td>
         <td class=" text-center"></td>
      </tr>
      <tr>
         <td class="bg-gray text-center"><strong>2</strong></td>
         <td class="bg-gray"><strong>HSE Policy & Objective Contractor</strong></td>
         <td class="bg-gray"></td>
         <td class="bg-gray"></td>
         <td class="bg-gray"></td>
         <td class="bg-gray"></td>
      </tr>
      <tr>
         <td></td>
         <td>a. Memiliki kebijakan HSE secara tertulis</td>
         <td class="text-center">1</td>
         <td rowspan="4"></td>
         <td class="bg-yellow"></td>
         <td rowspan="4"></td>
      </tr>
      <tr>
         <td></td>
         <td>b. Kebijakan HSE ditandatangani oleh pejabat yang berwenang dan dicantumkan tanggal</td>
         <td class="text-center">1</td>
         <td class="bg-yellow"></td>
      </tr>
      <tr>
         <td></td>
         <td>c. Kebijakan mencakup seluruh aspek HSSE</td>
         <td class="text-center">1</td>
         <td class="bg-yellow"></td>
      </tr>
      <tr>
         <td></td>
         <td>d. Memiliki sasaran/objective </td>
         <td class="text-center">1</td>
         <td class="bg-yellow"></td>
      </tr>
      <tr>
         <td></td>
         <td></td>
         <td class="text-center bg-blue-1"><strong>4</strong></td>
         <td class="text-center bg-blue-1">5%</td>
         <td class="text-center bg-blue-1"><strong>0</strong></td>
         <td class="text-center bg-blue-1">0.0%</td>
      </tr>
      <tr>
         <td class="bg-gray text-center"> <strong>15</strong> </td>
         <td class="bg-gray"> <strong>Pemeriksaan Kesehatan</strong> </td>
         <td class="bg-gray"> </td>
         <td class="bg-gray"> </td>
         <td class="bg-gray"> </td>
         <td class="bg-gray"> </td>
      </tr>
      <tr>
         <td> </td>
         <td>a. Program Medical Check Up (MCU) pekerja </td>
         <td class="text-center"> 2 </td>
         <td rowspan="3"> </td>
         <td class="bg-yellow"> </td>
         <td rowspan="3"> </td>
      </tr>
      <tr>
         <td> </td>
         <td>b. Program Daily Check Up (DCU) pekerja </td>
         <td class="text-center"> 2 </td>
         <td class="bg-yellow"> </td>
      </tr>
      <tr>
         <td> </td>
         <td>c. Melampirkan hasil MCU (proyek > 6 bulan) atau surat keterangan sehat (proyek < 6 bulan) </td> <td class="text-center"> 2 </td>
         </td>
         <td class="bg-yellow"> </td>
      </tr>
      <tr>
         <td> </td>
         <td> </td>
         <td class="text-center bg-blue-1"> <strong>6</strong> </td>
         <td class="text-center bg-blue-1"> 5% </td>
         <td class="text-center bg-blue-1"> <strong>0</strong> </td>
         <td class="text-center bg-blue-1"> 0.0% </td>
      </tr>
      <tr>
         <td colspan="2">% Pencapaian Total Score Elemen HSE Plan </td>
         <td class="text-center bg-blue"> <strong>100</strong> </td>
         <td class="text-center bg-blue"> <strong>100%</strong> </td>
         <td class="text-center bg-blue"> <strong>0</strong> </td>
         <td class="text-center bg-blue"> <strong>0%</strong> </td>
      </tr>

   </table>
   <br>

   <table class="table">
      <tr>
         <td colspan="4"> % Pencapaian Total Score Elemen HSE Plan </td>
         <td> </td>
         <td class="text-center"> Y </td>
      </tr>
      <tr>
         <td colspan="4"> Bobot HSE Plan yang ditentukan dalam Evaluasi Penawaran (10% - 30%) </td>
         <td> </td>
         <td class="text-center"> Z </td>
      </tr>
      <tr>
         <td colspan="6"> <strong>% Pencapaian Bobot Evaluasi HSE Plan dalam Evaluasi Dokumen Penawaran Kontraktor
               (YxZ)</strong> </td>
      </tr>
   </table>
</body>

</html>