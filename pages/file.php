<?php 
$idn=$_SESSION['id_divisi'];
if (isset($_GET['id_divisi'])) {

				$id_direktorat = $_GET['id'];
				$id_divisi = $_GET['id_divisi'];	
				$id_jenis = $_GET['jenis'];	

			}
			
$querytotal ="SELECT COUNT(*) AS jml
			FROM tb_berkas, tb_pengguna, tb_direktorat, tb_divisi, tb_jenis 
			WHERE tb_berkas.id_jenis = tb_jenis.id_jenis 
			AND tb_berkas.id_pengguna = tb_pengguna.id_pengguna 
			AND tb_pengguna.id_direktorat = tb_direktorat.id_direktorat 
			AND tb_pengguna.id_divisi = tb_divisi.id_divisi AND tb_divisi.id_direktorat = tb_direktorat.id_direktorat 
			AND tb_direktorat.id_direktorat = '$id_direktorat' AND tb_divisi.id_divisi = '$id_divisi'
			ORDER BY tanggal desc, jam desc";

// echo $querytotal;
		$sqltotal = mysqli_query($mysqli, $querytotal);
        $total = mysqli_fetch_assoc($sqltotal);
        $total = $total['jml'];
		//$total = "22";
		
		$div ="SELECT * FROM tb_divisi where id_divisi='$id_divisi'";

		$divq = mysqli_query($mysqli, $div);
        $datav = mysqli_fetch_assoc($divq);
        $divv = $datav['divisi'];

        $statement1="SELECT *
					FROM tb_berkas, tb_pengguna, tb_direktorat, tb_divisi, tb_jenis 
					WHERE tb_berkas.id_jenis = tb_jenis.id_jenis 
					AND tb_berkas.id_pengguna = tb_pengguna.id_pengguna 
					AND tb_pengguna.id_direktorat = tb_direktorat.id_direktorat 
					AND tb_pengguna.id_divisi = tb_divisi.id_divisi AND tb_divisi.id_direktorat = tb_direktorat.id_direktorat 
					AND tb_direktorat.id_direktorat = '$id_direktorat' AND tb_divisi.id_divisi = '$id_divisi'
					ORDER BY tanggal desc, jam desc";
		$statement2="SELECT *
					FROM tb_berkas, tb_pengguna, tb_direktorat, tb_divisi, tb_jenis 
					WHERE tb_berkas.id_jenis = tb_jenis.id_jenis 
					AND tb_berkas.id_pengguna = tb_pengguna.id_pengguna 
					AND tb_pengguna.id_direktorat = tb_direktorat.id_direktorat 
					AND tb_pengguna.id_divisi = tb_divisi.id_divisi AND tb_divisi.id_direktorat = tb_direktorat.id_direktorat 
					AND tb_direktorat.id_direktorat = '$id_direktorat' AND tb_divisi.id_divisi = '$id_divisi'
					AND kat=0
					ORDER BY tanggal desc, jam desc";
		
		$divisiaaa = str_replace(" ","",$divv) ;
		if($idn==$id_divisi){
			$query = mysqli_query($mysqli, $statement1 );
			$query1 = mysqli_query($mysqli, $statement1 );
		}else{
			$query = mysqli_query($mysqli,$statement2 );
			$query1 = mysqli_query($mysqli,$statement2 );
		}
		
?>


<div class="intro-y flex flex-col sm:flex-row items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
        <?php echo  $divv; ?> | File page ( Total <?php echo  $total; ?> Files)
     </h2>
</div>
<div class="pos intro-y grid grid-cols-12 gap-5 mt-5">
	<div class="intro-y col-span-12">
		<div class="grid grid-cols-12 gap-5 mt-5 pt-5 border-t border-theme-5">
    <!-- BEGIN: Blog Layout -->
    <?php 
		$total=0;
		while ($data = mysqli_fetch_assoc($query)) { 
			$ddiv = str_replace(" ","",$data['divisi']) ;
		?>
			<div class="box intro-y block col-span-12 sm:col-span-4 xxl:col-span-3">
			    <div class="flex items-center border-b border-gray-200 dark:border-dark-5 px-5 py-4">
			            <div class="w-10 h-10 flex-none image-fit">
			                <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="dist/images/profile-3.jpg">
			            </div>
			            <div class="ml-3 mr-auto">
			                <span class="username"><a href="javascript:;" class="profil" data-toggle="modal" data-target="#modalprofil" id="<?php echo $data['id_pengguna']; ?>"><?php echo $data['nama_pengguna']; ?></a></span>
			                <div class="flex text-gray-600 truncate text-xs mt-1"><span class="mx-1">•</span>Shared publicly : Tgl <?php echo $data['tanggal']; ?></div>
			            </div>
			    </div>
			    <div class="p-5">
			            <div class="file box mx-auto ">
			                <a href="" class="w-3/5 file__icon file__icon--file mx-auto">
			                	<?php  

									if ($data['id_jenis'] == 1) { $url = '../../berkas/'.$divisiaaa.'/video/'; ?>
										<div class="file__icon__file-name">VIDEO</div>
										
										<?php
										
									}

									elseif ($data['id_jenis'] == 2) { $url = '../../berkas/'. $divisiaaa .'/document/'; ?>
										<div class="file__icon__file-name">DOKUMENT</div>
										
										<?php
										
									}

									elseif ($data['id_jenis'] == 3) { $url = '../../berkas/'. $divisiaaa .'/audio/'; ?>
										<div class="file__icon__file-name">AUDIO</div>
										
										<?php
										
									}

									elseif ($data['id_jenis'] == 4) { $url = '../../berkas/'. $divisiaaa .'/lain/'; ?>
										<div class="file__icon__file-name">LAINNYA</div>
						
										<?php
										
									}

									?>
							</a>
			            </div>
			            <a href="" class="block font-medium text-base mt-5"><?php echo $data['nama']; ?></a> 
			    </div>
			    <div class="flex items-center px-5 py-3 border-t border-gray-200 dark:border-dark-5">
			            <a href="javascript:;" data-toggle="modal" data-target="#modal-file" class="intro-x w-8 h-8 flex items-center justify-center rounded-full mr-1 mb-2 bg-gray-200 text-gray-600 mr-2 tooltip" title="View" id="<?php echo $data['id_berkas']; ?>" url="../berkas/<?php echo $divisiaaa; ?>/<?php if($data['id_jenis']==1){echo 'video';}else if($data['id_jenis']==2){echo 'document';}else if($data['id_jenis']==3){echo 'audio';}else{echo 'lain';}; ?>/" onclick="counter(<?php echo $data['id_berkas']; ?>, 1)"> <i data-feather="eye" class="w-3 h-3"></i> </a>
			            <a href="javascript:;" data-toggle="modal" data-target="#default<?php echo $data['id_berkas']; ?>" class="intro-x w-8 h-8 flex items-center justify-center rounded-full mr-1 mb-2 bg-theme-12 text-white mr-2 tooltip" title="Detail"> <i data-feather="list" class="w-3 h-3"></i> </a>
			            <a href="" class="intro-x w-8 h-8 flex items-center justify-center rounded-full mr-1 mb-2 bg-theme-9 text-white ml-2 tooltip" title="Download" onclick=""> <i data-feather="share" class="w-3 h-3"></i> </a>
			            <a href="javascript:;" data-toggle="modal" data-target="#comment" class="intro-x w-8 h-8 flex items-center justify-center rounded-full bg-theme-1 text-white ml-auto tooltip" title="Comments" id="<?php echo $data['id_berkas']; ?>"> <i data-feather="message-square" class="w-3 h-3"></i> </a>
			            
			    </div>
			    <div class="px-5 pt-3 pb-5 border-t border-gray-200 dark:border-dark-5">
			            <div class="w-full flex text-gray-600 text-xs sm:text-sm">
			                <div class="mr-2"> Comments: <span class="font-medium">40</span> </div>
			                <div class="mr-2"> Views: <span class="font-medium"><?php echo $data['view']; ?></span> </div>
			                <div class="ml-auto"> Download: <span class="font-medium"><?php echo $data['download']; ?></span> </div>
			            </div>
			            <div class="w-full flex items-center mt-3">
			                <div class="w-8 h-8 flex-none image-fit mr-3">
			                    <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="dist/images/profile-8.jpg">
			                </div>
			                <div class="flex-1 relative text-gray-700">
			                    <input type="text" class="input w-full rounded-full bg-gray-200 pr-10 placeholder-theme-13" placeholder="Post a comment...">
			                    <i data-feather="smile" class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0"></i> 
			                </div>
			            </div>
			    </div>
			</div>

			
		<?php
		$total++;
		}
	?>
    <!-- END: Blog Layout -->
		</div>
		<?php 
		while ($data = mysqli_fetch_assoc($query1)) { 
			$ddiv = str_replace(" ","",$data['divisi']) ;
		 ?>
			<div class="modal" id="modalprofil">
				<div class="modal-dialog">
					<div class="modal-content ">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
							<h4 class="modal-title">Profil</h4>
						</div>
						<div class="modal-body" id="data_profil"></div>
						<div class="modal-footer">
							<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>
			<!-- BEGIN: Detail Modal -->
			<div class="modal" id="default<?php echo $data['id_berkas']; ?>">
				<div class="modal__content">
			        <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200 dark:border-dark-5">
			            <h2 class="font-medium text-base mr-auto">
			                Detail file
			            </h2>
			            <button type="button" class="ml-auto" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
			        </div>
			        <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
			        	<div class="col-span-12">
			        		<table class="table table-bordered table-striped">
							<tr>
								<th>Nama</th>
								<th>:</th>
								<td><?php echo $data['nama']; ?></td>
							</tr>
							<tr>
								<th>Nama File</th>
								<th>:</th>
								<td><?php echo $data['file']; ?></td>
							</tr>
							<tr>
								<th>Deskripsi</th>
								<th>:</th>
								<td><?php echo $data['deskripsi']; ?></td>
							</tr>
							<tr>
								<th>Ukuran</th>
								<th>:</th>
								<td><?php echo $data['ukuran']; ?></td>
							</tr>
							<tr>
								<th>Tanggal Upload</th>
								<th>:</th>
								<td><?php echo $data['tanggal'] . ' : ' . $data['jam']; ?></td>
							</tr>
							<tr>
								<th>Jenis</th>
								<th>:</th>
								<td><?php echo $data['jenis']; ?></td>
							</tr>
						</table>
			        	</div>
			            
			        </div>
			    </div>
			</div>
			<!-- END: Add Detail Modal -->
			<!-- BEGIN: Comment Modal -->
			<div class="modal" id="comment">
				<div class="modal__content">
			        <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200 dark:border-dark-5">
			            <h2 class="font-medium text-base mr-auto">
			                Komentar
			            </h2>
			            <button type="button" class="ml-auto" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
			        </div>
			        <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
			            <div class="modal-body" id="komentar_public">
			        </div>
			    </div>
			</div>
			<!-- END: Add Comment Modal -->
			<!-- BEGIN: file Modal -->
			<div class="modal" id="modal-file">
				<div class="modal__content" id="lihat">
			    </div>
			</div>
			<!-- END: Add file Modal -->
		<?php }?>
	</div>
</div>



<script type="text/javascript">
	function counter(idfile, action) {
		// alert(action);
	  $.ajax({
			type: "POST",
			url: "page/setCounter.php",
			data: {idf:idfile, act:action},
			beforeSend: function(html) { // this happens before actual call
				// $("#results").html(''); 
			},
			success: function(html){ // this happens after we get results
				// alert(html);		
			}
		});  
	}
</script>