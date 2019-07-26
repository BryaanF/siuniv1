<?php
	$target_dir = "uploads";
	$uploadOk = 1;
	// memeriksa apakah filenya adalah gambar atau bukan

	if(isset($_POST["submit"])) {
	    $check = getimagesize($_FILES["gambar"]["tmp_name"]);
	    if($check == true) {
	        echo "format file gambarnya adalah : " . $check["mime"] . ".";
	        $uploadOk = 1;
	    } else {
	        echo "bukan file gambar";
	        $uploadOk = 0;
	    }
	}

	// jika uploadok nilanya 0 maka upload gambar gagal,
	if ($uploadOk == 0) {
	    echo "upload gagal";
	//jika tidak maka akan dilakukan proses upload gambar
	} else {
		$temp = explode(".", $_FILES["gambar"]["name"]);//untuk mengambil nama file gambarnya saja tanpa format gambarnya
		$nama_baru = 'santuy' . $id . end($temp);//fungsi untuk membuat nama acak
	    if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_dir."/" . $nama_baru)) {
	        echo "<br>upload gambar berhasil <a href='read.php'>Kembali</a> ";
	    } else {
	        echo "<br>upload gagal";
	    }
	}

?>
