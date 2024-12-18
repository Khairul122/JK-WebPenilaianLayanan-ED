<script type="text/javascript" src="fusion/JS/jquery-1.4.js"></script>
<script type="text/javascript" src="fusion/JS/jquery.fusioncharts.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">
			<i class="glyphicon glyphicon-new-window"></i> Hasil Kuisioner
		</h1>
		<ol class="breadcrumb">
			<li class="active">
				<a href="master.php?module=hasil&sub=all">Hasil Kuisioner</a>
			</li>
			<?php if ($_GET['sub'] == 'all') { ?>
				<li class="active">
					<a href="master.php?module=hasil&sub=all">Grafik Keseluruhan</a>
				</li>
			<?php } ?>
			<?php if ($_GET['sub'] == 'pergroup') { ?>
				<li class="active">
					<a href="master.php?module=hasil&sub=pergroup">Grafik Per Group</a>
				</li>
			<?php } ?>
			<?php if ($_GET['sub'] == 'laporan') { ?>
				<li class="active">
					<a href="master.php?module=hasil&sub=laporan">Laporan</a>
				</li>
			<?php } ?>
		</ol>
	</div>
</div>

<nav class="navbar navbar-inverse">
	<ul class="nav navbar-nav">
		<li class="<?php if ($_GET['sub'] == 'all') {
						echo 'active';
					} ?>">
			<a href="?module=hasil&sub=all">Grafik Keseluruhan</a>
		</li>
		<li class="<?php if ($_GET['sub'] == 'pergroup') {
						echo 'active';
					} ?>">
			<a href="?module=hasil&sub=pergroup">Grafik Per Group</a>
		</li>
		<li class="<?php if ($_GET['sub'] == 'laporan') {
						echo 'active';
					} ?>">
			<a href="?module=hasil&sub=laporan">Laporan</a>
		</li>
	</ul>
</nav>

<?php if ($_GET['sub'] == 'all') { ?>
	<div class="panel panel-primary">
		<div class="panel-heading">
			<div class="panel-title">Grafik Kuisioner Secara Keseluruhan</div>
		</div>
		<canvas id="chartKuisioner" width="1000" height="500"></canvas>
		<?php
		$sql = mysql_query("SELECT SUM(jawabanA) AS TotalA, SUM(jawabanB) AS TotalB, SUM(jawabanC) AS TotalC, SUM(jawabanD) AS TotalD, SUM(jawabanE) AS TotalE FROM tanswer");
		$oke = mysql_fetch_array($sql);
		$a = $oke['TotalA'];
		$b = $oke['TotalB'];
		$c = $oke['TotalC'];
		$d = $oke['TotalD'];
		$e = $oke['TotalE'];

		$tot = $a + $b + $c + $d + $e;

		$pa = ROUND(($a / $tot) * 100);
		$pb = ROUND(($b / $tot) * 100);
		$pc = ROUND(($c / $tot) * 100);
		$pd = ROUND(($d / $tot) * 100);
		$pe = ROUND(($e / $tot) * 100);
		?>
		<script>
			// Data untuk grafik
			const dataKuisioner = {
				labels: ['Jawaban A', 'Jawaban B', 'Jawaban C', 'Jawaban D', 'Jawaban E'],
				datasets: [{
					label: 'Jumlah Jawaban',
					data: [<?php echo $a; ?>, <?php echo $b; ?>, <?php echo $c; ?>, <?php echo $d; ?>, <?php echo $e; ?>],
					backgroundColor: [
						'rgba(255, 99, 132, 0.2)',
						'rgba(54, 162, 235, 0.2)',
						'rgba(255, 206, 86, 0.2)',
						'rgba(75, 192, 192, 0.2)',
						'rgba(153, 102, 255, 0.2)'
					],
					borderColor: [
						'rgba(255, 99, 132, 1)',
						'rgba(54, 162, 235, 1)',
						'rgba(255, 206, 86, 1)',
						'rgba(75, 192, 192, 1)',
						'rgba(153, 102, 255, 1)'
					],
					borderWidth: 1
				}]
			};
			const configKuisioner = {
				type: 'bar',
				data: dataKuisioner,
				options: {
					responsive: true,
					scales: {
						y: {
							beginAtZero: true
						}
					}
				}
			};
			const ctx = document.getElementById('chartKuisioner').getContext('2d');
			new Chart(ctx, configKuisioner);
		</script>
		<div class="panel-body">
			<table id="myHTMLTable" border="0" cellpadding="5" class="table table-striped">
				<tr>
					<th width="15%">Data</th>
					<th width="18%">Jawaban A</th>
					<th width="18%">Jawaban B</th>
					<th width="18%">Jawaban C</th>
					<th width="18%">Jawaban D</th>
					<th>Jawaban E</th>
				</tr>
				<?php
				$sql = mysql_query("SELECT SUM(jawabanA) AS TotalA, SUM(jawabanB) AS TotalB, SUM(jawabanC) AS TotalC, SUM(jawabanD) AS TotalD, SUM(jawabanE) AS TotalE FROM tanswer");
				$oke = mysql_fetch_array($sql);
				$a = $oke['TotalA'];
				$b = $oke['TotalB'];
				$c = $oke['TotalC'];
				$d = $oke['TotalD'];
				$e = $oke['TotalE'];
				$tot = $a + $b + $c + $d + $e;

				$pa = ROUND(($a / $tot) * 100);
				$pb = ROUND(($b / $tot) * 100);
				$pc = ROUND(($c / $tot) * 100);
				$pd = ROUND(($d / $tot) * 100);
				$pe = ROUND(($e / $tot) * 100);
				echo "<tr>
                <td>Jumlah Jawaban</td>
                <td>$a</td>
                <td>$b</td>
                <td>$c</td>
                <td>$d</td>
                <td>$e</td>
              </tr>
              <tr>
                <td>Persentase</td>
                <td>$pa%</td>
                <td>$pb%</td>
                <td>$pc%</td>
                <td>$pd%</td>
                <td>$pe%</td>
              </tr>";
				?>
			</table>

		</div>
	</div>
<?php } ?>

<?php if ($_GET['sub'] == 'pergroup') { ?>
<?php
error_reporting(1);
$result = mysql_query("SELECT groupId FROM tgroup GROUP BY groupId");
$kolom = 2;
$array = array();
while ($sql = mysql_fetch_array($result)) {
    array_push($array, $sql);
}
$chunks = array_chunk($array, $kolom);

foreach ($chunks as $chunk) {
    foreach ($chunk as $data) {
        echo "<div class='col-md-6' style='padding-left:0px;padding-right:0px;'>";
        $data2 = mysql_fetch_array(mysql_query("SELECT * FROM tgroup WHERE groupId='{$data['groupId']}' GROUP BY groupId"));
?>
        <div class="panel panel-primary" style='margin-left:10px'>
            <div class="panel-heading">
                <div class="panel-title"><?php echo $data2['groupName']; ?></div>
            </div>
            <div class="panel-body">
                <canvas id="chart<?php echo $data2['groupId']; ?>" width="500" height="300"></canvas>
                <script>
                    var ctx = document.getElementById('chart<?php echo $data2['groupId']; ?>').getContext('2d');
                    var chart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: ['Jawaban A', 'Jawaban B', 'Jawaban C', 'Jawaban D', 'Jawaban E'],
                            datasets: [{
                                label: 'Jumlah Jawaban',
                                data: [<?php echo $a; ?>, <?php echo $b; ?>, <?php echo $c; ?>, <?php echo $d; ?>, <?php echo $e; ?>],
                                backgroundColor: [
                                    'rgba(255, 99, 132, 0.2)',
                                    'rgba(54, 162, 235, 0.2)',
                                    'rgba(255, 206, 86, 0.2)',
                                    'rgba(75, 192, 192, 0.2)',
                                    'rgba(153, 102, 255, 0.2)'
                                ],
                                borderColor: [
                                    'rgba(255, 99, 132, 1)',
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(255, 206, 86, 1)',
                                    'rgba(75, 192, 192, 1)',
                                    'rgba(153, 102, 255, 1)'
                                ],
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                </script>
                <table id="myHTMLTable<?php echo $data2['groupId']; ?>" border="0" cellpadding="5" class="table table-striped" style="margin-top: 20px;">
                    <tr>
                        <th>Data</th>
                        <th>Jawaban A</th>
                        <th>Jawaban B</th>
                        <th>Jawaban C</th>
                        <th>Jawaban D</th>
                        <th>Jawaban E</th>
                    </tr>
                    <?php
                    $sql = mysql_query("SELECT SUM(jawabanA) AS TotalA, SUM(jawabanB) AS TotalB, SUM(jawabanC) AS TotalC, SUM(jawabanD) AS TotalD, SUM(jawabanE) AS TotalE FROM tanswer WHERE groupId='{$data2['groupId']}'");
                    $oke = mysql_fetch_array($sql);
                    $a = $oke['TotalA'];
                    $b = $oke['TotalB'];
                    $c = $oke['TotalC'];
                    $d = $oke['TotalD'];
                    $e = $oke['TotalE'];
                    $tot = $a + $b + $c + $d + $e;

                    $pa = ROUND(($a / $tot) * 100);
                    $pb = ROUND(($b / $tot) * 100);
                    $pc = ROUND(($c / $tot) * 100);
                    $pd = ROUND(($d / $tot) * 100);
                    $pe = ROUND(($e / $tot) * 100);
                    echo "<tr>
                        <td>Jumlah Jawaban</td>
                        <td>$a</td>
                        <td>$b</td>
                        <td>$c</td>
                        <td>$d</td>
                        <td>$e</td>
                    </tr>
                    <tr>
                        <td>Prosentase</td>
                        <td>$pa%</td>
                        <td>$pb%</td>
                        <td>$pc%</td>
                        <td>$pd%</td>
                        <td>$pe%</td>
                    </tr>";
                    ?>
                </table>
            </div>
        </div>
<?php
        echo '</div>';
    }
}
?>
<?php } ?>

<?php if ($_GET['sub'] == 'laporan') { ?>
	<div class="panel panel-primary">
		<div class="panel-heading">
			<div class="panel-title">
				<b>Daftar Responden</b><button style="margin-left:710px;" class='btn btn-sm btn-success' value='Print All to Excel' onclick=location.href='modul/mod_report/all_responden.php'><span class="glyphicon glyphicon-zoom-in"></span> Rekap Semua Kuisioner</button>
			</div>
		</div>

		<div class="panel-body">
			<div class="row">
				<div class="col-md-5">
					<div class="panel panel-default">
						<div class="panel-heading">
							<div class="panel-title"> Tampilkan Berdasarkan Tanggal</div>
						</div>
						<div class="panel-body">
							<form action="?module=hasil&sub=laporan&tampilkan=pertanggal" method="post" class="form-horizontal">
								<?php include "../fungsi/fungsi_combobox.php";
								include "../fungsi/library.php"; ?>
								<div class="form-group">
									<label for="tanggal1" class="control-label col-sm-4">Dari tanggal</label>
									<div class="col-sm-7">

										<?php combotgl(01, 31, 'tgl_mulai', $tgl_skrg);
										combobln(01, 12, 'bln_mulai', $bln_sekarang);
										combothn(2000, $thn_sekarang, 'thn_mulai', $thn_sekarang);
										?>
									</div>
								</div>
								<div class="form-group">
									<label for="tanggal2" class="control-label col-sm-4">s/d Tanggal</label>
									<div class="col-sm-7">

										<?php combotgl(01, 31, 'tgl_selesai', $tgl_skrg);
										combobln(01, 12, 'bln_selesai', $bln_sekarang);
										combothn(2000, $thn_sekarang, 'thn_selesai', $thn_sekarang);
										?>
									</div>
								</div>
								<div class="col-sm-4">
									<input type="hidden" name="pertanggal" value="pertanggal">
								</div>
								<div class="col-sm-4">
									<button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-search"></span> Oke</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>

			<?php if ($_GET['tampilkan'] == 'pertanggal') {
				$tgl_awal = $_POST['thn_mulai'] . "-" . $_POST['bln_mulai'] . "-" . $_POST['tgl_mulai'];
				$tgl_akhir = $_POST['thn_selesai'] . "-" . $_POST['bln_selesai'] . "-" . $_POST['tgl_selesai'];
				$awalindo = tgl_indo($tgl_awal);
				$akhirindo = tgl_indo($tgl_akhir);

			?>
				<div class="alert alert-info" role="alert">
					Menampilkan data dari tanggal <b><?php echo $awalindo . " Sampai dengan " . $akhirindo ?><b />
				</div>
				<table id="tablekonten" class="table table-striped table-bordered">
					<th>
						<div id='kontentd'>No</div>
					</th>
					<th>
						<div id='kontentd'>Nama Responden</div>
					</th>
					<th>Tanggal Isi Survey</th>
					<th>
						<div id='kontentd'>Aksi</div>
					</th>
					</tr>
					<?php
					include "../koneksi.php";
					include "../fungsi/fungsi_indotgl.php";
					error_reporting(1);
					$jumlahdata = mysql_num_rows(mysql_query("SELECT * FROM tcompany WHERE dateSurvey BETWEEN '$tgl_awal' AND '$tgl_akhir'"));
					$sql = mysql_query("SELECT * FROM tcompany WHERE dateSurvey BETWEEN '$tgl_awal' AND '$tgl_akhir' ORDER by companyName ");
					$no = 1;
					while ($data = mysql_fetch_array($sql)) {
						$dateIndo = tgl_indo($data['dateSurvey']);
					?>
						<tr>
							<td>
								<div id='kontentd'><?php echo $no; ?></div>
							</td>
							<td>
								<div id='kontentd'><?php echo $data['companyName'] ?></div>
							</td>
							<td><?php echo $dateIndo ?></td>
							<td>
								<div id='kontentd'><a target='_blank' href='modul/mod_report/responden.php?act=detail&id=<?php echo $data[companyId]; ?>'>
										<button class='btn btn-sm btn-success'><span class=\"glyphicon glyphicon-zoom-in\"></span> Detail</button></a>
									<?php if ($_SESSION['level'] == "Super") { ?><a href='modul/mod_report/responden.php?act=hapus&id=<?php echo $data[companyId] ?>'>
											<button class='btn btn-sm btn-danger' onclick=\"return confirm('Hapus Deskripsi?')\"><span class=\"glyphicon glyphicon-trash\"></span> Hapus</button></a><?php } ?>
								</div>
							</td>
						</tr>
					<?php
						$no++;
					}
					?>

				</table>
				<div class="col-md-12">
					<div class="well">
						<?php echo "Jumlah Responden : <font face='tahoma' size='3'><b>$jumlahdata </b> Responden</font>"; ?>
					</div>
				</div>
			<?php
			} else { ?>
				<div class="alert alert-info" role="alert">
					<strong>Menampilkan semua hasil survey</strong>
				</div>
				<table id="tablekonten" class="table table-striped table-bordered">
					<th>
						<div id='kontentd'>No</div>
					</th>
					<th>
						<div id='kontentd'>Nama Responden</div>
					</th>
					<th>Tanggal Isi Survey</th>
					<th>
						<div id='kontentd'>Aksi</div>
					</th>
					</tr>
					<?php
					include "../koneksi.php";
					include "../fungsi/fungsi_indotgl.php";
					error_reporting(1);


					$jumlahdata = mysql_num_rows(mysql_query("SELECT * FROM tcompany "));
					$p      = new PagingHasil;
					$batas  = 10;
					$posisi = $p->cariPosisi($batas);
					$sql = mysql_query("SELECT * FROM tcompany  ORDER by companyName ASC LIMIT $posisi,$batas");
					$no = $posisi + 1;
					while ($data = mysql_fetch_array($sql)) {
						$dateIndo = tgl_indo($data['dateSurvey']);
					?>
						<tr>
							<td>
								<div id='kontentd'><?php echo $no; ?></div>
							</td>
							<td>
								<div id='kontentd'><?php echo $data['companyName'] ?></div>
							</td>
							<td><?php echo $dateIndo ?></td>
							<td>
								<div id='kontentd'><a target='_blank' href='modul/mod_report/responden.php?act=detail&id=<?php echo $data[companyId]; ?>'>
										<button class='btn btn-sm btn-success'><span class=\"glyphicon glyphicon-zoom-in\"></span> Detail</button></a>
									<?php if ($_SESSION['level'] == "Super") { ?><a href='modul/mod_report/responden.php?act=hapus&id=<?php echo $data[companyId] ?>'>
											<button class='btn btn-sm btn-danger' onclick=\"return confirm('Hapus Deskripsi?')\"><span class=\"glyphicon glyphicon-trash\"></span> Hapus</button></a><?php } ?>
								</div>
							</td>
						</tr>
					<?php
						$no++;
					}
					?>
				</table>
				<div class="col-md-12">
					<div class="well">
						<?php echo "Jumlah Responden : <font face='tahoma' size='3'><b>$jumlahdata </b> Responden</font>"; ?>
					</div>
				</div>
			<?php

				$jmldata = mysql_num_rows(mysql_query("SELECT * FROM tcompany "));
				$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
				$linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

				echo "<ul class='pagination'>$linkHalaman</ul> ";
			}
			?>
		</div>
	</div>
<?php
} ?>